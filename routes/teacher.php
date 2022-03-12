<?php

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


#==============================Translate all pages============================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher',]
    ], function () {

    //==============================dashboard============================
    Route::get('/teacher/dashboard', function () {
        $ids = Teacher::findorFail(auth()->user()->id)->Sections()->pluck('section_id');
        $data['count_sections'] = $ids->count();
        $data['count_students'] = \App\Models\Student::whereIn('section_id', $ids)->count();
        return view('pages.Teachers.dashboard.dashboard', $data);
    });

    Route::group(['namespace' => 'Teachers\dashboard'], function () {
        //==============================students============================
        Route::get('student', 'StudentController@index')->name('student.index');
        Route::get('sections', 'StudentController@sections')->name('sections');
        Route::post('attendance', 'StudentController@attendance')->name('attendance');
        Route::post('edit_attendance', 'StudentController@editAttendance')->name('attendance.edit');

    });


});
