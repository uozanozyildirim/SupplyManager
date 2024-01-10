<?php

namespace App\Contracts\Repositories;

use phpDocumentor\Reflection\Types\Collection;

interface UserRepositoryInterface
{

    public function find(int $id) : Collection;

    public function findByEmail(string $email) : Collection;

    public function create(array|Collection $data) : Collection;

    public function update(int $id, array $data) : Collection;

    public function delete(int $id);

}
