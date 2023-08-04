@extends('layouts.app')

@section('title')
{{ __('Encode ORS') }}
@endsection

@section('css')
    <link rel="stylesheet" href="{{url('plugins/datetimepicker/css/jquery.datetimepicker.min.css')}}">
@endsection

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fa fa-home"></i>
                    {{__('Allotment')}}
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.orsheaders.index')}}">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.orsheader_list')}}">{{ __('FDMS') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ __('Encode Allotment') }}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ __('Create Allotment') }}</h3>
    </div>
    <!-- /.card-header -->
    <form method="POST" action="{{route('admin.allotments.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="col-lg-12">
                @include('admin.allotments._form_allotment')
            </div>
        </div>
        <div class="card-footer">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-check"></i>  {{__('Save')}}
                </button>
            </div>
        </div>
    </form>
    <!-- /.card-body -->
</div>



@endsection
@section('scripts')
<script>
    //components
    var count=$('#count').val();
 $('.add_component').on('click',function(){
   count++;
   $('.components .items').append(`
   <tr dtl_id="approdtls${count}" num="${count}">
    <td>
        <div class="form-group">
        <select class="form-control" id="uacs_subobject_code" name="approdtls[${count}][uacs_subobject_code]" >
        <option value="">Select</option>
        @foreach ($uacs as $row)
        <option value="{{$row->uacs_subobject_id}}">{{ $row->code}} - {{ $row->description}}</option>
        @endforeach
        </select>
        </div>
    </td>
                                                <td>
                                            <div class="form-group">
                                                                <div class="input-group form-group mb-3">
                                                                    <input type="number" class="form-control" name="approdtls[${count}][allotment_received]"  min="0" class="allotment_received" required>
                                                                    <div class="input-group-append">
                                                                    <span class="input-group-text">
                                                                        {{get_currency()}}
                                                                    </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger delete_row">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
   </tr>
   `);
   //initialize text editor
   $('#component_'+count).find('textarea').summernote({
       toolbar: []
   });
});
</script>
    <script src="{{url('plugins/datetimepicker/js/jquery.datetimepicker.full.js')}}"></script>
    <script src="{{url('js/admin/disableInspectElecment.js')}}"></script>
    <script src="{{url('js/admin/allotment.js')}}"></script>
@endsection
