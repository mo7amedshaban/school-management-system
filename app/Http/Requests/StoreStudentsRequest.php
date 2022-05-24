<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentsRequest extends FormRequest
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
        $email_rule = 'required|email|unique:students,email';

        $student_id = request('student.id');

        if (!is_null($student_id)) {
            $email_rule .= ",{$student_id}";
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
