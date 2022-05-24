<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeachers extends FormRequest
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

    public function rules()
    {
        $email_rule = 'required|email|unique:teachers,email';

        $teacher_id = request('teacher.id');

        if (!is_null($teacher_id)) {
            $email_rule .= ",{$teacher_id}";
        }
        $rules = [
            "email" => $email_rule,
            "name" => "required",
            "speicalize_id" => "required",
            "address" => "required",
            "gender" => "required",
        ];

        return $rules;
    }



    public function messages()
    {
        return [
            'Email.required' => trans('validation.required'),
            'Email.unique' => trans('validation.unique'),
            'Password.required' => trans('validation.required'),
            'Name_ar.required' => trans('validation.required'),
            'Name_en.required' => trans('validation.required'),
            'Specialization_id.required' => trans('validation.required'),
            'Gender_id.required' => trans('validation.required'),
            'Joining_Date.required' => trans('validation.required'),
            'Address.required' => trans('validation.required'),
        ];
    }
}
