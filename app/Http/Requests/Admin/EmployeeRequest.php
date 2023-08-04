<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'bio_id'=>'required',
            'first_name'=>'required',
            'middle_name'=>'required',
            'last_name'=>'required',
          
            'birth_date'=>'required',
            'gender'=>'required',
            'pos_id'=>'required',
            'sec_id'=>'required',
            'emp_status_id'=>'required',
            'muncit_id'=>'required',
            'office_id'=>'required',
            'prov_code'=>'required',
            'div_id'=>'required',
            'nat_id'=>'required',

            'email'=>'required',
            'user_name'=>'required'
          
           
            
           
        ];
    }

  
}
