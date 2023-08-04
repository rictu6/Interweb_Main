<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CreateScheduleRequest extends FormRequest
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
        // return [
        //     'office_id'=>'required',
        //     'div_id'=>'required',
        //     'sec_id'=>'required',
        //     'pos_id'=>'required',
        

           
        //     // 'start' => 'required|date_format:d-m-Y|before_or_equal:end',
        //     // 'end' => 'required|date_format:d-m-Y|after_or_equal:start'

        // ];
        return [
            'emp_id' => ['required', 'emp_id', \Illuminate\Validation\Rule::unique('users')->ignore($this->user()->id)]
        ];
    }
}
