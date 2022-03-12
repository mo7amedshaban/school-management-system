
<!DOCTYPE html>
<html lang="en">
@section('title')
{{trans('main_trans.Main_title')}}
@stop
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    @include('layouts.head')
    @livewireStyles
</head>

<body style="font-family: 'Cairo', sans-serif">

    <div class="wrapper" style="font-family: 'Cairo', sans-serif">

        <!--=================================
 preloader -->

 <div id="pre-loader">
     <img src="{{ URL::asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
 </div>

        <!--=================================
 preloader -->

        @include('layouts.main-header')

        @include('layouts.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">
            <div class="page-title" >
                <div class="row">
                    <div class="col-sm-6" >
                        <h4 class="mb-0" style="font-family: 'Cairo', sans-serif">{{trans('Account.welcome')}} : {{auth()->user()->Name}}</h4>
                    </div><br><br>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>
            <!-- widgets -->
            <div class="row" >
                <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-success">
                                        <i class="fas fa-user-graduate highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{trans('Account.student_count')}}</p>
                                    <h4>{{$count_students}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{route('student.index')}}" ><span class="text-danger">{{trans('Account.info_show')}} </span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-warning">
                                        <i class="fas fa-chalkboard-teacher highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{trans('Account.section_count')}} </p>
                                    <h4>{{$count_sections}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{route('sections')}}"><span class="text-danger">{{trans('Account.info_show')}} </span></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Orders Status widgets-->


            <div class="row">

                <div style="height: 400px;" class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="tab nav-border" style="position: relative;">
                                <div class="d-block d-md-flex justify-content-between">
                                    <div class="d-block w-100">
                                        <h5 style="font-family: 'Cairo', sans-serif"
                                            class="card-title">{{trans('Account.last_operation')}}</h5>
                                    </div>
                                    <div class="d-block d-md-flex nav-tabs-custom">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                                            <li class="nav-item">
                                                <a class="nav-link active show" id="students-tab" data-toggle="tab"
                                                   href="#students" role="tab" aria-controls="students"
                                                   aria-selected="true">{{trans('main_trans.students')}}</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="teachers-tab" data-toggle="tab" href="#teachers"
                                                   role="tab" aria-controls="teachers"
                                                   aria-selected="false">{{trans('main_trans.Teachers')}}
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="parents-tab" data-toggle="tab" href="#parents"
                                                   role="tab" aria-controls="parents"
                                                   aria-selected="false">{{trans('main_trans.Parents')}}
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="fee_invoices-tab" data-toggle="tab"
                                                   href="#fee_invoices"
                                                   role="tab" aria-controls="fee_invoices"
                                                   aria-selected="false">{{trans('Account.Fees_Invoices')}}
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content" id="myTabContent">

                                    {{--students Table--}}
                                    <div class="tab-pane fade active show" id="students" role="tabpanel"
                                         aria-labelledby="students-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center"
                                                   class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                <tr class="table-info text-danger">
                                                    <th>#</th>
                                                    <th>{{trans('Students_trans.name')}}</th>
                                                    <th>{{trans('Students_trans.email')}}</th>
                                                    <th>{{trans('Students_trans.gender')}}</th>
                                                    <th>{{trans('Students_trans.Grade')}}</th>
                                                    <th>{{trans('Students_trans.classrooms')}}</th>
                                                    <th>{{trans('Students_trans.section')}}</th>
                                                    <th>{{trans('Account.Added_date')}} </th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse(\App\Models\Student::latest()->take(5)->get() as $student)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$student->name}}</td>
                                                        <td>{{$student->email}}</td>
                                                        <td>{{$student->gender->Name}}</td>
                                                        <td>{{$student->grade->Name}}</td>
                                                        <td>{{$student->classroom->Name_Class}}</td>
                                                        <td>{{$student->section->Name_Section}}</td>
                                                        <td class="text-success">{{$student->created_at}}</td>
                                                        @empty
                                                            <td class="alert-danger"
                                                                colspan="9">{{trans('Account.no_info')}}</td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    {{--teachers Table--}}
                                    <div class="tab-pane fade" id="teachers" role="tabpanel" aria-labelledby="teachers-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center"
                                                   class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                <tr class="table-info text-danger">
                                                    <th>#</th>
                                                    <th>{{trans('Account.Name_Teacher')}}</th>
                                                    <th>{{trans('Account.Gender')}}</th>
                                                    <th>{{trans('Account.Joining_Date')}}</th>
                                                    <th>{{trans('Account.specialization')}}</th>
                                                    <th>{{trans('Account.Added_date')}} </th>
                                                </tr>
                                                </thead>

                                                @forelse(\App\Models\Teacher::latest()->take(5)->get() as $teacher)
                                                    <tbody>
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$teacher->Name}}</td>
                                                        <td>{{$teacher->genders->Name}}</td>
                                                        <td>{{$teacher->Joining_Date}}</td>
                                                        <td>{{$teacher->specializations->Name}}</td>

                                                        <td class="text-success">{{$teacher->created_at}}</td>
                                                        @empty
                                                            <td class="alert-danger"
                                                                colspan="9">{{trans('Account.no_info')}}</td>
                                                    </tr>
                                                    </tbody>
                                                @endforelse
                                            </table>
                                        </div>
                                    </div>

                                    {{--parents Table--}}
                                    <div class="tab-pane fade" id="parents" role="tabpanel" aria-labelledby="parents-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center"
                                                   class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                <tr class="table-info text-danger">
                                                    <th>#</th>
                                                    <th>{{trans('Account.parent_name')}}</th>
                                                    <th>{{trans('Parent_trans.Email')}}</th>
                                                    <th>{{trans('Parent_trans.Passport_ID_Father')}}</th>
                                                    <th>{{trans('Parent_trans.Phone_Father')}}</th>
                                                    <th>{{trans('Account.Added_date')}} </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse(\App\Models\My_Parent::latest()->take(5)->get() as $parent)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$parent->Name_Father}}</td>
                                                        <td>{{$parent->email}}</td>
                                                        <td>{{$parent->National_ID_Father}}</td>
                                                        <td>{{$parent->Phone_Father}}</td>
                                                        <td class="text-success">{{$parent->created_at}}</td>
                                                        @empty
                                                            <td class="alert-danger"
                                                                colspan="9">{{trans('Account.no_info')}}</td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    {{--sections Table--}}
                                    <div class="tab-pane fade" id="fee_invoices" role="tabpanel"
                                         aria-labelledby="fee_invoices-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center"
                                                   class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                <tr class="table-info text-danger">
                                                    <th>#</th>
                                                    <th>{{trans('Account.invoice_date')}}</th>
                                                    <th>{{trans('Account.name')}}</th>
                                                    <th>{{trans('Account.Educational_level')}}</th>
                                                    <th>{{trans('Account.classroom')}}</th>
                                                    <th>{{trans('Account.fee_type')}}</th>
                                                    <th>{{trans('Account.money')}}</th>
                                                    <th>{{trans('Account.Added_date')}} </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse(\App\Models\Fee_invoice::latest()->take(10)->get() as $data)
                                                    {{--                                                <tr>--}}
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$data->invoice_date}}</td>
                                                    <td>{{$data->student->name}}</td>
                                                    <td>{{$data->grade->Name}}</td>
                                                    <td>{{$data->classroom->Name_Class}}</td>
                                                    <td>{{$data->fees->title}}</td>



                                                    <td>{{ number_format($data->amount, 2) }}</td>

                                                    <td>{{$data->created_at}}</td>
                                                @empty
                                                    <td class="alert-danger"
                                                        colspan="9">{{trans('Account.no_info')}}</td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <livewire:calendar />

            <!--=================================
 wrapper -->

            <!--=================================
 footer -->

            @include('layouts.footer')
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--=================================
 footer -->

    @include('layouts.footer-scripts')
    @livewireScripts
    @stack('scripts')

</body>

</html>
