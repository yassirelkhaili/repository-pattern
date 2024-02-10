<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{

    public function getAll() 
    {
        return User::all();
    }
    public function getById($id)
    {
        return User::findOrfail($id);
    }

    public function create(array $data)
    {
        return User::create($data);
    }

    public function update($id, array $data)
    {
        return User::findOrFail($id)->update($data);
    }

    public function delete($id)
    {
        return User::findOrFail($id)->delete();
    }
}