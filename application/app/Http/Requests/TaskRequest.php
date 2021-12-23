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
            'title' => 'required|max:255',
            'description' => 'required|max:1000',
            'type' =>'required|integer',
            'status' =>'required|integer',
            'start_date' =>'required|date',
            'due_date' =>'required|date|after_or_equal:start_date',
            'assignee' =>'required|numeric',
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
            'start_date.*' => 'Please enter the start date with format date(MM/dd/YYYY)',
            'due_date.*' => 'Please enter the due date greater than or equal to start date' ,
            'assignee.*' => 'Please enter the assignee with a maximum length of 40!',
            'estimate.*' => 'Please enter a number to the estimate',
            'actual.*' => 'Please enter a number to the actual'
        ];
    }
}
