<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    private static function getUserForTest():User
    {
        return new User(1,'juan', 'juan@gmail.com', 'passJuan');
    }

    public function testGetId()
    {
        $user = self::getUserForTest();
        $this->assertSame(1, $user->getId());
    }

    public function testGetUsername()
    {
        $user = self::getUserForTest();
        $this->assertSame('juan', $user->getUsername());
    }

    public function testSetUsername()
    {
        $user = self::getUserForTest();
        $user->setUsername('pedro');
        $this->assertSame('pedro', $user->getUsername());
    }

    public function testGetPassword()
    {
        $user = self::getUserForTest();
        $this->assertSame('passJuan', $user->getPassword());
    }

    public function testSetPassword()
    {
        $user = self::getUserForTest();
        $user->setPassword('newPassword');
        $this->assertSame('newPassword', $user->getPassword());
    }

    public function testGetEmail()
    {
        $user = self::getUserForTest();
        $this->assertSame('juan@gmail.com', $user->getEmail());
    }

    public function testSetEmail()
    {
        $user = self::getUserForTest();
        $user->setEmail('laura@gmail.com');
        $this->assertSame('laura@gmail.com', $user->getEmail());
    }

    public function testSetEmailBad()
    {
        $user = self::getUserForTest();
        $this->expectException(InvalidArgumentException::class);
        $user->setEmail('laura');
    }
}

