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
            <li class="breadcrumb-item active"><a href="#">{{__('ORS Listing')}}</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
      <h3 class="card-title">{{__('ORS Listing Table')}}</h3>
      @can('create_orsheader')
        <a href="{{route('admin.orsheaders.create')}}" class="btn btn-primary btn-sm float-right">
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
                      <label for="filter_year">{{__('Year')}}</label>
                      <select   id="filter_year"
                      class="form-control" name='year'>
                        <option value="">Year</option>
                          <option value="2023">2023</option>
                           <option value="2022">2022</option>
                           </select>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label for="filter_month">{{__('Month')}}</label>
                      <select   id="filter_month"
                      class="form-control" name='month'>
                        <option value="">Month</option>
                          <option value="01">January</option>
                           <option value="02">February</option>
                           <option value="03">March</option>
                           <option value="04">April</option>
                           <option value="05">May</option>
                           <option value="06">June</option>
                           <option value="07">July</option>
                           <option value="08">August</option>
                           <option value="09">September</option>
                           <option value="10">October</option>
                           <option value="11">November</option>
                           <option value="12">December</option>
                           </select>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label for="filter_payee">{{__('Payee')}}</label>
                      <select class="form-control" name="filter_payee" id="filter_payee" required>
                        @if(isset($ors)&&isset($ors['payee']))
                        <option value="{{$ors['payee']['payee_id']}}" selected>{{$ors['payee']['name']}}
                        </option>
                        @endif
                    </select>
                   </div>
                 </div>
                 <div class="col-lg-3">
                    <div class="form-group">
                      <label for="filter_auth">{{__('Authorization')}}</label>
                      <select class="form-control" name="filter_auth" id="filter_auth">
                        @if(isset($ors)&&isset($ors['budgettype']))
                        <option value="{{$ors['budgettype']['budget_type_id']}}" selected> {{$ors['budgettype']['description']}}
                        </option>
                        @endif
                    </select>
                   </div>
                 </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label for="filter_no">{{__('ORS No')}}</label>
                      <select class="form-control" name="filter_no" id="filter_no">
                        @if(isset($ors)&&isset($ors['ors_no']))
                        <option value="{{$ors['ors_no']}}" selected> {{$ors['ors_no']}}
                        </option>
                        @endif
                    </select>
                   </div>
                 </div>
                {{-- <div class="col-lg-3">
                   <div class="form-group">
                     <label for="filter_date">{{__('ORS Date')}}</label>
                     <input type="text" class="form-control datepicker" id="filter_date" placeholder="{{__('ORS Date')}}">
                  </div>
                </div> --}}
                {{-- <div class="col-lg-3">
                    <div class="form-group">
                       <label for="filter_allotment">{{__('Allotment Class')}}</label>
                       <select class="form-control" name="ors_no" id="filter_allotment">
                        @if(isset($ors)&&isset($ors['ors_no']))
                        <option value="{{$ors['ors_no']}}" selected> {{$ors['ors_no']}}
                        </option>
                        @endif
                    </select>
                    </div>
                  </div> --}}
                  <div class="col-lg-3">
                      <div class="form-group">
                         <label for="filter_fundcluster">{{__('Fund Cluster')}}</label>
                         <select class="form-control" name="filter_fundcluster" id="filter_fundcluster">
                            @if(isset($ors)&&isset($ors['fundcluster']))
                            <option value="{{$ors['fundcluster']['fund_cluster_id']}}" selected> {{$ors['fundcluster']['description']}}
                            </option>
                            @endif
                        </select>
                      </div>
                    </div>
                <div class="col-lg-3">
                    <div class="form-group">
                       <label for="filter_fundsource">{{__('Fund Source')}}</label>
                       <select class="form-control" name="filter_fundsource" id="filter_fundsource">
                        @if(isset($ors)&&isset($ors['fundsource']))
                        <option value="{{$ors['fundsource']['fund_source_id']}}" selected> {{$ors['fundsource']['description']}}
                        </option>
                        @endif
                    </select>
                    </div>
                  </div>
                  {{-- <div class="col-lg-3">
                    <div class="form-group">
                    <button id="searchButton" class="btn btn-primary">Search</button>
                  </div>
                </div>  --}}

              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- \filter -->
       <div class="col-lg-12 table-responsive">
          <table id="ordheaders_table" class="table table-striped table-hover table-bordered"  width="100%">
            <thead>
              <tr>
                {{-- <th width="10px">#</th> --}}

                <th>{{__('ORS No')}}</th>
                <th>{{__('Allotment Class/ Fund Source')}}</th>
                <th>{{__('Payee/ Particulars')}}</th>
                <th>{{__('Amount')}}</th>
                <th>{{__('Processed By ')}}</th>
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
  <script src="{{url('js/admin/orsheaders.js')}}"></script>
  <script src="{{url('js/admin/disableInspectElecment.js')}}"></script>
@endsection
