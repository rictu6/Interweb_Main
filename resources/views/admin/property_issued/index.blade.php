@extends('layouts.app')

@section('title')
    {{__('Property Issued')}}
@endsection

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">
            <i class="nav-icon fas fa-layer-group"></i>
            {{__('Property Issued')}}
          </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.property_issued.index')}}">{{__('Semi Property Issued')}}</a></li>
            <li class="breadcrumb-item active"><a href="#">{{__('Semi Property Issued Listing')}}</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
      <h3 class="card-title">{{__('Semi Property Issued Table')}}</h3>
      @can('create_orsheader')
        <a href="{{route('admin.property_issued.create')}}" class="btn btn-primary btn-sm float-right">
          <i class="fa fa-plus"></i> {{ __('Create') }}
        </a>
      @endcan
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        {{-- @include('admin.property_issued._filter_form') --}}
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
                  <label for="filter_service">{{__('Service Type')}}</label>
                  <select class="form-control" name="filter_service" id="filter_service_cc" required>
                    @if(isset($ors)&&isset($ors['service']))
                    <option value="{{$ors['service']['service_id']}}" selected>{{$ors['service']['description']}}
                    </option>
                    @endif
                </select>
               </div>
             </div>
             <div class="col-lg-3">
                <div class="form-group">
                  <label for="filter_month">{{__('Month')}}</label>
                  <select   id="filter_month_cc"
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
          <table id="property_issued_table" class="table table-striped table-hover table-bordered"  width="100%">
            <thead>
              <tr>
                {{-- <th width="10px">#</th> --}}
                <th>{{__('Date')}}</th>
                <th>{{__('ICS/RRSP No.')}}</th>
                <th>{{__('Sem-expendable Property No.')}}</th>
                <th>{{__('Item Description')}}</th>
                <th>{{__('Estimated Useful Life')}}</th>
                <th>{{__('Issued Qty')}}</th>
                <th>{{__('Issued Office/Officer')}}</th>
                <th>{{__('Returned Qty')}}</th>
                <th>{{__('Returned Office/Officer')}}</th>
                <th>{{__('Re-Issued Qty')}}</th>
                <th>{{__('Re-Issued Office/Officer')}}</th>
                <th>{{__('Disposed Qty')}}</th>
                <th>{{__('Balance Qty')}}</th>
                <th>{{__('Amount')}}</th>
                <th>{{__('Remarks')}}</th>
                {{-- <th width="100px">{{__('Action')}}</th> --}}
              </tr>
            </thead>
            <tbody>

            </tbody>

          </table>
       </div>
    </div>
    <!-- /.card-body -->
    {{-- <div class="card-footer text-right">

        <button type="button" id='' class="btn btn-primary">Generate Property Issued Registry</button>
    </div> --}}
    {{-- <div class="card-footer">
        <a href="{{$excel}}" class="btn btn-danger">
            <i class="fas fa-file-pdf"></i> {{ __('Generate Property Issued Registry') }}
        </a>
    </div> --}}
  </div>
</div>

@endsection
@section('scripts')
  <script src="{{url('js/admin/property_issued.js')}}"></script>
  <script src="{{url('js/admin/disableInspectElecment.js')}}"></script>
@endsection
