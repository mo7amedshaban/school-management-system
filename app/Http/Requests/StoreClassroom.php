<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassroom extends FormRequest
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
        # validation array
        # List_Classes[Name]  ==    List_Classes.*.Name
        return [
            'List_Classes.*.Name' => 'required',
            'List_Classes.*.Name_class_en' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'Name.required' => trans('validation.required'),
            'Name_class_en.required' => trans('validation.required'),
        ];
    }
}
