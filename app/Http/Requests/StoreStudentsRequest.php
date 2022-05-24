<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentsRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }



    public function rules()
    {
        $email_rule = 'required|email|unique:students,email';

        $student_id = request('student.id');

        if (!is_null($student_id)) {
            $email_rule .= ",{$student_id}";
        }
        $rules = [
            "email" => $email_rule,
            "gender_id" => "required",
            "nationalitie_id" => "required",
            "blood_id" => "required",
            "Date_Birth" => "required",
            "Grade_id" => "required",
            "Classroom_id" => "required",
            "section_id" => "required",
            "name_en" => "required",
            "name_ar" => "required",
            "parent_id" => "required",
            "academic_year" => "required",
            "password"=>'required'
        ];

        return $rules;
    }

    public function messages()
    {
        return [


            'email.required' => trans('validation.required'),
            'email.unique' => trans('validation.unique'),
            'password.required' => trans('validation.required'),

            'name_ar.required' => trans('validation.required'),
            'name_en.required' => trans('validation.required'),
            'nationalitie_id.required' => trans('validation.required'),
            'gender_id.required' => trans('validation.required'),
            'blood_id.required' => trans('validation.required'),
            'section_id.required' => trans('validation.required'),
            'Grade_id.required' => trans('validation.required'),
            'Classroom_id.required' => trans('validation.required'),
            'Specialization_id.required' => trans('validation.required'),
            'parent_id.required' => trans('validation.required'),
            'Date_Birth.required' => trans('validation.required'),
            'academic_year.required' => trans('validation.required'),
        ];
    }


    // public function rules()
    // {
    //     return [
    //         'name_ar' => 'required',
    //         'name_en' => 'required',
    //         'email' => 'required|email|unique:students,email,'.$this->id,
    //         'password' => 'required|string|min:6|max:10',
    //         'gender_id' => 'required',
    //         'nationalitie_id' => 'required',
    //         'blood_id' => 'required',
    //         'Date_Birth' => 'required|date|date_format:Y-m-d',
    //         'Grade_id' => 'required',
    //         'Classroom_id' => 'required',
    //         'section_id' => 'required',
    //         'parent_id' => 'required',
    //         'academic_year' => 'required',
    //     ];
    // }
}
