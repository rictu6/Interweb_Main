@extends('layouts.app')

@section('title')
{{__('Property Issued Report')}}
@endsection

@section('breadcrumb')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">
          <i class="nav-icon fas fa-calculator"></i>
          {{__('Property Issued Report')}}
        </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.property_issued.index')}}">{{__('Property Issued Dashboard')}}</a></li>
          <li class="breadcrumb-item active">{{__('Property Issued Report')}}</li>
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
        <h3 class="card-title">{{__('Property Issued Report')}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- card-body -->
        <div class="card-body">
            @include('admin.inventory_report._filter_form')


            <div class="printable">
                <div class="row">
                    <div class="col-12 text-center mt-3 mb-3">
                        <h3>{{ __(' Report') }}</h3>
                        <h6 class="text-center">{{ __('Date') }}: {{ date('d-m-Y') }}</h6>

                    </div>
                </div>

                <div class="card card-primary card-outline">
        <div class="card-header">
          <h5 class="card-title">{{__('Report')}}</h5>
          <div class="card-tools no-print">
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body table-responsive">
            @if (count($property_list) > 0)
          <table class="table table-bordered datatable">
            {{-- id="prop_issued_table" --}}
            <thead>
              <tr>
                <th>{{__('Date')}}</th>
                <th>{{__('ICS/RRSP No.')}}</th>
                <th>{{__('Semi-expendable Property No.')}}</th>
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
              </tr>
            </thead>
            <tbody>
                @foreach ($property_list as $prop)
                <tr>
                    <td>{{ $prop->date_acquired}}</td>
                    <td>{{$prop->ics_rrsp_no}}</td>
                    <td>{{$prop->semi_expendable_property_no }}</td>
                    <td>{{$prop->item_description }}</td>
                    <td>{{$prop->estimated_useful_life }}</td>
                    <td>{{$prop->issued_qty}}</td>
                    <td>{{$prop->issued_office }}</td>
                    <td>{{$prop->returned_qty }}</td>
                    <td>{{$prop->returned_office }}</td>
                    <td>{{$prop->re_issued_qty}}</td>
                    <td>{{$prop->re_issued_office}}</td>
                    <td>{{$prop->disposed_qty }}</td>
                    <td>{{$prop->balance_qty }}</td>
                    <td>{{$prop->amount }}</td>
                    <td>{{$prop->remarks }}</td>
                </tr>
            @endforeach
            </tbody>
          </table>
          @else
          <p>No data available</p>
      @endif
        </div>
      </div>

    </div>


</div>

@if(isset($excel))
<div class="card-footer">
  <a href="{{$excel}}" class="btn btn-danger">
  <i class="fas fa-file-pdf"></i> {{__('Excel')}}
  </a>
</div>
@endif

</div>
@endsection

@section('scripts')
    <script src="{{ url('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ url('plugins/print/jQuery.print.min.js') }}"></script>
    <script src="{{ url('js/admin/inventory.js') }}"></script>
@endsection
