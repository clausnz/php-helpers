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
