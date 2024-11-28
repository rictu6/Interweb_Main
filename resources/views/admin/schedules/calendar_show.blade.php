@extends('layouts.app')

@section('title')
{{__('Schedules')}}
@endsection

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fa fa-cogs nav-icon"></i>
                    {{__('Schedules')}}
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item active">{{__('Schedules')}}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">{{__('Calendar of Events')}}</h3>
        @can('create_schedule')
        <a href="{{route('admin.schedules.create')}}" class="btn btn-primary btn-sm float-right">
            <i class="fa fa-plus"></i> {{__('Create')}}
        </a>
        @endcan
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row table-responsive">
            <div class="col-12">
                <div id="accordion">
                    <div class="card card-info">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                            class="btn btn-primary collapsed" aria-expanded="false">
                            <i class="fas fa-filter"></i> {{__('Filter')}}
                        </a>
                        <div id="collapseOne" class="panel-collapse in collapse">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>{{__('Select Attendee/s:')}}</label>


                                            <select name="roles[]" id="role" placeholder="{{__('Roles')}}"
                                                class="form-control select2" multiple required>
                                                @foreach($roles as $role)
                                                <option value="{{$role['emp_id']}}">{{$role->last_name}},
                                                    {{$role->first_name}}
                                                    {{$role->middle_name}}</option>
                                                @endforeach
                                            </select>

                                          
                                         
                                            <a href="" data-toggle="tooltip"
                                                rel="tooltip" data-placement="top" title='Search'
                                                class="btn btn-primary btn-sm">
                                                <i class="fa fa-search"></i>
                                            </a>
                                              
                                           
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        {!! $calendar->calendar() !!}
                    </div>

                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

    @endsection
    @section('scripts')
    <script src="{{url('js/admin/schedules.js')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js">
    </script>
    {{-- 
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/> --}}
    <link rel="stylesheet" href="\dist\css\fullcalendar.min.css">
    {{-- <link rel="stylesheet" href="assets/vendor/sweetalert2/dist/sweetalert2.min.css"> --}}
    {!! $calendar->script() !!}
    @endsection