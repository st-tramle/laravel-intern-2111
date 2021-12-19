<?php

namespace App\Models;

class TaskCollection
{ 
    /**
     * @var Task[] The tasks
     */
    public $items = array();
    public function __construct()
    {
        $this->items[] = new Task("Title 1", "aaaaaa", 1, "done", "10/3/2021", "10/4/2021", "Tram", 1, 2);
        $this->items[] = new Task("Title 2", "aaaaaa", 2, "done", "10/3/2021", "10/4/2021", "Tram", 1, 2);
        $this->items[] = new Task("Title 3", "aaaaaa", 2, "done", "10/3/2021", "10/4/2021", "Tram", 1, 2);
        $this->items[] = new Task("Title 4", "aaaaaa", 1, "done", "10/3/2021", "10/4/2021", "Tram", 1, 2);
        $this->items[] = new Task("Title 5", "aaaaaa", 2, "done", "10/3/2021", "10/4/2021", "Tram", 1, 2);
    }

    /**
     * Add task to list.
     *
     * @param Task $task The task
     *
     * @return void
     */
    public function addItem($task, $key = null) {
        if ($key == null) {
            $this->items[] = $task;
        }
        else {
            if (isset($this->items[$key])) {
                throw new \Exception("Key $key already in use.");
            }
            else {
                $this->items[$key] = $task;
            }
        }
    }
      /**
     * Delete task.
     *
     * @param $key The task
     *
     * @return void
     */
    public function deleteItem($key) {
        if (isset($this->items[$key])) {
            unset($this->items[$key]);
        }
        else {
            throw new \Exception("Invalid key $key.");
        }
    }

    /**
     * Get task.
     *
     * @return Task The task
     */
    public function getItem($key) {
        if (isset($this->items[$key])) {
            return $this->items[$key];
        }
        else {
            throw new \Exception("Invalid key $key.");
        }
    }

    /**
     * Get all tasks.
     *
     * @return Task[] The tasks
     */
    public function all(): array
    {
        return $this->items;
    }
    /**
     * Update task.
     *
     * @param Task $task The task
     *
     * @return void
     */
    public function updateItem($task, $key) {
        if (isset($this->items[$key])) {
            $this->items[$key] = $task;
        }
        else {
            throw new \Exception("Invalid key $key.");
        }
    }

}