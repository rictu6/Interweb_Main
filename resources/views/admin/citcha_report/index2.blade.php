@extends('layouts.app')

@section('title')
    {{__('Client Satisfaction Survey')}}
@endsection

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">
            <i class="nav-icon fas fa-layer-group"></i>
            {{__('Client Satisfaction Survey')}}
          </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.citcha.index')}}">{{__('CSS Dashboard')}}</a></li>
            <li class="breadcrumb-item active"><a href="#">{{__('CSS Listing')}}</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
      <h3 class="card-title">{{__('CitCha Table')}}</h3>
      @can('create_orsheader')
        <a href="{{route('admin.citcha.create')}}" class="btn btn-primary btn-sm float-right">
          <i class="fa fa-plus"></i> {{ __('Create') }}
        </a>
      @endcan
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @include('admin.citcha_report._filter_form')
<!-- filter -->

<!-- \filter -->
       <div class="col-lg-12 table-responsive">


          <table id="csr1_table" class="table table-striped table-hover table-bordered"  width="100%">
            <thead>
              <tr>
                {{-- <th width="10px">#</th> --}}
                <th>{{__('Service Type')}}</th>
                <th>{{__('Required Minimum Number of Responses (Annual)')}}</th>
                <th>{{__('Number of Responses Received')}}</th>
              </tr>
            </thead>
            <tbody>
                @foreach($citchas as $cc)
                <tr>
                    <td>{{$cc->service->description}}</td>
                    <td>{{$service_count}}</td>
                    <td>{{$service_count}}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
       </div>
    </div>
    <!-- /.card-body -->
  </div>

@endsection
@section('scripts')
  <script src="{{url('js/admin/csr.js')}}"></script>
  <script src="{{url('js/admin/disableInspectElecment.js')}}"></script>
@endsection
