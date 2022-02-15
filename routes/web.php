<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


//Auth::routes();
# this instead of    //Auth::routes();   for localization
Route::group(['prefix' => LaravelLocalization::setLocale(),
], function () {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

    // Confirm Password (added in v6.2)
    Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
    Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

// Email Verification Routes...
    Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify'); // v6.x
    /* Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify'); // v5.x */
    Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

});

/****
 * guest is -->  any one refresh website he is login not ask again about username & password ,
 *   if not login ask you about login
 ****/

Route::group(['middleware' => 'guest',], function () {
    Route::get('/', function () {
        return view('auth.login');
    });
});


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ], function () {


    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    Route::group(['namespace' => 'Grades'], function () {
        Route::resource('Grades', 'GradeController');
    });

    //==============================Classrooms============================
    Route::group(['namespace' => 'Classrooms'], function () {
        Route::resource('Classrooms', 'ClassroomController');
        Route::post('delete_all', 'ClassroomController@delete_all')->name('delete_all');

        Route::post('Filter_Classes', 'ClassroomController@Filter_Classes')->name('Filter_Classes');

    });


    //==============================Sections============================

    Route::group(['namespace' => 'Sections'], function () {

        Route::resource('Sections', 'SectionController');

        Route::get('/classes/{id}', 'SectionController@getclasses');

    });


    //==============================parents============================

    Route::view('add_parent', 'livewire.show_Form');


    //==============================Teachers============================
    Route::group(['namespace' => 'Teachers'], function () {
        Route::resource('Teachers', 'TeacherController');
    });


    //==============================Students============================
    Route::group(['namespace' => 'Students'], function () {
        Route::resource('Students', 'StudentController');
        Route::get('/Get_classrooms/{id}', 'StudentController@Get_classrooms');
        Route::get('/Get_Sections/{id}', 'StudentController@Get_Sections');
        Route::post('Upload_attachment', 'StudentController@Upload_attachment')->name('Upload_attachment');
        Route::get('Download_attachment/{studentsname}/{filename}', 'StudentController@Download_attachment')->name('Download_attachment');
        Route::post('Delete_attachment', 'StudentController@Delete_attachment')->name('Delete_attachment');
        Route::resource('Graduated', 'GraduatedController');
        Route::resource('Promotion', 'PromotionController');
        Route::resource('Fees', 'FeesController');
        Route::resource('Fees_Invoices', 'FeesInvoicesController');
        Route::resource('receipt_students', 'ReceiptStudentsController');
        Route::resource('ProcessingFee', 'ProcessingFeeController');
        Route::resource('Payment_students', 'PaymentController');
        Route::resource('Attendance', 'AttendanceController');
        Route::get('download_file/{filename}', 'LibraryController@downloadAttachment')->name('downloadAttachment');
        Route::resource('library', 'LibraryController');

    });


    //==============================Subjects============================
    Route::group(['namespace' => 'Subjects'], function () {
        Route::resource('subjects', 'SubjectController');
    });

    //==============================Quizzes============================
    Route::group(['namespace' => 'Quizzes'], function () {
        Route::resource('Quizzes', 'QuizzController');
    });

    //==============================questions============================
    Route::group(['namespace' => 'questions'], function () {
        Route::resource('questions', 'QuestionController');
    });


    //============================OnlineClasse==============================

    Route::group(['namespace' => 'Zoom'], function () {
        Route::post('/indirect', 'OnlineClasseController@storeIndirect')->name('indirect.store');

        Route::resource('online_classes', 'OnlineClasseController');
        Route::get('/indirect', 'OnlineClasseController@indirectCreate')->name('indirect.create');
    });


});


