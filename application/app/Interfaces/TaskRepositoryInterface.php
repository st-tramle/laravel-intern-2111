<?php
namespace App\Interfaces;

interface TaskRepositoryInterface 
{
    public function all();
    public function getById($id);
    public function delete($id);
    public function create(array $attributes);
    public function update($id, array $attributes);
}
