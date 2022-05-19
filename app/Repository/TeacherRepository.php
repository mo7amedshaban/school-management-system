<?php

namespace App\Repository;

use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface
{

    public function getAllTeachers()
    {
        return Teacher::all();
    }

    public function Getspecialization()
    {
        return specialization::all();
    }

    public function GetGender()
    {
        return Gender::all();
    }

    public function StoreTeachers($request)
    {

        try {
            $Teachers = new Teacher();
            $Teachers->E_mail = $request->Email;
            $Teachers->P_assword = Hash::make($request->Password);
            $Teachers->T_Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Teachers->S_id = $request->Specialization_id;
            $Teachers->G_id = $request->Gender_id;
            $Teachers->Enroll_Date = $request->Joining_Date;
            $Teachers->T_Address = $request->Address;
            $Teachers->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Teachers.create');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }


    public function editTeachers($id)
    {
        return Teacher::findOrFail($id);
    }


    public function UpdateTeachers($request)
    {
        try {
            $Teachers = Teacher::findOrFail($request->id);
            $Teachers->E_mail = $request->Email;
            $Teachers->P_assword = Hash::make($request->Password);
            $Teachers->T_Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Teachers->S_id = $request->Specialization_id;
            $Teachers->G_id = $request->Gender_id;
            $Teachers->Enroll_Date = $request->Joining_Date;
            $Teachers->T_Address = $request->Address;
            $Teachers->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Teachers.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function DeleteTeachers($request)
    {
        Teacher::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Teachers.index');
    }


}
