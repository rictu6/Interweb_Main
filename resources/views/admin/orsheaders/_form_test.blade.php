<div class="form-group">
    <label>DILG Office</label>
    <select class="form-control select2" disabled="disabled" style="width: 100%;">
        <option selected="selected">REGION VI - WESTERN VISAYAS</option>
    </select>
</div>
<div class="row">
    <div class="col-5">
        <label for="">ORS No</label>
        <input disabled="disabled" type="text" class="form-control" name="ors_no" id="ors_no">
    </div>
    <div class="col-4">
        <label for="">ORS Date</label>
        <input disabled="disabled" type="date" class="form-control" name="ors_date" id="ors_date" value="{{ date('MM/DD/YYYY') }}">
    </div>
    <div class="col-3">
        <label for="">Date Received</label>
        <input type="date" class="form-control" name ="date_received"id="" placeholder="Select Date Received">
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="payee">{{__('Payee')}}</label>
        <select class="form-control" name="payee" id="payee_id">
            @if(isset($ors)&&isset($ors['payee']))
            <option value="{{$ors['payee']['payee_id']}}" selected>{{$ors['payee']['name']}}
            </option>
            @endif
        </select>
    </div>
    <div class="col-4">
        <label for="">Office</label>
        <input type="text" class="form-control" name="office_id" id="" placeholder="">
    </div>
    <div class="col-4">
        <label for="">Address</label>
        <input type="text" class="form-control" name="address" id="" placeholder="">
    </div>
</div>
<div class="form-group">
    <label for="">Particulars</label>
    <textarea type="text" class="form-control" name="particulars" id="" placeholder=""></textarea>
</div>

<div class="row">
    <div class="col-3">
        <label for="uacs_subclass_id">{{__('Allotment Class')}}</label>
        <select class="form-control" name="uacs_subclass_id" id="uacs_subclass_id">
            @if(isset($ors)&&isset($ors['allotmentclass']))
            <option value="{{$ors['allotmentclass']['cluster_code']}}" selected>{{$ors['allotmentclass']['cluster_code']}} -
                {{$ors['allotmentclass']['description']}}
            </option>
            @endif
        </select>
    </div>
    <div class="col-3">
        <label for="fund_cluster_id">{{__('Fund Cluster')}}</label>
        <select class="form-control" name="fund_cluster_id" id="fund_cluster_id">
            @if(isset($ors)&&isset($ors['fundcluster']))
            <option value="{{$ors['fundcluster']['fund_cluster_id']}}" selected>{{$ors['fundcluster']['code']}} -
                {{$ors['fundcluster']['description']}}
            </option>
            @endif
        </select>
    </div>
    <div class="col-3">

        <label for="budget_type">{{__('Authorization')}}</label>
        <select class="form-control" name="budget_type" id="budget_type">
            @if(isset($ors)&&isset($ors['budgettype']))
            <option value="{{$ors['budgettype']['budget_type_id']}}" selected> {{$ors['budgettype']['description']}}
            </option>
            @endif
        </select>
    </div>

    <div class="col-3">
        {{-- @foreach ($fundsources as $row)
            <option value="{{$row->fund_source_id}}">{{ $row->code}} - {{ $row->description}}</option>
        @endforeach --}}

        <label for="fund_source_id">{{__('Fund Source')}}</label>
        <select class="form-control" name="fund_source_id" id="fund_source_id">
            @if(isset($ors)&&isset($ors['fundsource']))
            <option value="{{$ors['fundsource']['fund_source_id']}}" selected>{{$ors['fundsource']['code']}} -
                {{$ors['fundsource']['description']}}
            </option>
            @endif
        </select>
    </div>

</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">{{__('UACS')}}</h3>
                <ul class="list-style-none">
                    <li class="d-inline float-right">
                        <button type="button" class="btn btn-primary btn-sm add_component">
                            <i class="fa fa-plus"></i>
                            {{__('Add UACS')}}
                        </button>
                    </li>

                </ul>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12" style="overflow-x: auto">
                        <table class="table table-striped table-bordered table-hover components" width="100%">
                            <thead class="btn-primary">
                                <th width="200px">{{__('Resposibility Center')}}</th>
                                <th width="100px">{{__('Charge To')}}</th>
                                <th width="200px">{{__('P/A/P')}}</th>
                                <th width="200px">{{__('Sub Allotment No')}}</th>
                                <th width="150px" class="text-center">{{__('UACS Code')}}</th>
                                <th width="10px" class="text-center">{{__('Amount')}}</th>
                                <th width="10px">{{__('Action')}}</th>
                            </thead>
                            <tbody class="items">
                                @php
                                $count = 0;
                                @endphp
                                @if(isset($ors) && isset($ors['orsdetails']) && !empty($ors['orsdetails']))
                                @foreach($ors['orsdetails'] as $orsdtl)
                                @php
                                $count++;
                                @endphp
                               <tr num="{{$count}}" dtl_id="{{$orsdtl['ors_dtl_id']}}">
                                <td>
                                    <div class="form-group">
                                        {{-- <label for="res_center_id">{{__('Responsibility Center')}}</label> --}}
                                        <select class="form-control responsibility_center" name="ORSDetails[0][responsibility_center]"
                                            id="responsibility_center">
                                            @if(isset($ors)&&isset($ors['ORSDetails']))
                                            <option value="{{$ors['ORSDetails']['responsibilitycenter']}}" selected>
                                                {{$ors['ORSDetails']['responsibilitycenter']['code']}} -
                                                {{$ors['ORSDetails']['responsibilitycenter']['description']}}
                                            </option>
                                            @endif
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">

                                        <select class="form-control allotment_class_id" name="ORSDetails[0][allotment_class_id]" placeholder="{{__(' to')}}"
                                        id="allotment_class_id{{$count}}" required>
                                            <option value="" disabled selected>{{__('CHARGE TO')}}</option>
                                            <option value="1" {{ old('allotment_class_id') =="ALLOTMENT"? "selected" : '' }}>
                                                    {{__('ALLOTMENT')}}</option>
                                            <option value="2" {{ old('allotment_class_id') =="SUB- ALLOTMENT"? "selected" : '' }}>
                                                    {{__('SUB- ALLOTMENT')}}</option>

                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">

                                        {{-- <label for="ORSDetails[0][pap_id]">{{__('PAP')}}</label> --}}
                                        <select class="form-control pap_id" name="ORSDetails[0][pap_id]" id="pap_id{{$count}}">
                                            @if(isset($ors)&&isset($ors['ORSDetails']))
                                            <option value="{{$ors['ORSDetails']['pap_id']}}" selected>
                                                {{$ors['ORSDetails']['pap']['code']}} -
                                                {{$ors['ORSDetails']['pap']['description']}}
                                            </option>
                                            @endif
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">

                                        {{-- <label for="ORSDetails[0][pap_id]">{{__('Sub-Allotment')}}</label> --}}
                                        <select class="form-control sub_allotment_id" name="ORSDetails[0][sub_allotment_id]" id="sub_allotment_id">
                                            @if(isset($ors)&&isset($ors['ORSDetails']))
                                            <option value="{{$ors['ORSDetails']['sub_allotment_id']}}" selected>
                                                {{$ors['ORSDetails']['appro_sub_allotment']['sub_allotment_no']}}
                                            </option>
                                            @endif
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">


                                        <select class="form-control uacs_id" name="ORSDetails[0][uacs_id]" id="uacs_id">
                                            @if(isset($ors)&&isset($ors['ORSDetails']))
                                            <option value="{{$ors['ORSDetails']['uacs_id']}}" selected>
                                                {{$ors['ORSDetails']['approsetupdtl_uacs']['uacs_subobject_code']}}
                                            </option>
                                            @endif
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">

                                     <input type="number" class="form-control amount" name="ORSDetails[0][amount]" placeholder="{{__('Amount')}}"  required>
                                     <span class="input-group-text">
                                                  {{get_currency()}}
                                              </span>
                                      </div>
                                  </td>
                                <td>
                                    <button type="button" class="btn btn-danger delete_row">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>

                                </tr>
                                @endforeach
                             @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" name="" id="count" value="{{$count}}">

