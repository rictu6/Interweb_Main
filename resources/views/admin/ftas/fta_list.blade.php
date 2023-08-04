@extends('layouts.app')

@section('title')
    {{__('Foreign Travel Authority')}}
@endsection

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">
            <i class="nav-icon fas fa-layer-group"></i>
            {{__('Foreign Travel Authority')}}
          </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.ftas.index')}}">{{__('FTA Dashboard')}}</a></li>
            <li class="breadcrumb-item active"><a href="#">{{__('FTA')}}</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
      <h3 class="card-title">{{__('Foreign Travel Authority Table')}}</h3>
      @can('create_fta')
        <a href="{{route('admin.ftas.create')}}" class="btn btn-primary btn-sm float-right">
          <i class="fa fa-plus"></i> {{ __('Create') }}
        </a>
      @endcan
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <!-- filter -->
      <div id="accordion">
        <div class="card card-info">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="btn btn-primary collapsed" aria-expanded="false">
            <i class="fas fa-filter"></i> {{__('Filters')}}
          </a>
          <div id="collapseOne" class="panel-collapse in collapse">
            <div class="card-body">
              <div class="row justify-content-center">
                <div class="col-lg-3">
                   <div class="form-group">
                     <label for="filter_date">{{__('Date')}}</label>
                     <input type="text" class="form-control datepickerrange" id="filter_date" placeholder="{{__('Date')}}">
                  </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                       <label for="filter_status">{{__('Leave Type')}}</label>
                       <select name="filter_leave" id="filter_leave" class="form-control select2">
                          <option value="" selected>{{__('All')}}</option>
                          <option value="OFFICIAL BUSINESS">{{__('OFFICIAL BUSINESS')}}</option>
                          <option value="PERSONAL">{{__('PERSONAL')}}</option>
                       </select>
                    </div>
                  </div>
                  <div class="col-lg-3">
                      <div class="form-group">
                         <label for="filter_status">{{__('Destination')}}</label>
                         <select name="filter_destination" id="filter_destination" class="form-control select2">
                            <option value="" selected>{{__('All')}}</option>
                            <option value="WITHIN PHILIPPINES">{{__('WITHIN PHILIPPINES')}}</option>
                            <option value="FOREIGN">{{__('FOREIGN')}}</option>
                         </select>
                      </div>
                    </div>
                <div class="col-lg-3">
                    <div class="form-group">
                       <label for="filter_status">{{__('Status')}}</label>
                       <select name="filter_status" id="filter_status" class="form-control select2">
                          <option value="" selected>{{__('All')}}</option>
                          <option value="done">{{__('Done')}}</option>
                          <option value="ongoing">{{__('Ongoing')}}</option>
                       </select>
                    </div>
                  </div>



              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- \filter -->
       <div class="col-lg-12 table-responsive">
          <table id="ftas_table" class="table table-striped table-hover table-bordered"  width="100%">
            <thead>
              <tr>
                <th width="10px">#</th>

                <th>{{__('Fullname')}}</th>
                <th>{{__('Leave Type')}}</th>
                <th>{{__('Destination')}}</th>
                <th>{{__('Designation')}}</th>
                <th>{{__('Province/HUC')}}</th>
                <th>{{__('Municipality/City')}}</th>
                <th>{{__('Date From')}}</th>
                <th>{{__('Date To')}}</th>
                <th>{{__('Frequency of travel')}}</th>
                <th>{{__('Status')}}</th>
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
  <script src="{{url('js/admin/ftas.js')}}"></script>
  <script src="{{url('js/admin/disableInspectElecment.js')}}"></script>
@endsection
