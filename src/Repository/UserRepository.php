<?php

final class UserRepository
{
    private array $users = [];

    public function getUsers(): array
    {
        return $this->users;
    }

    /**
     * @throws UserDoesNotExistException
     */
    private function findUserIndexById(int $id): int
    {
        foreach ($this->users as $index => $user) {
            if ($user->getId() === $id) {
                return $index;
            }
        }
        throw new UserDoesNotExistException('User do not exist');
    }

    /**
     * @throws UserDoesNotExistException
     */
    public function getUserById(int $id): User|Exception
    {
        $indexFound = $this->findUserIndexById($id);
        return $this->users[$indexFound];
    }

    public function addUser(User $user): void
    {
        $this->users[] = $user;
    }

    /**
     * @throws UserDoesNotExistException
     */
    public function updateUser(User $user): void
    {
        $indexFound = $this->findUserIndexById($user->getId());
        $this->users[$indexFound] = $user;
    }

    /**
     * @throws UserDoesNotExistException
     */
    public function deleteUser(int $id): void
    {
        $indexFound = $this->findUserIndexById($id);
        unset($this->users[$indexFound]);
    }


}