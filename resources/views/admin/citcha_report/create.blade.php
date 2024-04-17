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
        <h3 class="card-title">{{ __('Create Survey ') }}</h3>
    </div>
    <!-- /.card-header -->
    <form method="POST" action="{{route('admin.citcha.store')}}" enctype="multipart/form-data" id="cc_form">
        @csrf
        <div class="card-body">

            <div class="col-lg-12">
                <div class="form-group">
                    <label for="surveyType">Survey Type</label>
                    <select class="form-control" name="survey_type" id="surveyType" required>
                        <option value="0" selected disabled>{{__('Select Survey Type')}}</option>
                        <option value="1" {{ old('survey_type') == "Online" ? 'selected' : '' }}>
                            {{ __('Online') }}</option>
                        <option value="2" {{ old('survey_type') == "Onsite" ? 'selected' : '' }}>
                            {{ __('Onsite') }}</option>
                    </select>
                </div>

                <input type="hidden" id="surveyType" name="selected_survey_type">

                <div class="form-group">
                    <label for="id">{{__('Services')}}</label>
                    <select class="form-control" name="service_id" id="services"placeholder="{{ __('Please select the service you availed') }}">
                        @if(isset($service)&&isset($service['id']))
                        <option value="{{$service['id']}}" selected>{{$service['id']}} -{{$service['description']}}
                        </option>
                        @endif
                    </select>
                </div>



                <div class="row">

                    <div class="col-4">
                        <label for="">Date the Docs Released</label>
                        <input type="date" class="form-control" name="date_doc_released" id="ors_date" value="{{ date('MM/DD/YYYY') }}" required>
                    </div>
                    <div class="col-4">
                        <label for="">Date Service Rendered</label>
                        <input type="date" class="form-control" name ="date_service_rendered"id="" placeholder="Select Date Received">
                    </div>
                    <div class="col-4">
                        <label for="">Client Type</label>
                        <select class="form-control" name="client_type" placeholder="{{ __('select Client Type') }}" id="" required>
                            <option value="1" {{ old('ors_type') == "Client" ? '' : 'selected' }}>
                                {{ __('Client') }}</option>
                            <option value="2" {{ old('ors_type') == "Business" ? 'selected' : '' }}>
                                {{ __('Business') }}</option>
                            <option value="3" {{ old('ors_type') == "Government(Employee or from another agency)" ? 'selected' : '' }}>
                                {{ __('Government(Employee or from another agency)') }}</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <label for="">Name</label>
                       <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">
                                  <i class="fa fa-user"></i>
                              </span>
                            </div>
                            <input type="text" class="form-control"  name="name" id="name" @if(isset($citcha)) value="{{$citcha->name}}" @endif required>
                        </div>
                       </div>
                    </div>

                    <div class="col-lg-4">
                        <label for="">Email</label>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-envelope"></i>
                                  </span>
                                </div>
                                <input type="email" class="form-control" placeholder="{{__('Email Address')}}" name="email" id="email" @if(isset($citcha)) value="{{$citcha->email}}" @endif required>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <label for="">Contact</label>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-phone-alt"></i>
                                  </span>
                                </div>
                                <input type="text" class="form-control" placeholder="{{__('Phone number')}}" name="contact" id="phone"  @if(isset($citcha)) value="{{$citcha->contact}}" @endif required>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="">Age</label>
                        <select class="form-control" name="age" placeholder="{{ __('Select Age Range') }}" id="" required>
                            <option value="" disabled selected>{{__('Select Age Range')}}</option>
                            <option value="1" @if(isset($citcha)&&$citcha['age']=='Below 18 y/o' ) selected @endif>
                                {{__('Below 18 y/o')}}</option>
                            <option value="2" @if(isset($citcha)&&$citcha['age']=='18-24 y/o' ) selected @endif>
                                {{__('18-24 y/o')}}</option>
                            <option value="3" @if(isset($citcha)&&$citcha['age']=='25-34 y/o' ) selected @endif>
                                {{__('25-34 y/o')}}</option>
                            <option value="4" @if(isset($citcha)&&$citcha['age']=='35-44 y/o' ) selected @endif>
                                {{__('35-44 y/o')}}</option>
                            <option value="5" @if(isset($citcha)&&$citcha['age']=='45-54 y/o' ) selected @endif>
                                {{__('45-54 y/o')}}</option>
                            <option value="6" @if(isset($citcha)&&$citcha['age']=='55-64 y/o' ) selected @endif>
                                {{__('55-64 y/o')}}</option>
                            <option value="7" @if(isset($citcha)&&$citcha['age']=='65 y/o and above' ) selected @endif>
                                {{__('65 y/o and above')}}</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="">Gender</label>
                        <select class="form-control" name="gender" placeholder="{{ __('Select Gender') }}" id="" required>
                            <option value="" disabled selected>{{__('Select Gender')}}</option>
                            <option value="Male" @if(isset($citcha)&&$citcha['gender']=='Male' ) selected @endif>
                                {{__('Male')}}</option>
                            <option value="Female" @if(isset($citcha)&&$citcha['gender']=='Female' ) selected @endif>
                                {{__('Female')}}</option>
                            <option value="LGBTQIA+" @if(isset($citcha)&&$citcha['gender']=='LGBTQIA+' ) selected @endif>
                                {{__('LGBTQIA+')}}</option>
                            <option value="Prefer not to say" @if(isset($citcha)&&$citcha['gender']=='Prefer not to say' ) selected @endif>
                                {{__('Prefer not to say')}}</option>

                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="office_id">{{__('Office')}}</label>
                            <select class="form-control" name="office" id="office">
                                @if(isset($citcha)&&isset($citcha['office']))
                                <option value="{{$citcha['office']['office_id']}}" selected>{{$citcha['office']['office_desc']}}
                                </option>
                                @endif
                            </select>
                        </div>
                    </div>




                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="province">{{__('Province')}}</label>
                        {{-- @can('create_province')
                        <button type="button" class="btn btn-warning btn-sm float-right" data-toggle="modal"
                            data-target="#province_modal"><i class="fa fa-exclamation-triangle"></i>
                            {{__('Not Listed ?')}}</button>
                        @endcan --}}
                        <select disabled class="form-control" name="province" id="province">
                            @if(isset($citcha)&&isset($citcha['province']))
                            <option value="{{$citcha['province']['prov_code']}}" selected>{{$citcha['province']['prov_desc']}}
                            </option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="muncit_id">{{__('Municipality')}}</label>
                        {{-- @can('create_muncit')
                        <button type="button" class="btn btn-warning btn-sm float-right" data-toggle="modal"
                            data-target="#muncit_modal"><i class="fa fa-exclamation-triangle"></i>
                            {{__('Not Listed ?')}}</button>
                        @endcan --}}
                        <select disabled class="form-control" name="muncit" id="muncit_id">
                            @if(isset($user)&&isset($citcha['muncit']))
                          <option value="{{$citcha['muncit']['muncit_id']}}" selected>{{$citcha['muncit']['muncit_desc']}}
                            </option>
                            @endif

                        </select>
                    </div>

                </div>
                </div>

                <div id="surveyContent">
                    <!-- Dynamic content will be loaded here -->
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

    var rcOption = "{{ isset($ors) && isset($ors['details']['responsibilitycenter']['code']) ? $ors['details']['responsibilitycenter']['code'] : '' }}";
    var papOption = "{{ isset($ors) && isset($ors['details']['pap']['code']) ? $ors['details']['pap']['code'] : '' }}";
    var subOption = "{{ isset($ors) && isset($ors['details']['appro_sub_allotment']['sub_allotment_no']) ? $ors['details']['appro_sub_allotment']['sub_allotment_no'] : '' }}";
    var uacsOption = "{{ isset($ors) && isset($ors['details']['approsetupdtl_uacs']['uacs_subobject_code']) ? $ors['details']['approsetupdtl_uacs']['uacs_subobject_code'] : '' }}";
    var currency =" {{get_currency()}}"
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
</script> --}}

{{-- <script>
    var userId = {{ Auth::guard('admin')->user()->emp_id }};
</script> --}}

{{--<script>
    var orstype = {!! json_encode($ors->ors_type) !!}; // Assign initial value from PHP variable
</script> --}}

<script src="{{url('plugins/datetimepicker/js/jquery.datetimepicker.full.js')}}"></script>
{{-- <script src="{{url('js/admin/disableInspectElecment.js')}}"></script> --}}
<script src="{{url('js/admin/citcha.js')}}"></script>
@endsection
