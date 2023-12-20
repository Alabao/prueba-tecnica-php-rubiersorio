<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    private ?User $user;

    protected function setUp(): void
    {
        $this->user = new User(1,'juan', 'juan@gmail.com', 'passJuan');
    }

    protected function tearDown(): void
    {
        $this->user = null;
    }

    public function testGetId()
    {
        $this->assertSame(1, $this->user->getId());
    }

    public function testGetUsername()
    {
        $this->assertSame('juan', $this->user->getUsername());
    }

    public function testSetUsername()
    {
        $this->user->setUsername('pedro');
        $this->assertSame('pedro', $this->user->getUsername());
    }

    public function testGetPassword()
    {
        $this->assertSame('passJuan', $this->user->getPassword());
    }

    public function testSetPassword()
    {
        $this->user->setPassword('newPassword');
        $this->assertSame('newPassword', $this->user->getPassword());
    }

    public function testGetEmail()
    {
        $this->assertSame('juan@gmail.com', $this->user->getEmail());
    }

    public function testSetEmail()
    {
        $this->user->setEmail('laura@gmail.com');
        $this->assertSame('laura@gmail.com', $this->user->getEmail());
    }

    public function testSetEmailBad()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->user->setEmail('laura');
    }
}

