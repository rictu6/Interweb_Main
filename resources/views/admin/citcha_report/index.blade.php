@extends('layouts.app')

@section('title')
    {{ __('CSS DILG6') }}
@endsection

@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <i class="nav-icon fas fa-calculator"></i>
                        {{ __('CSS DILG6') }}
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('CSS Report') }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <div class="card card-primary">
        <!-- card-header -->
        <div class="card-header">
            <h3 class="card-title">{{ __('CSS Report') }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- card-body -->
        <div class="card-body">

            <!-- Filtering Form -->
            @include('admin.citcha_report._filter_form')
            <!-- Filtering Form -->
            {{-- @if (request()->has('date') || request()->has('citchas')) --}}
            <div class="printable">
                <div class="row">
                    <div class="col-12 text-center mt-3 mb-3">
                        <h3>{{ __('CSS Report') }}</h3>
                        <h6 class="text-center">{{ __('Date') }}: {{ date('d-m-Y') }}</h6>
                        {{-- <p>
            <b>{{__('From')}}</b>
            {{date('d-m-Y',strtotime($from))}}
            <b>{{__('To')}}</b>
            {{date('d-m-Y',strtotime($to))}}
          </p> --}}
                    </div>
                </div>

                <!-- Report Details -->
                @if (request()->has('show_csr1'))
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title">{{ __('Part 1') }}</h5>
                            <div class="card-tools no-print">
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                        class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-responsive">

                            @if (count($citchas) > 0)
                                <table class="table table-bordered" width="100%">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Service Type') }}</th>
                                            <th>{{ __('Required Minimum Number of Responses (Annual)') }}</th>
                                            <th>{{ __('Number of Responses Received') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($citchas as $cc)
                                            <tr>
                                                <td>
                                                    @if (isset($cc->service))
                                                        {{ $cc->service->description }}
                                                    @endif
                                                </td>
                                                <td>{{ $service_min }}</td>
                                                <td>{{ $serviceCounts[$cc->service_id] ?? 0 }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>No data available</p>
                            @endif
                        </div>
                    </div>
                @endif
                <!-- \Report Details -->

                <!-- Expenses Details -->
                @if (request()->has('show_expenses'))
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title">{{ __('Expenses') }}</h5>
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
                                        <th>{{ __('Category') }}</th>
                                        <th>{{ __('Date') }}</th>
                                        <th>{{ __('Amount') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($expenses as $expense)
                                        <tr>
                                            <td>{{ $expense['category']['name'] }}</td>
                                            <td>{{ date('d-m-Y', strtotime($expense['date'])) }}</td>
                                            <td>{{ formated_price($expense['amount']) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
                <!-- \Expenses Details -->

                <!--  Report Summary  -->
                {{-- <div class="card card-primary card-outline">
        <div class="card-header">
          <h5 class="card-title">{{__('Accounting Report Summary')}}</h5>
          <div class="card-tools no-print">
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        {{-- <div class="card-body table-responsive">
          <table class="table table-hover table-stripped">

            <tbody>
              <tr>
                <th width="100px">{{__('Total')}}:</th>
                <td>{{formated_price($total)}}</td>
              </tr>
              <tr>
                <th width="100px">{{__('Paid')}}:</th>
                <td>{{formated_price($paid)}}</td>
              </tr>
              <tr>
                <th width="100px">{{__('Due')}}:</th>
                <td>{{formated_price($due)}}</td>
              </tr>
              @if (request()->has('show_expenses'))
              <tr>
                <th width="100px">{{__('Expenses')}}:</th>
                <td>{{formated_price($total_expenses)}}</td>
              </tr>
              @endif
              @if (request()->has('show_profit'))
              <tr>
                <th width="100px">{{__('Profit')}}:</th>
                <td>{{formated_price($profit)}}</td>
              </tr>
              @endif
            </tbody>
          </table>
        </div> --}}
            </div>
            <!-- \ Report Summary-->
            {{-- </div> --}}
            {{-- @endif --}}
        </div>
        <!-- /.card-body -->

        <!-- card-footer -->
        @if (isset($pdf))
            <div class="card-footer">
                <a href="{{ $pdf }}" class="btn btn-danger">
                    <i class="fas fa-file-pdf"></i> {{ __('PDF') }}
                </a>
            </div>
        @endif
        <!-- /.card-footer -->
    </div>

@endsection
@section('scripts')
    <script src="{{ url('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ url('plugins/print/jQuery.print.min.js') }}"></script>
    <script src="{{ url('js/admin/csr.js') }}"></script>
@endsection
