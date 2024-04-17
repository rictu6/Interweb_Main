@extends('layouts.app')

@section('title')
{{__('Edit Schedule')}}
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
                    <li class="breadcrumb-item"><a href="{{route('admin.schedules.index')}}">{{__('Schedules')}}</a>
                    </li>
                    <li class="breadcrumb-item active">{{__('Edit schedule')}}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{__('Edit Schedule')}}</h3>
    </div>
    <!-- /.card-header -->
    <form method="POST" action="{{route('admin.schedules.update',$user->id)}}" enctype="multipart/form-data">
        <!-- /.card-header -->
        <div class="card-body">
            @csrf
            @method('put')
            <input type="hidden" id="user_roles" value="{{$user['roles']}}">
            <div class="card-body">
                <div class="col-lg-12">
                    @include('admin.schedules._form_viewing')
                </div>
            </div>
              <div class="card-footer">
            
        </div>

    </form>



    <!-- /.card-body -->
</div>

@endsection
@section('scripts')
<script src="{{url('js/admin/schedules.js')}}"></script>
{{-- <script src="{{url('js/admin/disableInspectElecment.js')}}"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection