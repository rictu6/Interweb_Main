@extends('layouts.app')

@section('title')
{{__('Accounting')}}
@endsection

@section('breadcrumb')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">
          <i class="nav-icon fas fa-calculator"></i>
          {{__('Accounting')}}
        </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.orsheaders.index')}}">{{__('FDMS Dashboard')}}</a></li>
          <li class="breadcrumb-item active">{{__('Accounting')}}</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
@can('view_accounting_reports','generate_report_accounting')
<div class="card card-primary">
  <!-- card-header -->
  <div class="card-header">
    <h3 class="card-title">{{__('Accounting Report')}}</h3>
  </div>

  <div class="card-body">

    <!-- Filtering Form -->
    {{-- @include('admin.accounting._filter_form') --}}
    <!-- Filtering Form -->

    <div class="printable">
      <div class="row">
        <div class="col-12 text-center mt-3 mb-3">
          <h3>{{__('Accounting Report')}}</h3>
          <h6 class="text-center">{{__('Due Date')}}: {{date('d-m-Y')}}</h6>
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
          <h5 class="card-title">{{__('Group Tests')}}</h5>
          <div class="card-tools no-print">
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-bordered datatable">
            <thead>
              <tr>
                <th>{{__('Date')}}</th>
                <th>{{__('DV No')}}</th>
                <th>{{__('Check No')}}</th>
                <th>{{__('ORS No')}}</th>
                <th>{{__('Payee')}}</th>
                <th>{{__('Deposits')}}</th>
                <th>{{__('Withdrawal/Payments')}}</th>
                <th>{{__('Balance')}}</th>
                <th>{{__('Account Description')}}</th>
                <th>{{__('UACS Code')}}</th>

                {{-- <th>{{__('Withholding Tax')}}</th> --}}
              </tr>
            </thead>
            <tbody>
                @foreach($reports as $ors)
                <tr>
                    <td>{{ $ors->date }}</td>
                    <td>{{ $ors->dv_no }}</td>
                    <td>{{ $ors->check_no }}</td>
                    <td>{{ $ors->ors_no }}</td>
                    <td>{{ $ors->payee }}</td>
                    <td>{{ $ors->deposits }}</td>
                    <td>{{ $ors->payments }}</td>
                    <td>{{ $ors->balance }}</td>
                    <td>{{ $ors->account_desc }}</td>
                    <td>{{ $ors->uacs_code }}</td>

                </tr>
                @endforeach
            </tbody>

          </table>
        </div>
      </div>

      <div class="card card-primary card-outline">
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
              </tr>

            </tbody>
          </table>
        </div>
      </div>

    </div>

  </div>

  @if(isset($pdf))
  <div class="card-footer">
    <a href="{{$pdf}}" class="btn btn-danger">
       <i class="fas fa-file-pdf"></i> {{__('PDF')}}
    </a>
  </div>
  @endif

</div>
@endcan
@endsection
@section('scripts')
{{-- <script src="{{url('plugins/daterangepicker/daterangepicker.js')}}"></script> --}}
<script src="{{url('plugins/print/jQuery.print.min.js')}}"></script>
<script src="{{url('js/admin/accounting.js')}}"></script>
@endsection
