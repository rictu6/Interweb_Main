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
                    {{__('ORS')}}
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.orsheaders.index')}}">{{__('FDMS')}}</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.orsheader_list')}}">{{ __('ORS Listing') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ __('Encode ORS') }}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ __('Create ORS ') }}</h3>
    </div>
    <!-- /.card-header -->
    <form method="POST" action="{{route('admin.orsheaders.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="col-lg-12">
                @include('admin.orsheaders._form_test')
            </div>
        </div>
        <div class="card-footer">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-check"></i> {{__('Save')}}
                </button>
            </div>
        </div>
    </form>
    <!-- /.card-body -->
</div>



@endsection
@section('scripts')
<script>

    $('.add_component').on('click', function() {

    count++;
    $('.components .items').append(`
     <tr  num="${count}" >
      <td>

        <div class="form-group">

                                            <select class="form-control responsibility_center" name="ORSDetails[${count}][responsibility_center]"
                                                id="responsibility_center${count}">
                                                @if(isset($ors)&&isset($ors['orsdetails']))
                                                <option value="{{$ors['orsdetails']['responsibilitycenter']}}" selected>
                                                    {{$ors['orsdetails']['responsibilitycenter']['code']}} -
                                                    {{$ors['orsdetails']['responsibilitycenter']['description']}}
                                                </option>
                                                @endif
                                            </select>
      </td>

      <td>
      <div class="form-group">



      <select class="form-control allotment_class_id" name="ORSDetails[${count}[allotment_class_id]" placeholder="{{__(' to')}}"
      id="allotment_class_id${count}" required>
          <option value="" disabled selected>CHARGE TO</option>
          <option value="1" {{ old('charallotment_class_id') =="ALLOTMENT"? "selected" : '' }}>
                  {{__('ALLOTMENT')}}</option>
          <option value="2" {{ old('allotment_class_id') =="SUB- ALLOTMENT"? "selected" : '' }}>
                  {{__('SUB- ALLOTMENT')}}</option>

      </select>
  </div>
      </td>

      <td>
           <div class="form-group">

                                            <select class="form-control pap_id" name="ORSDetails[${count}][pap_id]" id="pap_id${count}">
                                            @if(isset($ors)&&isset($ors['pap_id']))
                                            <option value="{{$ors['orsdetails']['pap_id']}}" selected>
                                                {{$ors['orsdetails']['pap']['code']}} -
                                                {{$ors['orsdetails']['pap']['description']}}
                                            </option>
                                            @endif
                                            </select>
           </div>
      </td>

    <td>
                                    <div class="form-group">

                                        <select class="form-control sub_allotment_id" name="ORSDetails[${count}][sub_allotment_id]"
                                         id="sub_allotment_id${count}">
                                            @if(isset($ors)&&isset($ors['suballotment']))
                                            <option value="{{$ors['ORSDetails']['sub_allotment_id']}}" selected>
                                            {{$ors['ORSDetails']['appro_sub_allotment']['sub_allotment_no']}}
                                        </option>
                                            @endif
                                        </select>
                                    </div>
                                </td>
        <td>
           <div class="form-group">

                                            <select class="form-control uacs_subobject_code" name="ORSDetails[${count}][uacs_subobject_code]"
                                            id="uacs_subobject_code${count}">
                                                @if(isset($ors)&&isset($ors['fundsource']))
                                                <option value="{{$ors['ORSDetails']['uacs_id']}}" selected>
                                                {{$ors['ORSDetails']['approsetupdtl_uacs']['uacs_subobject_code']}}
                                            </option>
                                                @endif
                                            </select>
           </div>
      </td>
      <td>
                                        <div class="form-group">
                                                            <div class="input-group form-group mb-3">
                                                                <input type="number" class="form-control amount" name="ORSDetails[${count}][amount]"  min="0" class="amount" required>
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
    $('#component_' + count).find('textarea').summernote({
        toolbar: []
    });
});
</script>
<script src="{{url('plugins/datetimepicker/js/jquery.datetimepicker.full.js')}}"></script>
<script src="{{url('js/admin/disableInspectElecment.js')}}"></script>
<script src="{{url('js/admin/orsheaders.js')}}"></script>
@endsection
