<?php

namespace LU\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCourseRequest extends FormRequest
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
            'course_code'=>'required',
            'description'=>'required',
            'major_id'=>'required',
            'semester_id'=>'required',
            'language_id'=>'required'
        ];
    }
}
