
<div class="row">
    <div class="col-lg-2">
        <div class="card card-primary">
            <div class="card-header">
                <h5 class="card-title" style="text-align: center!important;float: unset;">
                    {{__('Profile Image')}}
                </h5>
            </div>

            <div class="card-body p-1">
                <img class="img-thumbnail"
                    src="@if(!empty(auth()->guard('admin')->user()->pic_emp)){{url('uploads/signature/'.auth()->guard('admin')->user()->pic_emp)}} @else {{url('img/no-image.png')}} @endif"
                    alt="{{__('pic_emp')}}">

            </div>
            {{-- <div id="pic_emp_data" data-pic_emp="@auth {{ auth()->guard('admin')->user()->pic_emp }} @else null @endauth" style="display: none;"></div> --}}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-2">

        <div class="input-group form-group mb-3">
            <div class="input-group-prepend">
                {{-- <span class="input-group-text">
                    <i class="fas fa-image" aria-hidden="true"></i>
                </span> --}}
            </div>
            {{-- <div class="custom-file">
                <input type="file" accept = 'image/jpeg , image/jpg, image/gif, image/png' class="custom-file-input" id="exampleInputFile" name="pic_emp">
                <label class="custom-file-label" for="exampleInputFile">{{__('')}}</label>
                <input type="file"  name="file" >
            </div> --}}


            <label for="images" class="drop-container">
                <span class="drop-title">Drop image here</span>
                or
                <input type="file" accept = 'image/jpeg , image/jpg, image/gif, image/png' name="pic_emp" >
              </label>





        </div>

    </div>
</div>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            {{__('Profile Information')}}
        </h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="bio_id">{{__('Biometric ID')}}</label>
                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            </span>
                        </div>

                            <input type="text" class="form-control" placeholder="{{__('Biometric ID')}}" name="bio_id" @if(isset($user)) value="{{$user['bio_id']}}" @endif required>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="first_name">{{__('Firstname')}}</label>
                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            </span>
                        </div>


                            <input type="text" class="form-control" placeholder="{{__('Firstname')}}" name="first_name" @if(isset($user)) value="{{$user['first_name']}}" @endif required>



                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="middle_name">{{__('Middlename')}}</label>
                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            </span>
                        </div>

                            <input type="text" class="form-control" placeholder="{{__('Middlename')}}" name="middle_name" @if(isset($user)) value="{{$user['middle_name']}}" @endif required>

                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="last_name">{{__('Lastname')}}</label>
                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            </span>
                        </div>

                            <input type="text" class="form-control" placeholder="{{__('Lastname')}}" name="last_name" @if(isset($user)) value="{{$user['last_name']}}" @endif required>

                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="ext_name">{{__('Extension Name')}}</label>
                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            </span>
                        </div>


                            <input type="text" class="form-control" placeholder="{{__('Extension Name')}}" name="ext_name" @if(isset($user)) value="{{$user['ext_name']}}" @endif>


                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="birth_date">{{__('Date Of Birth')}}</label>
                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            </span>
                        </div>
                        <input type="text" class="form-control datepicker" placeholder="{{__('Date of birth')}}"
                            name="birth_date" required @if(isset($user)) value="{{$user['birth_date']}}" @endif
                            readonly>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="bio_id">{{__('Gender')}}</label>
                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            </span>
                        </div>
                        <select class="form-control" name="gender" placeholder="{{__('Gender')}}" id="gender">
                            <option value="" disabled selected>{{__('Select Gender')}}</option>
                            <option value="Male" @if(isset($user)&&$user['gender']=='Male' ) selected @endif>{{__('Male')}}
                            </option>
                            <option value="Female" @if(isset($user)&&$user['gender']=='Female' ) selected @endif>{{__('Female')}}
                            </option>
                            <option value="Others" @if(isset($user)&&$user['gender']=='Others' ) selected @endif>{{__('Others')}}
                            </option>
                            <option value="N/A" @if(isset($user)&&($user['gender']=='N/A' ||$user['gender']==null) ) selected @endif>{{__('N/A')}}
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <label for="mobile_num">{{__('Mobile Number')}}</label>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">

                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="{{__('Mobile Number')}}" name="mobile_num"
                            id="mobile_num" @if(isset($user)) value="{{$user['mobile_num']}}" @endif>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <label for="home_num">{{__('Home Phone Number')}}</label>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">

                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="{{__('Home Phone Number')}}"
                            name="home_num" id="home_num" @if(isset($user)) value="{{$user['home_num']}}" @endif
                            >
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <label for="home_address">{{__('Home Address')}}</label>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">

                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="{{__('Home Address')}}" name="home_address"
                            id="home_address" @if(isset($user)) value="{{$user->home_address}}" @endif >

                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <label for="payee_id">{{__('Payee ID')}}</label>
                <div class="input-group form-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">

                        </span>
                    </div>

                        <input type="text" class="form-control" placeholder="{{__('Payee ID')}}" name="payee_id" @if(isset($user)) value="{{$user['payee_id']}}" @endif>

                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="bio_id">{{__('Civil Status')}}</label>
                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            </span>
                        </div>
                        <select class="form-control" name="civil_status" placeholder="{{__('Civil Status')}}"
                            id="civil_status">
                            <option value="" disabled selected>{{__('Select Civil Status')}}</option>
                            <option value="Married" @if(isset($user)&&$user['civil_status']=='Married' ) selected
                                @endif>
                                {{__('Married')}}</option>
                            <option value="Widowed" @if(isset($user)&&$user['civil_status']=='Widowed' ) selected
                                @endif>
                                {{__('Widowed')}}</option>
                            <option value="Separated" @if(isset($user)&&$user['civil_status']=='Separated' ) selected
                                @endif>
                                {{__('Separated')}}</option>
                            <option value="Divorced" @if(isset($user)&&$user['civil_status']=='Divorced' ) selected
                                @endif>
                                {{__('Divorced')}}</option>
                            <option value="Single" @if(isset($user)&&$user['civil_status']=='Single' ) selected @endif>
                                {{__('Single')}}</option>

                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="nat_id">{{__('Nationality')}}</label>
                    {{-- @can('create_nationality')
                    <button type="button" class="btn btn-warning btn-sm float-right" data-toggle="modal"
                        data-target="#nationality_modal"><i class="fa fa-exclamation-triangle"></i>
                        {{__('Not Listed ?')}}</button>
                    @endcan --}}
                    <input type="text" class="form-control" placeholder="{{__('Nationality')}}" name="nationality"
                    value="{{auth()->guard('admin')->user()->nationality}}"  readonly>

                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="office_id">{{__('Office')}}</label>
                    {{-- @can('create_office')
                    <button type="button" class="btn btn-warning btn-sm float-right" data-toggle="modal" data-target="#offic
                            e_modal"><i class="fa fa-exclamation-triangle"></i> {{__('Not Listed ?')}}</button>
                    @endcan --}}
                    <select class="form-control" name="office_id" id="office">
                        @if(isset($user)&&isset($user['office']))
                        <option value="{{$user['office']['office_id']}}" selected>{{$user['office']['office_desc']}}
                        </option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="province">{{__('Province')}}</label>
                    {{-- @can('create_province')
                    <button type="button" class="btn btn-warning btn-sm float-right" data-toggle="modal"
                        data-target="#province_modal"><i class="fa fa-exclamation-triangle"></i>
                        {{__('Not Listed ?')}}</button>
                    @endcan --}}
                    <select disabled class="form-control" name="prov_code" id="province">
                        @if(isset($user)&&isset($user['province']))
                        <option value="{{$user['province']['prov_code']}}" selected>{{$user['province']['prov_desc']}}
                        </option>
                        @endif
                    </select>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    <label for="muncit_id">{{__('Municipality')}}</label>
                    {{-- @can('create_muncit')
                    <button type="button" class="btn btn-warning btn-sm float-right" data-toggle="modal"
                        data-target="#muncit_modal"><i class="fa fa-exclamation-triangle"></i>
                        {{__('Not Listed ?')}}</button>
                    @endcan --}}
                    <select disabled class="form-control" name="muncit_id" id="muncit_id">
                        @if(isset($user)&&isset($user['muncit']))
                      <option value="{{$user['muncit']['muncit_id']}}" selected>{{$user['muncit']['muncit_desc']}}
                        </option>
                        @endif

                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="div_id">{{__('Divisions')}}</label>
                    {{-- @can('create_division')
                    <button type="button" class="btn btn-warning btn-sm float-right" data-toggle="modal"
                        data-target="#division_modal"><i class="fa fa-exclamation-triangle"></i>
                        {{__('Not Listed ?')}}</button>
                    @endcan --}}
                    <select class="form-control" name="div_id" id="division">
                        @if(isset($user)&&isset($user['division']))
                        <option value="{{$user['division']['div_id']}}" selected>{{$user['division']['acronym']}}
                        </option>
                        @endif
                    </select>



                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    <label for="sec_id">{{__('Section')}}</label>

                    <select class="form-control" name="sec_id" id="sec_id">
                        @if(isset($user)&&isset($user['section']))
                        <option value="{{$user['section']['sec_id']}}" selected>{{$user['section']['sec_desc']}}
                        </option>
                        @endif
                    </select>
                </div>
            </div>
       <div class="col-lg-3">
                <div class="form-group">
                    <label for="emp_status_id">{{__('Employee Status')}}</label>
                    {{-- @can('create_empstatus')
                    <button type="button" class="btn btn-warning btn-sm float-right" data-toggle="modal"
                        data-target="#empstatus_modal"><i class="fa fa-exclamation-triangle"></i>
                        {{__('Not Listed ?')}}</button>
                    @endcan --}}
                    <select class="form-control" name="emp_status_id" id="empstatus">
                        @if(isset($user)&&isset($user['empstatus']))
                        <option value="{{$user['empstatus']['emp_status_id']}}" selected>
                            {{$user['empstatus']['stat_desc']}}
                        </option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="pos_id">{{__('Position')}}</label>
                    {{-- @can('create_position')
                    <button type="button" class="btn btn-warning btn-sm float-right" data-toggle="modal"
                        data-target="#position_modal"><i class="fa fa-exclamation-triangle"></i>
                        {{__('Not Listed ?')}}</button>
                    @endcan --}}
                    <select class="form-control" name="pos_id" id="position">
                        @if(isset($user)&&isset($user['position']))
                        <option value="{{$user['position']['pos_id']}}" selected>{{$user['position']['pos_desc']}}
                        </option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <label for="remarks">{{__('Remarks')}}</label>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">

                            </span>
                        </div>

                            <input type="text" class="form-control" placeholder="{{__('Remarks')}}" name="remarks" @if(isset($user)) value="{{$user['remarks']}}" @endif >


                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
                <h5 class="card-title">
                    {{__('Account Information')}}
                </h5>
            </div>
            <div class="card-body">
                <label for="user_name">{{__('Username')}}</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">

                        </span>
                    </div>


                    <input  type="text" class="form-control" placeholder="{{__('Username')}}" name="user_name" @if(isset($user)) value="{{$user['user_name']}}"readonly @endif required>
                </div>
                <label for="email">{{__('Email Address')}}</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">

                        </span>
                    </div>
                    <input type="email" class="form-control" placeholder="{{__('Email Address')}}" name="email" @if(isset($user)) value="{{$user['email']}}" @endif required>



                </div>
               <label for="Password">{{__('Password')}}</label>
                <div class="input-group mb-3">
                    {{-- <div class="input-group-prepend">
                        <span class="input-group-text">

                        </span>
                    </div> --}}

                    <input type="password" class="form-control" placeholder="{{__('Password')}}" name="password_hash"
                        id="password_hash">
                </div>
                <label for="Password">{{__('Password')}}</label>
                <div class="input-group mb-3">
                    {{-- <div class="input-group-prepend">
                        <span class="input-group-text">

                        </span>
                    </div> --}}

                    <input type="password" class="form-control" placeholder="{{__('Password Confirmation')}}"
                        name="password_confirmation" id="password_confirmation">
                </div>
                {{-- <div class="input-group mb-3">
                    <input type="checkbox" name="is_active" id="is_active" @if(isset($user))
                        value="{{$user['is_active']}}" checked @endif required>
                    <label for="is_active">{{__('Is Active')}}</label>

                </div> --}}
            </div>
        </div>
    </div>
</div>


<div class="row">

    <div class="col-lg-6">
        <div class="card card-danger">
            <div class="card-header">
                <h5 class="card-title">
                    {{__('Contributions')}}
                </h5>
            </div>
            <div class="card-body tests">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="tin_num">{{__('Tin Number')}}</label>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">

                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="{{__('Tin Number')}}" name="tin_num" @if(isset($user)) value="{{$user['tin_num']}}" @endif >


                            </div>
                        </div>
                    </div>

                </div>
                <!-- mmmm -->
                <div class="row">
                    <div class="col-lg-12">
                        <label for="pagibig_num">{{__('Pag-Ibig Number')}}</label>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">

                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="{{__('Pag-Ibig Number')}}" name="pagibig_num" @if(isset($user)) value="{{$user['pagibig_num']}}" @endif >


                            </div>
                        </div>
                    </div>

                </div>
                <!-- mmmm -->
                <div class="row">
                    <div class="col-lg-12">
                        <label for="sss_num">{{__('SSS Number')}}</label>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">

                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="{{__('SSS Number')}}" name="sss_num" @if(isset($user)) value="{{$user['sss_num']}}" @endif >

                            </div>
                        </div>
                    </div>

                </div>
                <!-- mmmm -->
                <div class="row">
                    <div class="col-lg-12">
                        <label for="gsis_num">{{__('GSIS Number')}}</label>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">

                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="{{__('GSIS Number')}}" name="gsis_num" @if(isset($user)) value="{{$user['gsis_num']}}" @endif >

                            </div>
                        </div>
                    </div>

                </div>
                <!-- mmmm -->
                <div class="row">
                    <div class="col-lg-12">
                        <label for="ph_num">{{__('Philhealth Number')}}</label>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">

                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="{{__('Philhealth Number')}}" name="ph_num" @if(isset($user)) value="{{$user['ph_num']}}" @endif >


                            </div>
                        </div>
                    </div>

                </div>
                <!-- mmmm -->
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card card-danger">
            <div class="card-header">
                <h5 class="card-title">
                    {{__('Socials')}}
                </h5>
            </div>
            <div class="card-body tests">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="tin_num">{{__('Facebook')}}</label>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">

                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="{{__('Facebook')}}" name="fb" @if(isset($user)) value="{{$user['fb']}}" @endif >

                            </div>
                        </div>
                    </div>

                </div>
                <!-- mmmm -->

                <!-- mmmm -->

                <!-- mmmm -->
                <div class="row">
                    <div class="col-lg-12">
                        <label for="gsis_num">{{__('Youtube')}}</label>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">

                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="{{__('Youtube')}}" name="youtube" @if(isset($user)) value="{{$user['youtube']}}" @endif >


                            </div>
                        </div>
                    </div>

                </div>
                <!-- mmmm -->

                <!-- mmmm -->
            </div>
        </div>
    </div>




</div>
