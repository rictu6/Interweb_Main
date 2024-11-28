<input type="hidden" class="form-control" name="emp_id" value="{{Auth::guard('admin')->user()->emp_id}}" required>
<input hidden readonly type="text" class="form-control" placeholder="{{__('Posted By')}}" name="posted_by"
    value="{{Auth::guard('admin')->user()->user_name}}" required>
<input hidden readonly type="date" class="form-control" placeholder="{{__('Posted Date')}}" name="posted_date"
    value="<?php echo date('Y-m-d'); ?>" required>






<div class="row">
    <div class="col-lg-4">
        <label for="category">{{__('Category')}}</label>
        <div class="input-group form-group mb-3">

            <select class="form-control" name="category" placeholder="{{__('Category')}}" id="category"
                @if(isset($user)) value="{{$user['title']}}"
                @if(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Approval" ) selected display
                readonly="readonly" style="pointer-events: none;"
                @elseif(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Returned" ) selected
                @endif @endif>
                <option value="" disabled selected>{{__('Select Category')}}</option>
                <option value="Travel" @if(isset($user)&&$user['category']=='Travel' ) selected @endif>
                    {{__('Travel')}}
                </option>
                <option value="Meeting" @if(isset($user)&&$user['category']=='Meeting' ) selected @endif>
                    {{__('Meeting')}}
                </option>
                <option value="Activity" @if(isset($user)&&$user['category']=='Activity' ) selected @endif>
                    {{__('Activity')}}
                </option>
                <option value="Others" @if(isset($user)&&$user['category']=='Others' ) selected @endif>
                    {{__('Others')}}
                </option>

            </select>
        </div>
    </div>
    <div class="col-lg-4">
        <label for="name">{{__('Title/Description')}}</label>
        <input type="text" placeholder="Title/Description" name="title" id="title" class="form-control"
            @if(isset($user)) value="{{$user['title']}}" @if(isset($user)) value="{{$user['title']}}"
            @if(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Approval" ) selected display
            readonly="readonly" style="pointer-events: none;"
            @elseif(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Returned" ) selected @endif
            @endif @endif required>

    </div>

    <div class="col-lg-4">
        <label for="name">{{__('Venue')}}</label>
        <input type="text" placeholder="Venue" name="venue" id="venue" class="form-control" @if(isset($user))
            value="{{$user['venue']}}" @endif @if(isset($user)) value="{{$user['title']}}"
            @if(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Approval" ) selected display
            readonly="readonly" style="pointer-events: none;"
            @elseif(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Returned" ) selected @endif
            @endif>
        {{-- @if(isset($user)&&$user['is_submitted']==1) selected readonly --}}
    </div>
</div>





<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{__('Hosted By')}}</h3>
    </div>

    <div class="card-body">


        <div class="row">
            <div class="col-lg-4">
                <div class="form-group" @if(isset($user)) value="{{$user['title']}}"
                    @if(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Approval" ) selected
                    display readonly="readonly" style="pointer-events: none;"
                    @elseif(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Returned" ) selected
                    @endif @endif required>
                    <label>{{__('Select Office')}}</label>



                    <select class="form-control" name="office_id" id="office">
                        @if(isset($user)&&isset($user['office']))
                        <option value="{{$user['office']['office_id']}}" selected>{{$user['office']['office_desc']}}
                        </option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group" @if(isset($user)) value="{{$user['title']}}"
                    @if(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Approval" ) selected
                    display readonly="readonly" style="pointer-events: none;"
                    @elseif(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Returned" ) selected
                    @endif @endif required>
                    <label>{{__('Select Division')}}</label>
                    <select class="form-control" name="div_id" id="division" @if(isset($user)&&$user['is_submitted']==1)
                        selected @endif>
                        @if(isset($user)&&isset($user['division']))
                        <option value="{{$user['division']['div_id']}}" selected>{{$user['division']['div_acronym']}}
                        </option>
                        @endif
                    </select>


                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group" @if(isset($user)) value="{{$user['title']}}"
                    @if(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Approval" ) selected
                    display readonly="readonly" style="pointer-events: none;"
                    @elseif(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Returned" ) selected
                    @endif @endif required>
                    <label>{{__('Select Unit/Section')}}</label>
                    <select class="form-control" name="sec_id" id="sec_id" @if(isset($user)&&$user['is_submitted']==1)
                        selected @endif>
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
{{-- <div class="form-group">
    <label for="name">{{__('Color Description (Calendar)')}}</label>
<input type="color" placeholder="Color" name="color" id="color" class="form-control" @if(isset($user))
    value="{{$user['color']}}" @endif @if(isset($user)&&$user['is_submitted']==1) selected readonly @endif required>
</div> --}}
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
                    @if(isset($user)) value="{{$user['start']}}" @endif @if(isset($user)) value="{{$user['title']}}"
                    @if(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Approval" ) selected
                    display readonly="readonly" style="pointer-events: none;"
                    @elseif(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Returned" ) selected
                    @endif @endif>


                <input type="time" class="form-control" id="time_start" placeholder="{{__('Start Time')}}"
                    name="time_start" @if(isset($user)) value="{{$user['time_start']}}" @endif @if(isset($user))
                    value="{{$user['title']}}"
                    @if(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Approval" ) selected
                    display readonly="readonly" style="pointer-events: none;"
                    @elseif(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Returned" ) selected
                    @endif @endif>


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
                    @if(isset($user)) value="{{$user['end']}}" @endif @if(isset($user)) value="{{$user['title']}}"
                    @if(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Approval" ) selected
                    display readonly="readonly" style="pointer-events: none;"
                    @elseif(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Returned" ) selected
                    @endif @endif>
                <input type="time" class="form-control" id="time_end" placeholder="{{__('End Time')}}" name="time_end"
                    @if(isset($user)) value="{{$user['time_end']}}" @endif @if(isset($user)) value="{{$user['title']}}"
                    @if(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Approval" ) selected
                    display readonly="readonly" style="pointer-events: none;"
                    @elseif(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Returned" ) selected
                    @endif @endif>
            </div>
        </div>
    </div>
</div>

{{-- 
<div class="form-group" @if(isset($user)) value="{{$user['title']}}"
    @if(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Approval" ) selected display
    readonly="readonly" style="pointer-events: none;"
    @elseif(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Returned" ) selected @endif @endif>
    <label>{{__('Select Position')}}</label>

    <select name="position" id="position" class="form-control select2">
        <option value="">Select Position</option>
        @if (!empty($positions))
        @foreach ($positions as $position)
        <option value="{{$position->pos_id}}">{{$position->pos_desc}}</option>
        @endforeach
        @endif
    </select>

</div> --}}



<div class="form-group" @if(isset($user)) value="{{$user['title']}}"
    @if(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Approval" ) selected display
    readonly="readonly" style="pointer-events: none;"
    @elseif(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Returned" ) selected @endif @endif>

    <label>{{__('Select Attendee/s')}}</label>


    <select name="roles[]" id="role" placeholder="{{__('Roles')}}" class="form-control select2" multiple required>
        @foreach($roles as $role)
        <option value="{{$role['emp_id']}}">{{$role->last_name}}, {{$role->first_name}}
            {{$role->middle_name}}</option>
        @endforeach
    </select>

</div>
</div>



</div>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{__('Attachment (QMS Checklist / Activity Design / R.O Request (Duly approved request R.O)')}}</h3>
    </div>



    <div class="card-body">




        <label for="images" class="drop-container">
            <span class="drop-title">Drop files here</span>
            or
            <input type="file" name="file" @if(isset($user)) value="{{$user['title']}}"
                @if(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Approval" ) selected display
                readonly="readonly" style="pointer-events: none;"
                @elseif(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Returned" ) selected
                @endif @endif>
            {{-- @if(isset($user)&&$user['file']== null ) selected
             selected hidden  --}}

            @if(isset($user->id))
            <a href="{{route('admin.schedules.show',$user['id'])}}" target="_blank" class="btn btn-primary btn-sm">
                <i class="fa fa-eye"> View File</i>
            </a>
            @endif




        </label>


    </div>
</div>



{{--start for Encoder --}}
@can('view_encoder_schedule')
<div class="card card-primary" @if(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']<>
    'Approval'&&isset($user)&&$user['status']<>'Returned'&&isset($user)&&$user['status']<>'Reconsideration' ) selected
            display readonly="readonly" style="pointer-events: none;"
            @elseif(isset($user)&&$user['is_submitted']==1) selected display
            readonly="readonly" style="pointer-events: none;" @else hidden @endif>
            <div class="card-header">
                <h3 class="card-title">{{__('RDs Action')}}</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="status">{{__('Status')}}</label>
                    <div class="input-group form-group mb-3">
                        <select class="form-control" name="status2" placeholder="{{__('Status')}}" id="status2Encoder"
                            @if(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']<>'Approval'&&isset($user)&&$user['status']
                            <>'Returned'&&isset($user)&&$user['status']<>'Reconsideration' ) selected display
                                    readonly="readonly" style="pointer-events: none;"
                                    @elseif(isset($user)&&$user['is_submitted']==1)
                                    selected display readonly="readonly" style="pointer-events: none;" @else hidden
                                    @endif>
                                    <option value="" disabled selected>{{__('Select Status')}}</option>
                                    <option value="Approved" @if(isset($user)&&$user['status2']=='Approved' ) selected
                                        @endif>
                                        {{__('Approved')}}
                                    </option>
                                    <option value="Disapproved" @if(isset($user)&&$user['status2']=='Disapproved' )
                                        selected @endif>
                                        {{__('Disapproved')}}
                                    </option>
                        </select>
                    </div>
                </div>
                <div class="form-group" id="appearEncoderRemarks2" style="display:none">
                    <label for="name">{{__('Remarks')}}</label>
                    <input type="text" placeholder="Remarks" name="remarks2" id="remarks2" class="form-control"
                        @if(isset($user)) value="{{$user['remarks2']}}" @endif>
                </div>
            </div>
</div>
<div class="card card-primary" @if(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']<>
    'Approval'&&isset($user)&&$user['status']<>'Returned'&&isset($user)&&$user['status']<>'Reconsideration' ) selected
            display readonly="readonly" style="pointer-events: none;"
            @elseif(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status2']='Approved') selected display
            readonly="readonly" style="pointer-events: none;" @else hidden @endif>
            <div class="card-header">
                <h3 class="card-title">{{__('SRMU Actions')}}</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="input-group form-group mb-3">

                        <select class="form-control" name="status" placeholder="{{__('Status')}}" id="statusEncoder"
                            @if(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']<>'Approval'&&isset($user)&&$user['status']
                            <>'Returned'&&isset($user)&&$user['status']<>'Reconsideration' ) selected display
                                    readonly="readonly" style="pointer-events: none;"
                                    @elseif(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status2']='Approved')
                                    selected display readonly="readonly" style="pointer-events: none;" @else hidden
                                    @endif>

                                    <option value="" disabled selected>{{__('Select Status')}}</option>
                                    <option value="Approval" @if(isset($user)&&$user['status']=='Approval' ) selected
                                        @endif>
                                        {{__('For RDs Approval')}}
                                    </option>
                                    <option value="Returned" @if(isset($user)&&$user['status']=='Returned' ) selected
                                        @endif>
                                        {{__('Returned')}}
                                    </option>
                                    <option value="Reconsideration" @if(isset($user)&&$user['status']=='Reconsideration'
                                        ) selected @endif>
                                        {{__('For RDs Reconsideration')}}
                                    </option>
                        </select>
                    </div>
                </div>





                <div class="form-group" @if(isset($user)&&$user['status']=="Returned" ) selected display @else
                   id="appearEncoderRemarks" style="display:none" @endif>
                    <label for="name">{{__('Remarks')}}</label>
                    <input type="text" placeholder="Remarks" name="remarks" id="remarks" class="form-control"
                        @if(isset($user)&&$user['status']=="Returned" ) selected display @endif @if(isset($user))
                        value="{{$user['remarks']}}" @endif>
                </div>
            </div>
</div>
<div class="card card-primary" @if(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']<>
    'Approval'&&isset($user)&&$user['status']<>'Returned'&&isset($user)&&$user['status']<>'Reconsideration' ||
            isset($user)&&$user['status3']==
            'Conducted') selected
            display readonly="readonly" style="pointer-events: none;"
            @elseif(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status2']='Approved') selected display
            @else hidden @endif>
            <div class="card-header">
                <h3 class="card-title">{{__('Event Status')}}</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="status">{{__('Status')}}</label>
                    <div class="input-group form-group mb-3">
                        <select class="form-control" name="status3" placeholder="{{__('Status')}}" id="status3"
                            @if(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']<>
                            'Approval'&&isset($user)&&$user['status']<>'Returned'&&isset($user)&&$user['status']<>
                                    'Reconsideration' || isset($user)&&$user['status3']==
                                    'Conducted') selected
                                    display readonly="readonly" style="pointer-events: none;"
                                    @elseif(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status2']='Approved')
                                    selected display
                                    @else hidden @endif>
                                    <option value="" disabled selected>{{__('Select Status')}}</option>
                                    <option value="Conducted" @if(isset($user)&&$user['status3']=='Conducted' ) selected
                                        @endif>
                                        {{__('Completed')}}
                                    </option>
                                    <option value="Cancelled" @if(isset($user)&&$user['status3']=='Cancelled' ) selected
                                        @endif>
                                        {{__('Cancelled')}}
                                    </option>
                                    <option value="Rescheduled" @if(isset($user)&&$user['status3']=='Rescheduled' )
                                        selected @endif>
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
{{--end for Encoder --}}


{{--start for SRMU --}}
@can('view_schedule_SRMU')
<div class="card card-primary" @if(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Approval"
    ||isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Approval"
    &&isset($user)&&$user['status']=="Returned" &&isset($user)&&$user['status']=="Reconsideration"
    ||isset($user)&&$user['status2']=="Disapproved" ) selected display @else hidden @endif>
    <div class="card-header">
        <h3 class="card-title">{{__('RDs Action')}}</h3>
    </div>
    <div class="card-body">
        <div class="form-group" @if(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Approval"
            ||isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Approval"
            &&isset($user)&&$user['status']=="Returned" &&isset($user)&&$user['status']=="Reconsideration"
            ||isset($user)&&$user['status2']=="Disapproved" ) selected display style="pointer-events: none;" @else
            hidden @endif>
            <label for="status">{{__('Status')}}</label>
            <div class="input-group form-group mb-3">
                <select class="form-control" name="status2" placeholder="{{__('Status')}}" id="status2SRMU"
                    @if(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Approval"
                    ||isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Approval"
                    &&isset($user)&&$user['status']=="Returned" &&isset($user)&&$user['status']=="Reconsideration"
                    ||isset($user)&&$user['status2']=="Disapproved" ) selected display readonly="readonly"
                    style="pointer-events: none;" @else hidden @endif>
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
        <div class="form-group" id="appearSRMURemarks2" style="display:none">
            <label for="name">{{__('Remarks')}}</label>
            <input type="text" placeholder="Remarks" name="remarks2" id="remarks2" class="form-control"
                @if(isset($user)) value="{{$user['remarks2']}}" @endif>
        </div>







    </div>
</div>
<div class="card card-primary" @if(isset($user)&&$user['is_submitted']==1 ) selected display @else hidden @endif>
    <div class="card-header">
        <h3 class="card-title">{{__('SRMU Actions')}}</h3>
    </div>
    <div class="card-body" @if(isset($user)&&$user['status2']=="Disapproved" ) selected readonly="readonly"
        style="pointer-events: none;" @endif>
        <div class="form-group">
            <div class="input-group form-group mb-3">

                <select class="form-control"  name="status" placeholder="{{__('Status')}}" id="statusSRMU">

                    <option value="" disabled selected>{{__('Select Status')}}</option>
                    <option value="Approval" @if(isset($user)&&$user['status']=='Approval' ) selected @endif>
                        {{__('For RDs Approval')}}
                    </option>
                    <option value="Returned" @if(isset($user)&&$user['status']=='Returned' ) selected @endif>
                        {{__('Returned')}}
                    </option>
                    <option value="Reconsideration" @if(isset($user)&&$user['status']=='Reconsideration' ) selected
                        @endif>
                        {{__('For RDs Reconsideration')}}
                    </option>
                </select>
            </div>
        </div>
        {{-- <div class="form-group" @if(isset($user)&&$user['status']=="Returned" ) selected display @else id="remarks"
            style="display:none" @endif>
            <label for="name">{{__('Remarks')}}</label>
        <input type="text" placeholder="Remarks" name="remarks" id="remarks" class="form-control"
            @if(isset($user)&&$user['status']=="Returned" ) selected display @endif @if(isset($user))
            value="{{$user['remarks']}}" @endif>
    </div> --}}

    <div class="form-group" id="appearSRMURemarks" style="display:none">
        <label>{{__('Remarks')}}</label>

        <input type="text" placeholder="Remarks" class="form-control" placeholder="{{__('Remarks')}}" name="remarks"
            id="remarks" @if(isset($user)) value="{{$user['remarks']}}" @endif required>
    </div>




</div>
</div>
<div class="card card-primary" @if(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Approval"
    ||isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Approval"
    &&isset($user)&&$user['status']=="Returned" &&isset($user)&&$user['status']=="Reconsideration"||isset($user)&&$user['status2']=="Disapproved") selected display
    readonly="readonly" style="pointer-events: none;" @else hidden @endif>
    <div class="card-header">
        <h3 class="card-title">{{__('Event Status')}}</h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="status">{{__('Status')}}</label>
            <div class="input-group form-group mb-3">
                <select class="form-control" name="status3" placeholder="{{__('Status')}}" id="status3"
                    @if(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Approval"
                    ||isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Approval"
                    &&isset($user)&&$user['status']=="Returned" &&isset($user)&&$user['status']=="Reconsideration"||isset($user)&&$user['status2']=="Disapproved")
                    selected display readonly="readonly" style="pointer-events: none;" @else hidden @endif>
                    <option value="" disabled selected>{{__('Select Status')}}</option>
                    <option value="Conducted" @if(isset($user)&&$user['status3']=='Conducted' ) selected @endif>
                        {{__('Completed')}}
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
{{--end for SRMU --}}


{{--start for RD --}}
@can('view_RD_schedule')
<div class="card card-primary" @if(isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Approval"
    ||isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status2']=="Approved"
    ||isset($user)&&$user['is_submitted']==1&&isset($user)&&$user['status']=="Approval"
    &&isset($user)&&$user['status']=="Returned" &&isset($user)&&$user['status']=="Reconsideration"
    ||isset($user)&&$user['status']=="Reconsideration" || isset($user)&&$user['status2']=="Disapproved" ) selected
    display @else hidden @endif>
    <div class="card-header">
        <h3 class="card-title">{{__('RDs Action')}}</h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="status">{{__('Status')}}</label>
            <div class="input-group form-group mb-3">
                <select class="form-control" name="status2" placeholder="{{__('Status')}}" id="status2RD"
                    @if(isset($user)&&$user['status2']=="Approved" ||isset($user)&&$user['status2']=="Disapproved" )
                    selected readonly="readonly" style="pointer-events: none;" @endif>
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




        <div class="form-group" id="appearRDRemarks2" style="display:none">
            <label for="name">{{__('Remarks')}}</label>
            <input type="text" placeholder="Remarks" name="remarks2" id="remarks2" class="form-control"
                @if(isset($user)) value="{{$user['remarks2']}}" @endif>
        </div>
    </div>
</div>
<div class="card card-primary" @if(isset($user)&&$user['status2']=="Approved"
    ||isset($user)&&$user['status2']=="Disapproved" ) selected display @else hidden @endif>
    <div class="card-header">
        <h3 class="card-title">{{__('SRMU Actions')}}</h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <div class="input-group form-group mb-3">

                <select class="form-control" name="status" placeholder="{{__('Status')}}" id="statusRD"
                    @if(isset($user)&&$user['status2']=="Approved" ||isset($user)&&$user['status2']=="Disapproved" )
                    selected readonly="readonly" style="pointer-events: none;" @endif>

                    <option value="" disabled selected>{{__('Select Status')}}</option>
                    <option value="Approval" @if(isset($user)&&$user['status']=='Approval' ) selected @endif>
                        {{__('For RDs Approval')}}
                    </option>
                    <option value="Returned" @if(isset($user)&&$user['status']=='Returned' ) selected @endif>
                        {{__('Returned')}}
                    </option>
                    <option value="Reconsideration" @if(isset($user)&&$user['status']=='Reconsideration' ) selected
                        @endif>
                        {{__('For RDs Reconsideration')}}
                    </option>
                </select>
            </div>
        </div>
         <div class="form-group" id="appearRDRemarks" style="display:none">
        <label>{{__('Remarks')}}</label>

        <input type="text" placeholder="Remarks" class="form-control" placeholder="{{__('Remarks')}}" name="remarks"
            id="remarks" @if(isset($user)) value="{{$user['remarks']}}" @endif required>
    </div>
    </div>
</div>
<div class="card card-primary" @if(isset($user)&&$user['status2']=="Approved"
    ||isset($user)&&$user['status2']=="Disapproved" ) selected display @else hidden @endif>
    <div class="card-header">
        <h3 class="card-title">{{__('Event Status')}}</h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="status">{{__('Status')}}</label>
            <div class="input-group form-group mb-3">
                <select class="form-control" name="status3" placeholder="{{__('Status')}}" id="status3"
                    @if(isset($user)&&$user['status2']=="Approved" ||isset($user)&&$user['status2']=="Disapproved" )
                    selected readonly="readonly" style="pointer-events: none;" @endif>
                    <option value="" disabled selected>{{__('Select Status')}}</option>
                    <option value="Conducted" @if(isset($user)&&$user['status3']=='Conducted' ) selected @endif>
                        {{__('Completed')}}
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

{{--end for RD --}}