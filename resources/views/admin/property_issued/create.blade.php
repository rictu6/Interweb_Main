@extends('layouts.app')

@section('title')
{{ __('Encode Property Issued') }}
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
                    {{__('Property Issued')}}
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a
                            href="{{route('admin.property_issued.index')}}">{{__('Property Management System')}}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.property_issued.index')}}">{{ __('Property Issued Listing') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ __('Encode Property Issued') }}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ __('Property Entry ') }}</h3>
    </div>
    <!-- /.card-header -->
    <form method="POST" action="{{route('admin.property_issued.store')}}" enctype="multipart/form-data" id="">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="property_type">Property Type</label>
                        <select class="form-control" name="property_type_id" id="propertyType" required>
                            @if(isset($property_type)&&isset($property_type['property_type_id']))
                            <option value="{{$property_type['property_type_id']}}" selected>
                                {{$property_type['property_type_description']}}
                            </option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="">Entity Name</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="entity_name" id="" @if(isset($property_issued))
                            value="{{$property_issued->entity_name}}" @endif required>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-4">
                    <label for="">Date Acquired</label>
                    <input type="date" class="form-control" name="date_acquired" id="date_acquired"
                        value="{{ date('MM/DD/YYYY') }}" required>
                </div>
                <div class="col-lg-4">
                    <label for="">ICS/RRSP No</label>
                    <div class="form-group">

                        <input type="text" class="form-control" name="ics_rrsp_no" id="" @if(isset($property_issued))
                            value="{{$property_issued->ics_rrsp_no}}" @endif required>
                    </div>
                </div>
                <div class="col-lg-4">
                    <label for="">Reference</label>
                    <div class="form-group">

                        <input type="text" class="form-control" name="reference" id="" @if(isset($property_issued))
                            value="{{$property_issued->reference}}" @endif required>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-6">
                    <label for="">Semi-expendable Property Name</label>
                    <div class="form-group">

                        <input type="text" class="form-control" name="semi_expendable_property" id=""
                            @if(isset($property_issued)) value="{{$property_issued->semi_expendable_property}}"
                            @endif required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="">Semi-expendable Property No.</label>
                    <div class="form-group">

                        <input type="text" class="form-control" name="semi_expendable_property_no" id=""
                            @if(isset($property_issued)) value="{{$property_issued->semi_expendable_property_no}}"
                            @endif required>
                    </div>
                </div>

            </div>
            <div class="row">

                <div class="col-lg-4">
                    <label for="">Item Description</label>
                    <div class="form-group">
                        <textarea name="item_description" id="" rows="2" class="form-control"
                            placeholder="{{__('Item Description')}}">{{old('item_description')}}</textarea>
                    </div>
                </div>
                <div class="col-lg-4">
                    <label for="">Estimated Useful Life</label>
                    <div class="form-group">
                        <div class="input-group mb-3">

                            <input type="number" class="form-control" placeholder="{{__('Estimated Useful Life')}}"
                                name="estimated_useful_life" id="" @if(isset($property_issued)) value="{{$property_issued->estimated_useful_life}}" @endif
                                required>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <label for="">Status</label>
                    <select class="form-control" name="status" placeholder="{{ __('Select Status') }}" id="status"
                        required>
                        <option value="" disabled selected>{{__('Select Status')}}</option>
                        <option value="0" @if(isset($property_issued)&&$property_issued['status']=='Issued' ) selected @endif>
                            {{__('Issued')}}</option>
                        <option value="1" @if(isset($property_issued)&&$property_issued['status']=='Returned' ) selected @endif>
                            {{__('Returned')}}</option>
                        <option value="2" @if(isset($property_issued)&&$property_issued['status']=='Re-Issued' ) selected @endif>
                            {{__('Re-Issued')}}</option>


                    </select>
                </div>

            </div>


            <div id="statusContent">
                <!-- Dynamic content will be loaded here -->
            </div>
            <div class='row'>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="price">{{__('Amount')}}</label>
                        <div class="input-group form-group mb-6">
                            <input type="number" class="form-control" name="amount" id="" min="0"
                                @if(isset($property_issued)) value="{{$property_issued->price}}" @endif required>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    {{get_currency()}}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="">Remarks</label>
                    <div class="form-group">
                        <textarea name="remarks" id="" rows="2" class="form-control"
                            placeholder="{{__('Remarks')}}">{{old('remarks')}}</textarea>
                    </div>
                </div>
            </div>

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
var rcOption =
    "{{ isset($ors) && isset($ors['details']['responsibilitycenter']['code']) ? $ors['details']['responsibilitycenter']['code'] : '' }}";
var papOption = "{{ isset($ors) && isset($ors['details']['pap']['code']) ? $ors['details']['pap']['code'] : '' }}";
var subOption =
    "{{ isset($ors) && isset($ors['details']['appro_sub_allotment']['sub_allotment_no']) ? $ors['details']['appro_sub_allotment']['sub_allotment_no'] : '' }}";
var uacsOption =
    "{{ isset($ors) && isset($ors['details']['approsetupdtl_uacs']['uacs_subobject_code']) ? $ors['details']['approsetupdtl_uacs']['uacs_subobject_code'] : '' }}";
var currency = " {{get_currency()}}"
</script>
{{-- <script>
    $(document).ready(function() {
        $('#surveyType').change(function() {
            var selectedValue = $(this).val();
            // You can do something with the selectedSurveyType variable here
            console.log('Selected Survey Type:', selectedValue);
            // Assign selected value to a hidden input field or perform any other action as needed
            $('#surveyType').val(selectedValue);

    @if($selectedValue == 1)
    @include('admin.citcha._online')
    @else
    @include('admin.citcha._onsite')
    @endif
        });
    });


<script src="{{url('plugins/datetimepicker/js/jquery.datetimepicker.full.js')}}"></script>
{{-- <script src="{{url('js/admin/disableInspectElecment.js')}}"></script> --}}
<script src="{{url('js/admin/property_issued.js')}}"></script>
@endsection
