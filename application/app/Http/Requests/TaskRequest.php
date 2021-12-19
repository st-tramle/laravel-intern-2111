<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3|max:30',
            'description' => 'required|min:3|max:100',
            'type' =>'required|string',
            'status' =>'required|string',
            'startDate' =>'required|date',
            'dueDate' =>'required|date|after_or_equal:startDate',
            'assignee' =>'required|string|max:40',
            'estimate' =>'required|numeric',
            'actual' =>'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'title.*' => 'Please enter the title with a minimum length of 3 and a maximum length of 30!',
            'description.*' =>  'Please enter the title with a minimum length of 3 and a maximum length of 100!',
            'type.*' => 'Please enter the type',
            'status.*' =>  'Please enter the status',
            'startDate.*' => 'Please enter the start date with format date(MM/dd/YYYY)',
            'dueDate.*' => 'Please enter the due date greater than or equal to start date' ,
            'assignee.*' => 'Please enter the assignee with a maximum length of 40!',
            'estimate.*' => 'Please enter a number to the estimate',
            'actual.*' => 'Please enter a number to the actual'
        ];
    }
}
