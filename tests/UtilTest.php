<?php
/**
 * Project php-helpers
 * Dev: claus
 * Date: 15.01.18
 * Time: 13:00
 */

use CNZ\Helpers\Util as util;
use PHPUnit\Framework\TestCase;

class UtilTest extends TestCase
{
    public function test_crypt_password_is_password()
    {
        $password = 'My_Secret_Password#123';
        $cryptedPassword = crypt_password($password);

        $this->assertTrue(is_password($password, $cryptedPassword));
        $this->assertFalse(is_password($cryptedPassword, $cryptedPassword));

        $cryptedPassword = util::cryptPassword($password);

        $this->assertTrue(util::isPassword($password, $cryptedPassword));
        $this->assertFalse(util::isPassword($cryptedPassword, $cryptedPassword));

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
            $this->assertTrue(util::isEmail($email));
        }

        $falseEmails = [
            'test@test.com.',
            '@test.co.nz',
            '111#111.co.nz',
            'my.quickly.email'
        ];

        foreach ($falseEmails as $email) {
            $this->assertFalse(is_email($email));
            $this->assertFalse(util::isEmail($email));
        }
    }

    public function test_ip()
    {
        util::setIsCli();

        $ips = [
            ip(),
            util::ip()
        ];

        foreach ($ips as $ip) {
            $this->assertTrue(str_contains('.', $ip));
            $this->assertTrue(is_string($ip));
            $this->assertFalse(is_int($ip));
            $this->assertFalse(empty($ip));
            $this->assertFalse(is_array($ip));
        }

        util::setIsCli(false);

        $this->assertNull(ip());
        $this->assertNull(util::ip());

    }
}
