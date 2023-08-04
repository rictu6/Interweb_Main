<div class="row select_lce">
    <div class="col-lg-12">
        <div class="form-group">
            <label for="lce_id">{{__('Select LCE')}}</label>

            <select id="lce_id" name="lce_id" class="form-control" required>
                @if(isset($fta)&&isset($fta['local_chief_exec']))
                <option value="{{$fta['local_chief_exec']['prov_code']}}" selected>{{$fta['local_chief_exec']['fullname']}}</option>
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
            name="prov_code" id="prov_code" @if(isset($fta)&&isset($fta['local_chief_exec'])) value="{{old($fta['local_chief_exec']['prov_code'])}}"  @endif disabled required>
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
                name="muncit_id" id="muncit_id" @if(isset($fta)&&isset($fta['local_chief_exec']['muncit_id'])) value="{{old($fta['local_chief_exec']['muncit_id'])}}"  @endif disabled required>
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
                    name="designation" id="designation"  value="{{old('designation')}}"  disabled required>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">



</div>
<div class="row">

    <div class="col-lg-6">
        <div class="form-group">
            <label for="leavetype">{{__('Leave Type')}}</label>
                <div class="input-group mb-3">

                    <select class="form-control" name="leavetype" placeholder="{{__('Leave Type')}}" id="leavetype" required>
                        <option value="" disabled selected>{{__('Select Leave Type')}}</option>
                        <option value="OFFICIAL BUSINESS" {{ old('leavetype') =="OFFICIAL BUSINESS"? "selected" : '' }}>
                                {{__('OFFICIAL BUSINESS')}}</option>
                        <option value="PERSONAL" {{ old('leavetype') =="PERSONAL"? "selected" : '' }}>
                                {{__('PERSONAL')}}</option>

                    </select>
                </div>

        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group">
            <label for="destination">{{__('Destination')}}</label>
                <div class="input-group mb-3">

                    <select  id="destination" class="form-control" name="destination" placeholder="{{__('Designation')}}"  required>
                        <option value="" disabled selected>{{__('Select Destination')}}</option>

                        <option value="WITHIN PHILIPPINES" {{ old('destination') =="WITHIN PHILIPPINES"? "selected" : '' }}>{{__('WITHIN PHILIPPINES')}}
                        </option>
                        <option value="FOREIGN" {{ old('destination') =="FOREIGN"? "selected" : '' }}>{{__('FOREIGN')}}
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
                    value="{{old($fta['exact_destination'])}}"  @endif  required>
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
                     name="datefrom" required  value="{{ old('datefrom') }}">
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
                    name="dateto" required  value="{{ old('dateto') }}" >
                </div>

        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
             <label for="remarks">{{__('Remarks')}}</label>

             <textarea name="remarks" id="remarks" rows="3" class="form-control" placeholder="{{__('Remarks')}}">{{old('remarks')}}</textarea>

            </div>
    </div>
</div>



