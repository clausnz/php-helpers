<?php
/**
 * Project php-helpers
 * User: claus
 * Date: 13.01.18
 * Time: 13:32
 */

use CNZ\Helpers\UserHelpers as user;
use PHPUnit\Framework\TestCase;

class UserHelpersTest extends TestCase
{
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
