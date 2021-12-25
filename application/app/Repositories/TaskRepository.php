<?php

namespace App\Repositories;

use App\Interfaces\TaskRepositoryInterface;
use App\Models\Task;

class TaskRepository implements TaskRepositoryInterface
{
    public function all()
    { 
        return Task::all();
    }

    public function getById($id)
    {
        return Task::getById($id);;
    }

    public function delete($id)
    {
        Task::destroy($id);
    }

    public function create(array $attributes)
    {
        return Task::create($attributes);
    }

    public function update($id, array $attributes)
    {
        return Task::findById($id)->update($attributes);
    }
}
