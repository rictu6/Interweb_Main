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
            <li class="breadcrumb-item active"><a href="#">{{__('DV Receiving Listing')}}</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
      <h3 class="card-title">{{__('DV Receiving Table')}}</h3>
      @can('create_dvreceive')
        <a href="{{route('admin.dvreceivings.create')}}" class="btn btn-primary btn-sm float-right">
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
                      <label for="filter_type">{{__('DV Type')}}</label>
                      <select class="form-control" name="filter_type" id="filter_type" required>
                        @if(isset($ors)&&isset($ors['payee']))
                        <option value="{{$ors['payee']['payee_id']}}" selected>{{$ors['payee']['name']}}
                        </option>
                        @endif
                    </select>
                   </div>
                 </div>

                  <div class="col-lg-3">
                    <div class="form-group">
                      <label for="filter_orsno">{{__('ORS No')}}</label>
                      <select class="form-control" name="filter_orsno" id="filter_orsno">
                        @if(isset($ors)&&isset($ors['ors_no']))
                        <option value="{{$ors['ors_no']}}" selected> {{$ors['ors_no']}}
                        </option>
                        @endif
                    </select>
                   </div>
                 </div>
                 <div class="col-lg-3">
                    <div class="form-group">
                      <label for="filter_dvno">{{__('DV No')}}</label>
                      <select class="form-control" name="filter_dvno" id="filter_dvno">
                        @if(isset($ors)&&isset($ors['ors_no']))
                        <option value="{{$ors['ors_no']}}" selected> {{$ors['ors_no']}}
                        </option>
                        @endif
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
          <table id="dv_receiving_table" class="table table-striped table-hover table-bordered"  width="100%">
            <thead>
              <tr>
                {{-- <th width="10px">#</th> --}}
                <th>{{__('DV No')}}</th>
                <th>{{__('ORS No')}}</th>
                <th>{{__('Payee')}}</th>
                <th>{{__('Processed By ')}}</th>
                <th>{{__('Generated By ')}}</th>
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
  <script src="{{url('js/admin/dvreceivings.js')}}"></script>
  <script src="{{url('js/admin/disableInspectElecment.js')}}"></script>
@endsection
