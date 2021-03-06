<?php

namespace LU\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateInstructorRequest extends FormRequest
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
            'username'=>'required',
            'fullname'=>'required',
            'major_id'=>'required',
            'email'=>'required|unique:users',
            'fileNumber'=>'required|unique:users|max:5',
            'password'=>'required',
            'phone_Number'=>'required',
            'is_active'=>'required',
        ];
    }
}
