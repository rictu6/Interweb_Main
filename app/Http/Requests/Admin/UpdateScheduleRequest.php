<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateScheduleRequest extends FormRequest
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
            'title'=>'required',
            'venue'=>'required',
            'office_id'=>'required',
            'div_id'=>'required',
            'start' => 'required|date_format:d-m-Y|before_or_equal:end',
            'end' => 'required|date_format:d-m-Y|after_or_equal:start'

        ];
    }
}
