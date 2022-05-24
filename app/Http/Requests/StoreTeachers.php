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


     // this validation for heroku because heroku not define ".this->id"

    public function rules()
    {
        $email_rule = 'required|email|unique:teachers,email';

        $teacher_id = request('teacher.id');

        if (!is_null($teacher_id)) {
            $email_rule .= ",{$teacher_id}";
        }
        $rules = [
            "email" => $email_rule,
            "password" => "required",
            "Name_ar" => "required",
            "Name_en" => "required",
            "Specialization_id" => "required",
            "Gender_id"=>"required",
            "Address" => "required",
            "Joining_Date" => "required",
        ];

        return $rules;
    }



    public function messages()
    {
        return [
            'email.required' => trans('validation.required'),
            'email.unique' => trans('validation.unique'),
            'password.required' => trans('validation.required'),
            'Name_ar.required' => trans('validation.required'),
            'Name_en.required' => trans('validation.required'),
            'Specialization_id.required' => trans('validation.required'),
            'Gender_id.required' => trans('validation.required'),
            'Joining_Date.required' => trans('validation.required'),
            'Address.required' => trans('validation.required'),
        ];
    }
}
