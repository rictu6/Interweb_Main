<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'bio_id'=>'required'.$this->employee,
            'first_name'=>'required'.$this->employee,
            'middle_name'=>'required'.$this->employee,
            'last_name'=>'required'.$this->employee,
            'ext_name'=>'required'.$this->employee
           
        ];
    }

}
