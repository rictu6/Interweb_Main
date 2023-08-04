<div class="row select_lce">
    <div class="col-lg-12">
        <div class="form-group">
            <label for="lce_id">{{__('Select LCE')}}</label>

            <select id="lce_id" name="lce_id" class="form-control" required>
                @if(isset($fta)&&isset($fta['local_chief_exec']))
                    <option value="{{$fta['local_chief_exec']['lce_id']}}" selected>{{$fta['local_chief_exec']['fullname']}}</option>
                @endif
            </select>
        </div>
    </div>
</div>


<div class="row lce_info">

    <div class="col-lg-4">
       <div class="form-group">
        <label for="prov_code">{{__('Province/HUC')}}</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="fas fa-map-marker-alt"></i>
              </span>
            </div>

            <input type="text" class="form-control" placeholder="{{__('Province')}}"
            name="prov_code" id="prov_code" @if(isset($fta)&&isset($fta['local_chief_exec']['province'])) value="{{$fta['local_chief_exec']['province']['prov_desc']}}"  @endif disabled required>
        </div>
       </div>
    </div>

    <div class="col-lg-4">
        <div class="form-group">
            <label for="muncit_id">{{__('Municipality/City')}}</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">
                    <i class="fas fa-map-marker-alt"></i>
                  </span>
                </div>
                <input type="text" class="form-control" placeholder="{{__('Municipality')}}"
                name="muncit_id" id="muncit_id" @if(isset($fta)&&isset($fta['local_chief_exec']['muncit'])) value="{{$fta['local_chief_exec']['muncit']['muncit_desc']}}" @else value="{{$fta['local_chief_exec']['province']['prov_desc']}}"  @endif disabled required>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-group">
            <div class="form-group">
                <label for="designation">{{__('Designation')}}</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">
                        <i class="fas fa-user-circle"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control" placeholder="{{__('Designation')}}"
                    name="designation" id="designation" @if(isset($fta)&&isset($fta['local_chief_exec'])) value="{{$fta['local_chief_exec']['designation']}}"  @endif disabled required>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="row">

    <div class="col-lg-6">
        <div class="form-group">
            <label for="leavetype">{{__('Leave Type')}}</label>
                <div class="input-group mb-3">

                    <select class="form-control" name="leavetype" placeholder="{{__('Leave Type')}}" id="leavetype" required>
                        <option value="" disabled selected>{{__('Select Leave Type')}}</option>
                        <option value="OFFICIAL BUSINESS" @if(isset($fta)&&$fta['leavetype']=='OFFICIAL BUSINESS' ) selected
                                @endif>
                                {{__('OFFICIAL BUSINESS')}}</option>
                        <option value="PERSONAL" @if(isset($fta)&&$fta['leavetype']=='PERSONAL' ) selected @endif>
                                {{__('PERSONAL')}}</option>

                    </select>
                </div>

        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group">
            <label for="destination_on_edit">{{__('Destination')}}</label>
                <div class="input-group mb-3">

                    <select  id="destination" class="form-control" name="destination" placeholder="{{__('Designation')}}"  required>
                        <option value="" disabled selected>{{__('Select Destination')}}</option>

                        <option value="WITHIN PHILIPPINES" @if(isset($fta)&&$fta['destination']=='WITHIN PHILIPPINES' ) selected @endif>{{__('WITHIN PHILIPPINES')}}
                        </option>
                        <option value="FOREIGN" @if(isset($fta)&&$fta['destination']=='FOREIGN' ) selected @endif>{{__('FOREIGN')}}
                        </option>

                    </select>
                </div>

        </div>
    </div>
    <div class="col-lg-12" id ="appear" style="padding:10px;display:none;">
        <div class="form-group">
            <label for="exact_destination">{{__('Destination Address')}}</label>

            <input type="text" class="form-control" placeholder="{{__('Enter Destination Address')}}"
                    name="exact_destination" id="exact_destination" @if(isset($fta))
                    value="{{$fta['exact_destination']}}"  @endif  required>
        </div>
    </div>
</div>



<div class="row">
     <div class="col-lg-6">
        <div class="form-group">
            <label for="datefrom">{{__('Date From')}}</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">
                        <i class="fas fa-calendar"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control datepicker" id="datefrom" placeholder="{{__('Date From')}}"
                     name="datefrom" required @if(isset($fta)&&isset($fta['local_chief_exec'])) value="{{$fta['datefrom']}}"  @endif>
                </div>

        </div>
    </div>



    <div class="col-lg-6">
        <div class="form-group">
            <label for="dateto">{{__('Date To')}}</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fas fa-calendar"></i>
                    </span>
                    </div>
                    <input type="text" class="form-control datepicker" id="dateto" placeholder="{{__('Date To')}}"
                    name="dateto" required @if(isset($fta)&&isset($fta['local_chief_exec'])) value="{{$fta['dateto']}}"  @endif>
                </div>

        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
             <label for="remarks">{{__('Remarks')}}</label>

             <textarea name="remarks" id="remarks" rows="3" class="form-control" placeholder="{{__('Remarks')}}">@if(isset($fta)){{$fta['remarks']}}@endif</textarea>

            </div>
    </div>
</div>



