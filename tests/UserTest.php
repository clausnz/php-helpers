<?php
/**
 * Project php-helpers
 * User: claus
 * Date: 13.01.18
 * Time: 13:32
 */

use CNZ\Helpers\User as user;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    protected $iphone = 'Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_3_3 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8J2 Safari/6533.18.5';

    protected $ipad = 'Mozilla/5.0 (iPad; U; CPU OS 4_3_3 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8J2 Safari/6533.18.5';

    protected $android = 'Mozilla/5.0 (Linux; U; Android 2.2.1; en-us; Nexus One Build/FRG83) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1';

    protected $windowsPhone = 'Mozilla/5.0 (compatible; MSIE 9.0; Windows Phone OS 7.5; Trident/5.0; IEMobile/9.0;';

    protected $googleBot = 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)';

    protected $bingBot = 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)';

    protected $yahooBot = 'Mozilla/5.0 (compatible; Yahoo! Slurp; http://help.yahoo.com/help/us/ysearch/slurp)';

    public function test_is_robot()
    {
        $userIsRobot = [
            $this->googleBot,
            $this->bingBot,
            $this->yahooBot
        ];

        foreach ($userIsRobot as $robot) {
            $this->assertTrue(is_robot($robot));
            $this->assertTrue(user::isRobot($robot));
        }

        $userIsNotRobot = [
            $this->iphone,
            $this->ipad,
            $this->android,
            $this->windowsPhone
        ];

        foreach ($userIsNotRobot as $robot) {
            $this->assertFalse(is_robot($robot));
            $this->assertFalse(user::isRobot($robot));
        }
    }

    public function test_crypt_password_is_password()
    {
        $password = 'My_Secret_Password#123';
        $cryptedPassword = crypt_password($password);

        $this->assertTrue(is_password($password, $cryptedPassword));
        $this->assertFalse(is_password($cryptedPassword, $cryptedPassword));

        $cryptedPassword = user::cryptPassword($password);

        $this->assertTrue(user::isPassword($password, $cryptedPassword));
        $this->assertFalse(user::isPassword($cryptedPassword, $cryptedPassword));

        $this->assertNotEquals($password, $cryptedPassword);
    }

    public function test_is_email()
    {
        $trueEmails = [
            'test@test.com',
            '1@test.co.nz',
            '111@111.co.nz',
            'my@quickly.email',
            'ab.cd.ef@gh.ij',
            'ab-cd-ef@g-h.ij'
        ];

        foreach ($trueEmails as $email) {
            $this->assertTrue(is_email($email));
            $this->assertTrue(user::isEmail($email));
        }

        $falseEmails = [
            'test@test.com.',
            '@test.co.nz',
            '111#111.co.nz',
            'my.quickly.email'
        ];

        foreach ($falseEmails as $email) {
            $this->assertFalse(is_email($email));
            $this->assertFalse(user::isEmail($email));
        }
    }

    public function test_user_ip()
    {
        $ips = [
            user_ip(true),
            user::ip(true)
        ];

        foreach ($ips as $ip) {
            $this->assertTrue(str_contains('.', $ip));
            $this->assertTrue(is_string($ip));
            $this->assertFalse(is_int($ip));
            $this->assertFalse(empty($ip));
            $this->assertFalse(is_array($ip));
        }

        $this->assertNull(user_ip());
        $this->assertNull(user::ip());

    }
}
