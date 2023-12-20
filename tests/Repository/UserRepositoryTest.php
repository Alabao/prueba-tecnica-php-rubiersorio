<?php

use PHPUnit\Framework\TestCase;

class UserRepositoryTest extends TestCase
{
    private ?UserRepository $repo;

    private ?User $user;

    protected function setUp(): void
    {
        $this->repo = new UserRepository();
        $this->user = new User(2, 'pedro', 'pedro@docfav.com', '123Pedro');
        $this->repo->addUser($this->user);
    }

    protected function tearDown(): void
    {
        $this->repo = null;
        $this->user = null;
    }

    public function testGetUsers()
    {
        $this->assertIsArray($this->repo->getUsers());
    }

    public function testGetUserById()
    {
        $user = $this->repo->getUserById(2);
        $this->assertSame($this->user->getId(), $user->getId());
    }

    public function testAddUser()
    {
        $this->repo->addUser(new User(3, 'nuevo', 'newc@hotmail.co', 'passTT'));
        $this->assertCount(2, $this->repo->getUsers());
    }

    public function testUpdateUser()
    {
        $user = $this->repo->getUserById(2);
        $user->setUsername('juan');
        $this->repo->updateUser($user);
        $changeUser = $this->repo->getUserById(2);
        $this->assertNotSame('pedro',$changeUser->getUsername());
        $this->assertSame('juan',$changeUser->getUsername());
    }

    public function testDeleteUser()
    {
        $this->repo->deleteUser(2);
        $this->assertCount(0, $this->repo->getUsers());
    }

    public function testWhenUserIsNotFoundByIdErrorIsThrown():
    void
    {
        $this->expectException(UserDoesNotExistException::class);
        $this->repo->getUserById(3);
    }

}
