@extends('layouts.app')

@section('title')
{{__('REGISTRY OF SEMI-EXPENDABLE PROPERTY ISSUED')}}
@endsection

@section('breadcrumb')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">
          <i class="nav-icon fas fa-calculator"></i>
          {{__('REGISTRY OF SEMI-EXPENDABLE PROPERTY ISSUED')}}
        </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.property_issued.index')}}">{{__('Property Issued Dashboard')}}</a></li>
          <li class="breadcrumb-item active">{{__('REGISTRY OF SEMI-EXPENDABLE PROPERTY ISSUED')}}</li>
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
        <h3 class="card-title">{{__('REGISTRY OF SEMI-EXPENDABLE PROPERTY ISSUED')}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- card-body -->
        <div class="card-body">
        {{-- @include('admin.inventory_report._filter_form') --}}
        <div class="row">
            <div class="col-lg-12">
              <!-- Tools -->
              <div id="accordion">
                <div class="card card-info">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="btn btn-primary collapsed" aria-expanded="false">
                    <i class="fas fa-file-excel"></i>
                    {{__('Export Report')}}
                  </a>
                  <div id="collapseOne" class="panel-collapse in collapse">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-12 text-center">
                          <a class="btn btn-success" href="{{route('admin.regsepi.export')}}">
                            <i class="fa fa-file-excel"></i>
                            {{__('Export')}}
                          </a>
                          {{-- <a class="btn btn-success" href="{{route('admin.regsepi.export')}}">
                            <i class="fa fa-file-excel"></i>
                            {{__('Download template')}}
                          </a> --}}
                        </div>
                        <div class="col-lg-12">
                          <!-- import form -->
                          {{-- <form action="{{route('admin.patients.import')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-3">
                              <div class="col-lg-12">
                                <div class="card card-primary">
                                  <div class="card-header">
                                    <h5 class="card-title">
                                        {{__('Import')}}
                                    </h5>
                                  </div>
                                  <div class="card-body">
                                    <div class="input-group">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="import" required>
                                        <label class="custom-file-label" for="exampleInputFile">{{__('Choose file')}}</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">
                                      <i class="fa fa-check"></i>
                                      {{__('Import')}}
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </form> --}}
                          <!-- /import form -->
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- \Tools -->
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12 table-responsive">
              <table id="prop_issued_table" class="table table-striped table-hover table-bordered" width="100%">
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

                </tbody>
              </table>

            </div>
          </div>


</div>





</div>
@endsection

@section('scripts')
    <script src="{{ url('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ url('plugins/print/jQuery.print.min.js') }}"></script>
<script src="{{ url('js/admin/regsepi.js') }}"></script>
@endsection
