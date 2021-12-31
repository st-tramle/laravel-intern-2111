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
        return Task::findOrFail($id);
    }

    public function delete($id)
    {
        return Task::destroy($id);
    }

    public function create(array $attributes)
    {
        return Task::create($attributes);
    }

    public function update($id, array $attributes)
    {
        return Task::id($id)->update($attributes);
    }
}
