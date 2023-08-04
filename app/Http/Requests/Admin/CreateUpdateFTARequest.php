<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateUpdateFTARequest extends FormRequest
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
     *_format:Y-m-d
     * @return array
     */
    public function rules()
    {
        return [
            'lce_id'=>'required',

            'leavetype'=>'required',
            'destination'=>'required',

            // 'datefrom'=>'required',
            // 'dateto'=>'required'
            'datefrom' => 'required|date_format:d-m-Y|before_or_equal:dateto',
            'dateto' => 'required|date_format:d-m-Y|after_or_equal:datefrom'

        ];
    }
}
