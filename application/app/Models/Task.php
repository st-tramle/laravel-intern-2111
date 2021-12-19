<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{ 
    public $title, $description, $type, $status, $startDate, $dueDate, $assignee, $estimate, $actual;
    public function __construct($title, $description, $type, $status, $startDate, $dueDate, $assignee, $estimate, $actual)
    {
        $this->title = $title;
        $this->description = $description;
        $this->type = $type;
        $this->status = $status;
        $this->startDate = $startDate;
        $this->dueDate = $dueDate;
        $this->assignee = $assignee;
        $this->estimate = $estimate;
        $this->actual = $actual;
    }

}
