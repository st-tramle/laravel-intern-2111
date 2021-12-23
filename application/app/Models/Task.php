<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title', 
        'description', 
        'type', 
        'status', 
        'start_date', 
        'due_date', 
        'assignee', 
        'estimate', 
        'actual',
    ];
}
