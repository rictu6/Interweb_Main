@extends('layouts.app')

@section('title')
    {{__('User Employee')}}
@endsection

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">
            <i class="nav-icon fas fa-layer-group"></i>
            {{__('User Employees')}}
          </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">{{__('Home')}}</a></li>
            <li class="breadcrumb-item active"><a href="#">{{__('User Employees')}}</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
      <h3 class="card-title">{{__('Users Table')}}</h3>
      @can('create_user')
        <a href="{{route('admin.users.create')}}" class="btn btn-primary btn-sm float-right">
          <i class="fa fa-plus"></i> {{ __('Create') }}
        </a>
      @endcan
    </div>
    <!-- /.card-header -->
    <div class="card-body">
       <div class="col-lg-12 table-responsive">
          <table id="users_table" class="table table-striped table-hover table-bordered"  width="100%">
            <thead>
          
              <tr>
                <th width="10px">#</th>
          
                <th width="50px">{{__('Profile')}}</th>
                <th>{{__('Biometric ID')}}</th>
                <th>{{__('Lastname')}}</th>
                <th>{{__('Firstname')}}</th>
                <th>{{__('Email')}}</th>
                <th>{{__('Roles')}}</th>
                <th width="100px">{{__('Action')}}</th>
              </tr>
             
            </thead>
            <tbody>
             
            </tbody>
          </table>
       </div>
    </div>
    <!-- /.card-body -->
  </div>

@endsection
@section('scripts')
<script src="{{url('js/admin/disableInspectElecment.js')}}"></script>
  <script src="{{url('js/admin/users.js')}}"></script>
@endsection