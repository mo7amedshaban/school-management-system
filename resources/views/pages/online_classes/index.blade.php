@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{trans('onlineclasse.online_course')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('onlineclasse.online_course')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{route('online_classes.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">    {{trans('onlineclasse.add_new_session')}}
                                </a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{trans('onlineclasse.Grade')}}</th>
                                            <th>{{trans('onlineclasse.classrooms')}}</th>
                                            <th>{{trans('onlineclasse.section')}}</th>
                                            <th>{{trans('onlineclasse.Name_Teacher')}}</th>
                                            <th>{{trans('onlineclasse.title_course')}}</th>
                                            <th>{{trans('onlineclasse.Joining_Date')}}</th>
                                            <th>{{trans('onlineclasse.time_course')}}</th>
                                            <th>{{trans('onlineclasse.link_zoom')}}</th>
                                            <th>{{trans('onlineclasse.Processes')}}</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($online_classes as $online_classe)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$online_classe->grade->Name}}</td>
                                                <td>{{ $online_classe->classroom->Name_Class }}</td>
                                                <td>{{$online_classe->section->Name_Section}}</td>
                                                <td>{{$online_classe->user->name}}</td>
                                                <td>{{$online_classe->topic}}</td>
                                                <td>{{$online_classe->start_at}}</td>
                                                <td>{{$online_classe->duration}}</td>
                                                <td class="text-danger"><a href="{{$online_classe->join_url}}" target="_blank">{{trans('onlineclasse.enrollnow')}}</a></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_receipt{{$online_classe->meeting_id}}" ><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @include('pages.online_classes.delete')
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
