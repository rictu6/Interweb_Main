@extends('layouts.app')

@section('title')
  {{__('Dashboard')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{url('plugins/swtich-netliva/css/netliva_switch.css')}}">
@endsection

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">
            <i class="nav-icon fas fa-th"></i>
            {{__('Dashboard')}}
          </h1>
        </div><!-- /.col -->

        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">{{__('FDMS Dashboard')}}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
@can('view_orsheader','view_accounting_reports','generate_report_accounting')
<div class="row">
    <div class="card card-primary" style="width: 400px; margin: 0 auto;">
        <div class="card-header" style="display: flex; justify-content: center; align-items: center;">
        <a class="btn btn-primary btn-sm text-uppercase" href="{{route('admin.orsheader_list')}}" >
            <i class="fa fa-list"></i>
            {{__('ORS Encoding')}}
          </a>

        </div>
    </div>

    <div class="card card-primary" style="width: 400px; margin: 0 auto;">
        <div class="card-header" style="display: flex; justify-content: center; align-items: center;">
        <a class="btn btn-primary btn-sm text-uppercase" href="{{route('admin.suballotments.index')}}" >
            <i class="fa fa-list"></i>
            {{__('Sub-Allotment Encoding')}}
          </a>

        </div>
    </div>
    <div class="card card-primary" style="width: 400px; margin: 0 auto;">
        <div class="card-header" style="display: flex; justify-content: center; align-items: center;">
        <a class="btn btn-primary btn-sm text-uppercase" href="{{route('admin.allotments.index')}}" >
            <i class="fa fa-list"></i>
            {{__('Allotment Encoding')}}
          </a>

        </div>
    </div>

    <div class="card card-primary" style="width: 400px; margin: 0 auto;">
        <div class="card-header" style="display: flex; justify-content: center; align-items: center;">
        <a class="btn btn-primary btn-sm text-uppercase" href="{{route('admin.accounting.index')}}" >
            <i class="fa fa-list"></i>
            {{__('Reports')}}
          </a>
        </div>
    </div>
    <div class="card card-primary" style="width: 400px; margin: 0 auto;">
        <div class="card-header" style="display: flex; justify-content: center; align-items: center;">
        <a class="btn btn-primary btn-sm text-uppercase" href="{{route('admin.dvreceivings.index')}}" >
            <i class="fa fa-list"></i>
            {{__('DV Entry')}}
          </a>
        </div>
    </div>
</div>

@endcan
@endsection

@section('scripts')
  <!-- Switch -->
  <script src="{{url('plugins/swtich-netliva/js/netliva_switch.js')}}"></script>
  <script src="{{url('js/admin/orsheaders.js')}}"></script>
  {{-- <script src="{{url('js/admin/disableInspectElecment.js')}}"></script> --}}
@endsection
