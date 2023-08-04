@extends('layouts.app')

@section('title')
{{__('Create Employee')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{url('plugins/summernote/summernote-bs4.css')}}">
@endsection

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">
            <h1 class="m-0 text-dark">
              <i class="fa fa-cogs nav-icon"></i>
              {{__('Employees')}}
            </h1>
          </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">{{__('Home')}}</a></li>
            <li class="breadcrumb-item "><a href="{{route('admin.users.index')}}">{{__('Users')}}</a></li>
            <li class="breadcrumb-item active">{{__('Create user')}}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">{{__('Create Employee')}}</h3>
    </div>
    <form method="POST" action="{{route('admin.users.store')}}">
        <!-- /.card-header -->
        <div class="card-body">
            @csrf
            @include('admin.users._form')
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
              <i class="fa fa-check"></i> {{__('Save')}}
            </button>
        </div>
    </form>


    
   @include('admin.users.modals.division_modal')
   @include('admin.users.modals.muncit_modal')
  
   @include('admin.users.modals.office_modal')
   @include('admin.users.modals.position_modal')
   @include('admin.users.modals.province_modal')
   @include('admin.users.modals.section_modal')
   @include('admin.users.modals.empstatus_modal')
   <!--\Models-->

</div>
@endsection

@section('scripts')
<script src="{{url('js/admin/disableInspectElecment.js')}}"></script>
<script src="{{url('js/admin/users.js')}}"></script>
<script src="{{url('plugins/swtich-netliva/js/netliva_switch.js')}}"></script>

@endsection