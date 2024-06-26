@extends('layouts.app')

@section('title')
    {{__('Fund Disbursement Monitoring System')}}
@endsection

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">
            <i class="nav-icon fas fa-layer-group"></i>
            {{__('Fund Disbursement Monitoring System')}}
          </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.orsheaders.index')}}">{{__('FDMS Dashboard')}}</a></li>
            <li class="breadcrumb-item active"><a href="#">{{__('Allotment Listing')}}</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
      <h3 class="card-title">{{__('Allotment Listing Table')}}</h3>
      @can('create_suballotment')
        <a href="{{route('admin.allotments.create')}}" class="btn btn-primary btn-sm float-right">
          <i class="fa fa-plus"></i> {{ __('Create') }}
        </a>
      @endcan
    </div>
    <!-- /.card-header -->
    <div class="card-body">

       <div class="col-lg-12 table-responsive">
          <table id="sub_table" class="table table-striped table-hover table-bordered"  width="100%">
            <thead>
              <tr>
                {{-- <th width="10px">#</th> --}}
                <th>{{__('Sub-allotment No')}}</th>
                <th>{{__('Particulars')}}</th>
                <th>{{__('UACS')}}</th>
                <th>{{__('Allotment Received')}}</th>
                <th>{{__('Date')}}</th>
                <th>{{__('Unobligated Balance of Allotment')}}</th>
                {{-- <th width="100px">{{__('Action')}}</th> --}}
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
  <script src="{{url('js/admin/allotment.js')}}"></script>
  <script src="{{url('js/admin/disableInspectElecment.js')}}"></script>
@endsection
