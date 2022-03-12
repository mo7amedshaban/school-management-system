
@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{trans('Account.list_a_t')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('Account.list_a_t')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-danger">
            <ul>
                <li>{{ session('status') }}</li>
            </ul>
        </div>
    @endif

    <h5 style="font-family: 'Cairo', sans-serif;color: red"> {{trans('Account.day_date')}} : {{ date('Y-m-d') }}</h5>
    <br>
    <form method="post" action="{{ route('attendance') }}" autocomplete="off">

        @csrf
        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
               style="text-align: center">
            <thead>
            <tr>
                <th class="alert-success">#</th>
                <th class="alert-success">{{ trans('Students_trans.name') }}</th>
                <th class="alert-success">{{ trans('Students_trans.email') }}</th>
                <th class="alert-success">{{ trans('Students_trans.gender') }}</th>
                <th class="alert-success">{{ trans('Students_trans.Grade') }}</th>
                <th class="alert-success">{{ trans('Students_trans.classrooms') }}</th>
                <th class="alert-success">{{ trans('Students_trans.section') }}</th>
                <th class="alert-success">{{ trans('Account.attendance_absences') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->gender->Name }}</td>
                    <td>{{ $student->grade->Name }}</td>
                    <td>{{ $student->classroom->Name_Class }}</td>
                    <td>{{ $student->section->Name_Section }}</td>
                    <td>

                        @if(isset($student->attendance()->where('attendence_date',date('Y-m-d'))->where('student_id',$student->id)->first()->student_id))

                            <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                <input name="attendences[{{ $student->id }}]" disabled
                                       {{ $student->attendance()->first()->attendence_status == 1 ? 'checked' : '' }}
                                       class="leading-tight" type="radio" value="presence">
                                <span class="text-success">{{ trans('Account.attendance') }}</span>
                            </label>

                            <label class="ml-4 block text-gray-500 font-semibold">
                                <input name="attendences[{{ $student->id }}]" disabled {{ $student->attendance()->first()->attendence_status == 0 ? 'checked' : '' }}
                                class="leading-tight" type="radio" value="absent">
                                <span class="text-danger">{{ trans('Account.absences') }}</span>
                            </label>
                            <button type="button" class="btn btn-secondary btn-sm"
                                    data-toggle="modal"
                                    data-target="#edit_attendance{{ $student->id }}" ><i
                                    class="fa fa-edit"></i></button>
                            @include('pages.Teachers.dashboard.students.edit_attendance')
                        @else

                            <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                <input name="attendences[{{ $student->id }}]" class="leading-tight" type="radio"
                                       value="presence">
                                <span class="text-success">{{ trans('Account.attendance') }}</span>
                            </label>

                            <label class="ml-4 block text-gray-500 font-semibold">
                                <input name="attendences[{{ $student->id }}]" class="leading-tight" type="radio"
                                       value="absent">
                                <span class="text-danger">{{ trans('Account.absences') }}</span>
                            </label>

                            <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                            <input type="hidden" name="grade_id" value="{{ $student->Grade_id }}">
                            <input type="hidden" name="classroom_id" value="{{ $student->Classroom_id }}">
                            <input type="hidden" name="section_id" value="{{ $student->section_id }}">
                        @endif

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <P>
            <button class="btn btn-success" type="submit">{{ trans('Students_trans.submit') }}</button>
        </P>
    </form><br>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection














{{--@extends('layouts.master')--}}
{{--@section('css')--}}
{{--    @toastr_css--}}
{{--@section('title')--}}
{{--    {{trans('main_trans.list_students')}}--}}
{{--@stop--}}
{{--@endsection--}}
{{--@section('page-header')--}}
{{--    <!-- breadcrumb -->--}}
{{--@section('PageTitle')--}}
{{--    {{trans('main_trans.list_students')}}--}}
{{--@stop--}}
{{--<!-- breadcrumb -->--}}
{{--@endsection--}}
{{--@section('content')--}}
{{--    <!-- row -->--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-12 mb-30">--}}
{{--            <div class="card card-statistics h-100">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="col-xl-12 mb-30">--}}
{{--                        <div class="card card-statistics h-100">--}}
{{--                            <div class="card-body">--}}
{{--                                <a href="{{route('Students.create')}}" class="btn btn-success btn-sm" role="button"--}}
{{--                                   aria-pressed="true">{{trans('main_trans.add_student')}}</a><br><br>--}}
{{--                                <div class="table-responsive">--}}
{{--                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"--}}
{{--                                           data-page-length="50"--}}
{{--                                           style="text-align: center">--}}
{{--                                        <thead>--}}
{{--                                        <tr>--}}
{{--                                            <th>#</th>--}}
{{--                                            <th>{{trans('Students_trans.name')}}</th>--}}
{{--                                            <th>{{trans('Students_trans.email')}}</th>--}}
{{--                                            <th>{{trans('Students_trans.gender')}}</th>--}}
{{--                                            <th>{{trans('Students_trans.Grade')}}</th>--}}
{{--                                            <th>{{trans('Students_trans.classrooms')}}</th>--}}
{{--                                            <th>{{trans('Students_trans.section')}}</th>--}}
{{--                                            <th>{{trans('Students_trans.Processes')}}</th>--}}
{{--                                        </tr>--}}
{{--                                        </thead>--}}
{{--                                        <tbody>--}}
{{--                                        @foreach($students as $student)--}}
{{--                                            <tr>--}}
{{--                                                <td>{{ $loop->index+1 }}</td>--}}
{{--                                                <td>{{$student->name}}</td>--}}
{{--                                                <td>{{$student->email}}</td>--}}
{{--                                                <td>{{$student->gender->Name}}</td>--}}
{{--                                                <td>{{$student->grade->Name}}</td>--}}
{{--                                                <td>{{$student->classroom->Name_Class}}</td>--}}
{{--                                                <td>{{$student->section->Name_Section}}</td>--}}
{{--                                                <td>--}}

{{--                                                    <div class="dropdown show">--}}
{{--                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#"--}}
{{--                                                           role="button" id="dropdownMenuLink" data-toggle="dropdown"--}}
{{--                                                           aria-haspopup="true" aria-expanded="false">--}}
{{--                                                            العمليات--}}
{{--                                                        </a>--}}
{{--                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">--}}
{{--                                                            <a class="dropdown-item"--}}
{{--                                                               href="{{route('Students.show',$student->id)}}"><i--}}
{{--                                                                    style="color: #ffc107" class="far fa-eye "></i>&nbsp;--}}
{{--                                                                عرض بيانات الطالب</a>--}}
{{--                                                            <a class="dropdown-item"--}}
{{--                                                               href="{{route('Students.edit',$student->id)}}"><i--}}
{{--                                                                    style="color:green" class="fa fa-edit"></i>&nbsp;--}}
{{--                                                                تعديل بيانات الطالب</a>--}}
{{--                                                            <a class="dropdown-item"--}}
{{--                                                               href="{{route('Fees_Invoices.show',$student->id)}}"><i--}}
{{--                                                                    style="color: #0000cc" class="fa fa-edit"></i>&nbsp;اضافة--}}
{{--                                                                فاتورة رسوم&nbsp;</a>--}}
{{--                                                            <a class="dropdown-item"--}}
{{--                                                               href="{{route('receipt_students.show',$student->id)}}"><i--}}
{{--                                                                    style="color: #9dc8e2"--}}
{{--                                                                    class="fas fa-money-bill-alt"></i>&nbsp; &nbsp;سند--}}
{{--                                                                قبض</a>--}}
{{--                                                            <a class="dropdown-item"--}}
{{--                                                               href="{{route('Payment_students.show',$student->id)}}"><i--}}
{{--                                                                    style="color:goldenrod" class="fas fa-donate"></i>&nbsp;--}}
{{--                                                                &nbsp;سند صرف</a>--}}
{{--                                                            <a class="dropdown-item"--}}
{{--                                                               data-target="#Delete_Student{{ $student->id }}"--}}
{{--                                                               data-toggle="modal"--}}
{{--                                                               href="#Delete_Student{{ $student->id }}"><i--}}
{{--                                                                    style="color: red" class="fa fa-trash"></i>&nbsp;--}}
{{--                                                                حذف بيانات الطالب</a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}
{{--                                        @include('pages.Students.Delete')--}}
{{--                                        @endforeach--}}
{{--                                    </table>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- row closed -->--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--    @toastr_js--}}
{{--    @toastr_render--}}
{{--@endsection--}}
