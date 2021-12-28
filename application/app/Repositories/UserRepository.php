<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function all()
    { 
        return User::all() ;
    }

    public function getById($id)
    {
        return User::with('tasks')->findOrFail($id);
    }
}
