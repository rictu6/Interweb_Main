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
            <li class="breadcrumb-item active">{{__('')}}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
@can('view_schedule')



<div class="row">
    <!-- Column -->

    
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">---</h4>
                <div class="text-end">
                    <h2 class="font-light mb-0"><i class="ti-arrow-up text-success"></i> 
                     {{-- {{$files_count_barangaymatters}} --}}
                    
                    </h2>

                </div>

                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar"
                        style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">---</h4>
                <div class="text-end">
                    <h2 class="font-light mb-0"><i class="ti-arrow-up text-info"></i>
                      
                      {{-- {{$files_count_conflictofinterest}} --}}
                    
                    </h2>
                </div>

                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar"
                        style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>

</div>
    <!-- Column -->
</div>
{{-- <div class="card card-primary" style="width: 400px; margin: 0 auto;">
    <div class="card-header" style="display: flex; justify-content: center; align-items: center;">
    <a class="btn btn-primary btn-sm text-uppercase" href="{{route('admin.schedule_list')}}" >
        <i class="fa fa-list"></i>
        {{__('View Schedule')}}
      </a>

    </div>
</div> --}}

@endcan
@endsection

@section('scripts')
  <!-- Switch -->
  <script src="{{url('plugins/swtich-netliva/js/netliva_switch.js')}}"></script>
  <script src="{{url('js/admin/schedules.js')}}"></script>
  {{-- <script src="{{url('js/admin/disableInspectElecment.js')}}"></script> --}}
@endsection
