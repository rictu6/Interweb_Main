<div class="form-group">
    <label for="id">{{__('Services')}}</label>
    <select class="form-control" name="id" id="services"placeholder="{{ __('Please select the service you availed') }}">
        @if(isset($service)&&isset($service['id']))
        <option value="{{$service['id']}}" selected>{{$service['id']}} -{{$service['description']}}
        </option>
        @endif
    </select>
</div>



<div class="row">

    <div class="col-4">
        <label for="">Date the Docs Released</label>
        <input disabled="disabled" type="date" class="form-control" name="date_doc_released" id="ors_date" value="{{ date('MM/DD/YYYY') }}" required>
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
            <select class="form-control" name="office_id" id="office">
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
        <select disabled class="form-control" name="prov_code" id="province">
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
        <select disabled class="form-control" name="muncit_id" id="muncit_id">
            @if(isset($user)&&isset($citcha['muncit']))
          <option value="{{$citcha['muncit']['muncit_id']}}" selected>{{$citcha['muncit']['muncit_desc']}}
            </option>
            @endif

        </select>
    </div>

</div>
</div>


<br>

{{-- @include('admin.citcha._online') --}}
<br>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Citizen's Charter</h3>

                <br><br>
                <p><strong>Instructions: Put tick mark beside the statement that best describes your awareness and
                        experience in using the DILG Citizen’s Charter (CC). The Citizen’s Charter (CC) is an official
                        document that reflects the services of a government agency/office including its requirements,
                        fees, and processing times, among others</strong></p>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12" style="overflow-x: auto">
                        <p><strong>CC1. </strong>Do you know about the Citizen’s Charter?</p>
                        <label>
                            <input type="checkbox" name="agree_to_terms">
                            Yes, aware before my transaction with this office
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name="agree_to_terms">
                            Yes, but aware only when I saw the CC of this office
                        </label> <br>
                        <label>
                            <input type="checkbox" name="agree_to_terms">
                            No, not aware of the CC. (Choose SKIP the next 2 questions)
                        </label>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12" style="overflow-x: auto">
                        <p><strong>CC2. </strong>If your answer to the previous question is Yes, did you see this
                            office’s CC?</p>
                        <label>
                            <input type="checkbox" name="agree_to_terms">
                            Yes, the CC was easy to find
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name="agree_to_terms">
                            Yes, but the CC was hard to find
                        </label> <br>
                        <label>
                            <input type="checkbox" name="agree_to_terms">
                            No, I did not see this office’s CC.
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12" style="overflow-x: auto">
                        <p><strong>CC3. </strong>If your answer to the previous question is Yes, did you use the CC as a
                            guide for the services you availed?</p>
                        <label>
                            <input type="checkbox" name="agree_to_terms">
                            Yes, I was able to use the CC
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name="agree_to_terms">
                            No, I was not able to use the CC
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">CLIENT SATISFACTION SURVEY</h3>

                <br><br>
                <p><strong>Instructions: For the following items, choose in the rating scale that best describes your
                        satisfaction level.</strong></p>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12" style="overflow-x: auto">
                         <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th><img src="{{ url('uploads/survey/sd.png') }}" alt="STRONGLY DISAGREE"> </th>
                                <th><img src="{{ url('uploads/survey/d.png') }}" alt="DISAGREE"> </th>
                                <th><img src="{{ url('uploads/survey/nda.png') }}" alt="NEITHER AGREE OR DISAGREE"></th>
                                <th><img src="{{ url('uploads/survey/a.png') }}" alt="AGREE"> </th>
                                <th><img src="{{ url('uploads/survey/sa.png') }}" alt="STRONGLY AGREE"> </th>
                                <th><img src="{{ url('uploads/survey/na.png') }}" alt="NA"> </th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="vertical-align: middle;"><strong>SQD0.</strong> I am satisfied with the
                                    service that I availed.</td>
                                <td>
                                    <input type="radio" name="sqd0" value="STRONGLY DISAGREE">
                                </td>
                                <td>
                                    <input type="radio" name="sqd0" value="DISAGREE">
                                </td>
                                <td>
                                    <input type="radio" name="sqd0" value="NEITHER AGREE NOR DISAGREE">
                                </td>
                                <td>
                                    <input type="radio" name="sqd0" value="AGREE">
                                </td>
                                <td>
                                    <input type="radio" name="sqd0" value="STRONGLY AGREE">
                                </td>
                                <td>
                                    <input type="radio" name="sqd0" value="NOT APPLICABLE">
                                </td>
                            </tr>

                            <tr>
                                <td style="vertical-align: middle;"><strong>SQD1.</strong> I spent a reasonable
                                    amount of time for my transaction.</td>
                                <td>
                                    <input type="radio" name="sqd1" value="STRONGLY DISAGREE">
                                </td>
                                <td>
                                    <input type="radio" name="sqd1" value="DISAGREE">
                                </td>
                                <td>
                                    <input type="radio" name="sqd1" value="NEITHER AGREE NOR DISAGREE">
                                </td>
                                <td>
                                    <input type="radio" name="sqd1" value="AGREE">
                                </td>
                                <td>
                                    <input type="radio" name="sqd1" value="STRONGLY AGREE">
                                </td>
                                <td>
                                    <input type="radio" name="sqd1" value="NOT APPLICABLE">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>
