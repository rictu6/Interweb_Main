@extends('layouts.app')

@section('title')
{{__('Edit Division')}}
@endsection

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">
              <i class="fa fa-cogs nav-icon"></i>
              {{__('Divisions')}}
            </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">{{__('Home')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.divisions.index')}}">{{__('Divisions')}}</a></li>
            <li class="breadcrumb-item active">{{__('Edit Division')}}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">{{__('Edit Division')}}</h3>
    </div>
    <!-- /.card-header -->
    <form method="POST" action="{{route('admin.divisions.update',$division->div_id)}}">
        <!-- /.card-header -->
        <div class="card-body">
            @csrf
            @method('put')
            @include('admin.divisions._form')
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
  <script src="{{url('js/admin/divisions.js')}}"></script>
  <script src="{{url('js/admin/disableInspectElecment.js')}}"></script>
@endsection