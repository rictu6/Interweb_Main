@extends('layouts.app')

@section('title')
    {{ __('Field Office Report') }}
@endsection

@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <i class="nav-icon fas fa-calculator"></i>
                        {{ __('Monthly') }}
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a
                                href="{{ route('admin.orsheaders.index') }}">{{ __('FDMS Dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Report') }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    {{-- @can('view_accounting_reports', 'generate_report_accounting') --}}
    <div class="card card-primary">
        <!-- card-header -->
        <div class="card-header">
            <h3 class="card-title">{{ __('Cash Register Report') }}</h3>
        </div>

        <div class="card-body">
            <!-- filter -->
            <div id="accordion">
                <div class="card card-info">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="btn btn-primary collapsed"
                        aria-expanded="false">
                        <i class="fas fa-filter"></i> {{ __('Filters') }}
                    </a>
                    <div id="collapseOne" class="panel-collapse in collapse">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="filter_date">{{ __('Date') }}</label>
                                        <input type="text" class="form-control datepickerrange" id="filter_date"
                                            placeholder="{{ __('Date') }}">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="filter_status">{{ __('Leave Type') }}</label>
                                        <select name="filter_leave" id="filter_leave" class="form-control select2">
                                            <option value="" selected>{{ __('All') }}</option>
                                            <option value="OFFICIAL BUSINESS">{{ __('OFFICIAL BUSINESS') }}</option>
                                            <option value="PERSONAL">{{ __('PERSONAL') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="filter_status">{{ __('Destination') }}</label>
                                        <select name="filter_destination" id="filter_destination"
                                            class="form-control select2">
                                            <option value="" selected>{{ __('All') }}</option>
                                            <option value="WITHIN PHILIPPINES">{{ __('WITHIN PHILIPPINES') }}</option>
                                            <option value="FOREIGN">{{ __('FOREIGN') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="filter_status">{{ __('Status') }}</label>
                                        <select name="filter_status" id="filter_status" class="form-control select2">
                                            <option value="" selected>{{ __('All') }}</option>
                                            <option value="done">{{ __('Done') }}</option>
                                            <option value="ongoing">{{ __('Ongoing') }}</option>
                                        </select>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- \filter -->
            <!-- Filtering Form -->
            {{-- @include('admin.accounting._filter_form') --}}
            <!-- Filtering Form -->

            <div class="printable">
                <div class="row">
                    <div class="col-12 text-center mt-3 mb-3">
                        <h3>{{ __('PROVINCIAL OFFICE') }}</h3>
                        {{-- <h3>{{__('Field Fund Monitoring Report')}}</h3> --}}
                        <h3>{{ __('STATEMENT OF ALLOTMENT AND OBLIGATION INCURRED') }}</h3>
                        <h6 class="text-center">{{ __('As of') }}: {{ date('d-m-Y') }}</h6>
                        {{-- <p>
            <b>{{__('From')}}</b>
            {{date('d-m-Y',strtotime($from))}}
            <b>{{__('To')}}</b>
            {{date('d-m-Y',strtotime($to))}}
          </p> --}}
                    </div>
                </div>


                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="card-title">{{ __('Report') }}</h5>
                        <div class="card-tools no-print">
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>{{ __('UACS Code') }}</th>
                                    <th>{{ __('Allotment Class') }}</th>
                                    <th>{{ __('Allotment') }}</th>
                                    <th>{{ __('Obligation') }}</th>
                                    <th>{{ __('UNLQDT') }}</th>
                                    <th>{{ __('Allotment') }}</th>
                                    <th>{{ __('Obligation') }}</th>
                                    <th>{{ __('UNLQDT/Payments') }}</th>



                                    {{-- <th>{{__('Withholding Tax')}}</th> --}}
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($reports as $ors)
                                    <tr>
                                        <td>{{ $ors->uacs_code }}</td>
                                        <td>{{ $ors->allotment_class }}</td>
                                        <td>{{ $ors->allotment_amt }}</td>
                                        <td>{{ $ors->obli }}</td>
                                        <td>{{ $ors->unlqdt }}</td>
                                        <td>{{ $ors->allotment_amount }}</td>
                                        <td>{{ $ors->obligation }}</td>
                                        <td>{{ $ors->unliquidated }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>

                {{-- <div class="card card-primary card-outline">
        <div class="card-header">
          <h5 class="card-title">{{__('Accounting Report Summary')}}</h5>
          <div class="card-tools no-print">
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-hover table-stripped">

            <tbody>
              <tr>
                <th width="100px">{{__('Total')}}:</th>
                {{-- <td>{{formated_price($total)}}</td> --}}
                {{-- </tr>

            </tbody>
          </table>
        </div>
      </div>  --}}

            </div>

        </div>

        @if (isset($pdf))
            <div class="card-footer">
                <a href="{{ $pdf }}" class="btn btn-danger">
                    <i class="fas fa-file-pdf"></i> {{ __('PDF') }}
                </a>
            </div>
        @endif

    </div>
    {{-- @endcan --}}
@endsection
@section('scripts')
    {{-- <script src="{{url('plugins/daterangepicker/daterangepicker.js')}}"></script> --}}
    <script src="{{ url('plugins/print/jQuery.print.min.js') }}"></script>
    <script src="{{ url('js/admin/accounting.js') }}"></script>
@endsection
