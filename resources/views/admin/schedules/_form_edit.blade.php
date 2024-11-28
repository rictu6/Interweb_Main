<div class="form-group">
    <label for="name">{{__('Posted By')}}</label>

    <input type="hidden" class="form-control" name="emp_id" value="{{Auth::guard('admin')->user()->emp_id}}" required>
    <input readonly type="text" class="form-control" placeholder="{{__('Posted By')}}" name="posted_by"
        value="{{Auth::guard('admin')->user()->user_name}}" required>
</div>

<div class="form-group">
    <label for="name">{{__('Posted Date')}}</label>
    <input readonly type="date" class="form-control" placeholder="{{__('Posted Date')}}" name="posted_date"
        value="<?php echo date('Y-m-d'); ?>" required>
</div>

<div class="form-group">
    <label for="category">{{__('Category')}}</label>
    <div class="input-group form-group mb-3">

        <select class="form-control" name="category" placeholder="{{__('Category')}}" id="category">
            <option value="" disabled selected>{{__('Select Category')}}</option>
            <option value="Travel" @if(isset($user)&&$user['category']=='Travel' ) selected @endif>{{__('Travel')}}
            </option>
            <option value="Meeting" @if(isset($user)&&$user['category']=='Meeting' ) selected @endif>{{__('Meeting')}}
            </option>
            <option value="Activity" @if(isset($user)&&$user['category']=='Activity' ) selected @endif>
                {{__('Activity')}}
            </option>
            <option value="Others" @if(isset($user)&&$user['category']=='Others' ) selected @endif>{{__('Others')}}
            </option>
            <option value="N/A" @if(isset($user)&&$user['gender']=='N/A' ) selected @endif>{{__('N/A')}}
            </option>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="name">{{__('Title/Description')}}</label>
    <input type="text" placeholder="Title/Description" name="title" id="title" class="form-control" @if(isset($user))
        value="{{$user['title']}}" @endif required>


    <div class="form-group">
        <label for="name">{{__('Venue')}}</label>
        <input type="text" placeholder="Venue" name="venue" id="venue" class="form-control" @if(isset($user))
            value="{{$user['venue']}}" @endif>
    </div>





    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{__('Hosted By')}}</h3>
        </div>

        <div class="card-body">


            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>{{__('Select Office')}}</label>



                        <select class="form-control" name="office_id" id="office" required>
                            @if(isset($user)&&isset($user['office']))
                            <option value="{{$user['office']['office_id']}}" selected>{{$user['office']['office_desc']}}
                            </option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>{{__('Select Division')}}</label>
                        <select disabled class="form-control" name="div_id" id="division">
                            @if(isset($user)&&isset($user['division']))
                            <option value="{{$user['division']['div_id']}}" selected>{{$user['division']['div_acronym']}}
                            </option>
                            @endif
                        </select>


                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>{{__('Select Unit/Section')}}</label>
                        <select disabled class="form-control" name="sec_id" id="sec_id">
                            @if(isset($user)&&isset($user['section']))
                               <option value="{{$user['section']['sec_id']}}" selected>{{$user['section']['sec_desc']}}
                            </option>
                            @endif
                        </select>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="form-group">
        <label for="name">{{__('Color Description (Calendar)')}}</label>
        <input type="color" placeholder="Color" name="color" id="color" class="form-control" @if(isset($user))
            value="{{$user['color']}}" @endif required>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="datefrom">{{__('Start Date')}}</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-calendar"></i>
                        </span>
                    </div>




                    <input type="date" class="form-control" id="start" placeholder="{{__('Start')}}" name="start"
                        @if(isset($user)) value="{{$user['start']}}" @endif>


                    <input type="time" class="form-control" id="time_start" placeholder="{{__('Start Time')}}"
                        name="time_start" @if(isset($user)) value="{{$user['time_start']}}" @endif>


                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label for="dateto">{{__('End Date')}}</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-calendar"></i>
                        </span>
                    </div>
                    <input type="date" class="form-control" id="end" placeholder="{{__('End')}}" name="end"
                        @if(isset($user)) value="{{$user['end']}}" @endif>
                    <input type="time" class="form-control" id="time_end" placeholder="{{__('End Time')}}"
                        name="time_end" @if(isset($user)) value="{{$user['time_end']}}" @endif>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{__('Select Attendees By Position')}}</h3>
        </div>



        <div class="card-body">


            <!-- {{-- 
<button type="button" class="btn btn-warning btn-sm add_patient float-right"  >
    <i class="fa fa-exclamation-triangle" ><a href="{{route('admin.divisions.index')}}" ></a></i>
        {{__('Override Attendees ?')}}
        </button> --}} -->


            <div class="form-group">
                <label>{{__('Select Position')}}</label>

                <select name="position" id="position" class="form-control select2">
                    <option value="">Select Position</option>
                    @if (!empty($positions))
                    @foreach ($positions as $position)
                    <option value="{{$position->pos_id}}">{{$position->pos_desc}}</option>
                    @endforeach
                    @endif
                </select>

            </div>







            <div class="form-group">
                <label>{{__('Select Attendee/s')}}</label>
                <!-- // <select class="form-control select2" name="role" id="role" multiple></select> -->

                <select name="roles[]" id="role" placeholder="{{__('Roles')}}" class="form-control select2" multiple
                    required>
                    @foreach($roles as $role)
                    <option value="{{$role['emp_id']}}">{{$role->last_name}}, {{$role->first_name}}
                        {{$role->middle_name}}</option>
                    @endforeach
                </select>

            </div>

        </div>


    </div>
    {{-- 
 @canany('view_encoder_schedule','view_RD_schedule','view_schedule_SRMU') --}}

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{__('Attachment')}}</h3>
        </div>



        <div class="card-body">




            <label for="images" class="drop-container">
                <span class="drop-title">Drop files here</span>
                or
                <input type="file" name="file">


                @if(isset($user->id))
                <a href="{{route('admin.schedules.show',$user['id'])}}" target="_blank" class="btn btn-primary btn-sm">
                    <i class="fa fa-eye"> View File</i>
                </a>
                @endif




            </label>







        </div>
    </div>
    {{-- @endcan --}}

    @can('view_RD_schedule')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{__('RDs Action')}}</h3>
        </div>



        <div class="card-body">




            <div class="form-group">
                <label for="status">{{__('Status')}}</label>
                <div class="input-group form-group mb-3">
                    <select class="form-control" name="status2" placeholder="{{__('Status')}}" id="status2"
                        @if(isset($user)&&$user['status']=='Returned' ) selected disabled @endif>
                        <option value="" disabled selected>{{__('Select Status')}}</option>
                        <option value="Approved" @if(isset($user)&&$user['status2']=='Approved' ) selected @endif>
                            {{__('Approved')}}
                        </option>
                        <option value="Disapproved" @if(isset($user)&&$user['status2']=='Disapproved' ) selected @endif>
                            {{__('Disapproved')}}
                        </option>
                    </select>
                </div>
            </div>

            <div class="form-group" id="remarks2" style="display:none">
                <label for="name">{{__('Remarks')}}</label>
                <input type="text" placeholder="Remarks" name="remarks2" id="remarks2" class="form-control"
                    @if(isset($user)) value="{{$user['remarks2']}}" @endif>
            </div>
        </div>
    </div>

    @endcan

    @can('view_encoder_schedule')
    <div class="card card-primary" @if(isset($user)&&$user['status2']=='Approved' ) selected disabled>
        <div class="card-header">
            <h3 class="card-title">{{__('RDs Action')}}</h3>
        </div>



        <div class="card-body">




            <div class="form-group">
                <label for="status">{{__('Status')}}</label>
                <div class="input-group form-group mb-3">
                    <select class="form-control" name="status2" placeholder="{{__('Status')}}" id="status2_"
                        @if(isset($user)&&$user['status2']=='Approved' ) selected disabled @else hidden @endif>
                        <option value="" disabled selected>{{__('Select Status')}}</option>
                        <option value="Approved" @if(isset($user)&&$user['status2']=='Approved' ) selected @endif>
                            {{__('Approved')}}
                        </option>
                        <option value="Disapproved" @if(isset($user)&&$user['status2']=='Disapproved' ) selected @endif>
                            {{__('Disapproved')}}
                        </option>
                    </select>
                </div>
            </div>

            <div class="form-group" id="remarks2" style="display:none">
                <label for="name">{{__('Remarks')}}</label>
                <input type="text" placeholder="Remarks" name="remarks2" id="remarks2" class="form-control"
                    @if(isset($user)) value="{{$user['remarks2']}}" @endif>
            </div>
        </div>
    </div>
    @endcan
    @endcan





    @can('view_schedule_SRMU')
    <div class="form-group">
        <label for="status">{{__('For SRMUs Recommendation')}}</label>
        <div class="input-group form-group mb-3">

            <select class="form-control" name="status" placeholder="{{__('Status')}}" id="status"
                @if(isset($user)&&$user['status2']=='Approved' ) selected hidden @endif>
                <option value="" disabled selected>{{__('Select Status')}}</option>
                <option value="Approval" @if(isset($user)&&$user['status']=='Approval' ) selected @endif>
                    {{__('Forwarded to RDs Approval')}}
                </option>
                <option value="Returned" @if(isset($user)&&$user['status']=='Returned' ) selected @endif>
                    {{__('Returned')}}
                </option>
                <option value="Reconsideration" @if(isset($user)&&$user['status']=='Reconsideration' ) selected @endif>
                    {{__('For RDs Reconsideration')}}
                </option>

            </select>


            {{-- <select class="form-control" name="status2" placeholder="{{__('Status')}}" id="status2"
            @if(isset($user)&&$user['status2']=='Approved' ) selected disabled @else hidden @endif >
            <option value="" disabled selected>{{__('Select Status')}}</option>
            <option value="Approved" @if(isset($user)&&$user['status2']=='Approved' ) selected @endif>
                {{__('Approved')}}
            </option>
            <option value="Disapproved" @if(isset($user)&&$user['status2']=='Disapproved' ) selected @endif>
                {{__('Disapproved')}}
            </option>
            </select> --}}


        </div>
    </div>
    <div class="form-group" id="remarks" style="display:none">
        <label for="name">{{__('Remarks')}}</label>
        <input type="text" placeholder="Remarks" name="remarks" id="remarks" class="form-control" @if(isset($user))
            value="{{$user['remarks']}}" @endif>
    </div>


    @endcan

    @can('view_schedule_SRMU')
    <div class="card card-primary" @if(isset($user)&&$user['status2']=='Approved' ) selected @else hidden  @endif>
        <div class="card-header">
            <h3 class="card-title">{{__('Event Status')}}</h3>
        </div>

        <div class="card-body">

            <div class="form-group">
                <label for="status">{{__('Status')}}</label>
                <div class="input-group form-group mb-3">
                    <select class="form-control" name="status3" placeholder="{{__('Status')}}" id="status3">
                        <option value="" disabled selected>{{__('Select Status')}}</option>
                        <option value="Conducted" @if(isset($user)&&$user['status3']=='Conducted' ) selected @endif>
                            {{__('Conducted')}}
                        </option>
                        <option value="Cancelled" @if(isset($user)&&$user['status3']=='Cancelled' ) selected @endif>
                            {{__('Cancelled')}}
                        </option>
                        <option value="Rescheduled" @if(isset($user)&&$user['status3']=='Rescheduled' ) selected @endif>
                            {{__('Rescheduled')}}
                        </option>
                    </select>
                </div>
            </div>

            <div class="form-group" id="remarks3" style="display:none">
                <label for="name">{{__('Remarks')}}</label>
                <input type="text" placeholder="Remarks" name="remarks3" id="remarks3" class="form-control"
                    @if(isset($user)) value="{{$user['remarks3']}}" @endif>
            </div>







        </div>
    </div>
    @endcan




</div>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}