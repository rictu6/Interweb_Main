@extends('layouts.app')

@section('title')
{{__('Create Schedule')}}
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
            <li class="breadcrumb-item"><a href="{{route('admin.schedules.index')}}">{{__('Schedules')}}</a></li>
            <li class="breadcrumb-item active">{{__('Create schedule')}}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{__('Create Schedule')}}</h3>
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
                    @include('admin.schedules._form') 
                </div>
            </div>
            <div class="card-footer">
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary">
                      <i class="fa fa-check"></i>  {{__('Save')}}
                    </button>
                </div>
            </div>
    </form>
  

   
    <!-- /.card-body -->
  </div>

@endsection
@section('scripts')
<script src="{{url('js/admin/schedules.js')}}"></script>
{{-- <script src="{{url('js/admin/disableInspectElecment.js')}}"></script> --}}

@endsection