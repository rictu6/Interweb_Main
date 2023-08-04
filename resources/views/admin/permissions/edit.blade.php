@extends('layouts.app')

@section('title')
{{__('Edit Permission')}}
@endsection

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">
              <i class="nav-icon fas fa-lock"></i> 
              {{__('Permissions')}}
            </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">{{__('Home')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.permissions.index')}}">{{__('Permissions')}}</a></li>
            <li class="breadcrumb-item active">{{__('Edit Permission')}}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection



@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">{{__('Edit Permission')}}</h3>
    </div>
    <!-- /.card-header -->
    <form action="{{route('admin.permissions.update',$permission->id)}}" method="POST" >
        <!-- /.card-header -->
        <div class="card-body">
            @csrf
            @method('put')
            @include('admin.permissions._form')
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
              <i class="fa fa-check"></i> {{__('Save')}}
            </button>
        </div>
    </form>
    <!-- /.card-body -->
  </div>

@endsection
@section('scripts')
<script src="{{url('js/admin/disableInspectElecment.js')}}"></script>
  <script src="{{url('js/admin/permissions.js')}}"></script>
@endsection