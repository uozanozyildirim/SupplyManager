<?php

namespace App\Repositories;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Models\User;
use phpDocumentor\Reflection\Types\Collection;

class UserRepository implements UserRepositoryInterface
{

    /**
     * @param int $id
     * @return Collection
     */
    public function find(int $id): Collection
    {
        return User::find($id);
    }

    /**
     * @param string $email
     * @return Collection
     */
    public function findByEmail(string $email): Collection
    {
        return User::where('email', $email)->first();
    }

    /**
     * @param array|Collection $data
     * @return Collection
     */
    public function create(array|Collection $data): Collection
    {
        return User::create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return Collection
     */
    public function update(int $id, array $data): Collection
    {
         return User::find($id)->update($data);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        return User::find($id)->delete();
    }
}