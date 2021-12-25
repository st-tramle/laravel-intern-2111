<?php 
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

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

    /**
     *Convert number to string in column type.
     *
     * @param  string  $value
     * @return string
     */
    public function getTypeAttribute($value)
    {
        return [
            '1' => 'Story',
            '2' => 'Task',
            '3' => 'Bug'
        ][$value];
    }

    /**
     *Convert number to string in column status.
     *
     * @param  string  $value
     * @return string
     */
    public function getStatusAttribute($value)
    {
        return [
            '1' => 'Open',
            '2' => 'In progress',
            '3' => 'Resolved',
            '4' => 'Pending',
            '5' => 'Verified',
            '6' => 'Closed',
        ][$value];
    }

     /**
     *Convert y-m-d to d/m/y in column start_date.
     *
     * @param  string  $value
     * @return string
     */
    public function getStartDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }   
    
    /**
     *Convert y-m-d to d/m/y in column due_date.
     *
     * @param  string  $value
     * @return string
     */
    public function getDueDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function scopeGetById($query,$id)
    {
        return $query->findOrFail($id);
    }

    public function scopeFindById($query,$id)
    {
        return $query->whereId($id);
    }
}
