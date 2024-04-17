<div class="form-group">
    <div class="col-12">
    <label>DILG Office</label>
    {{-- <select class="form-control select2" disabled="disabled" style="width: 100%;">
        <option selected="selected">REGION VI - WESTERN VISAYAS</option>
    </select> --}}

    <select class="form-control office" name="office_id"
        id="office">

        @if(isset($dv))
        <option value="{{$dv['office']['res_center_id']}}" selected>

            {{$dv['office']['description']}}
        </option>
        @endif
    </select>
</div>

    <div class="col-12">
        <label for="">DV No</label>
        <input  type="text" class="form-control" name="dv_no" id="dv_no">
    </div>
    <div class="col-12">
        <label for="dv_type">{{__('DV Type')}}</label>
        <select class="form-control" name="dv_type" id="dv_type">
            @if(isset($dv)&&isset($dv['d_v_type']))
            <option value="{{$dv['d_v_type']['dv_type_id']}}" selected>{{$dv['d_v_type']['title']}}
            </option>
            @endif
        </select>
    </div>
    {{-- <div class="col-12">
        <label for="ors">{{__('ORS No')}}</label>
        <select class="form-control" name="ors_hdr_id" id="ors">
            @if(isset($dv)&&isset($dv['o_r_s']))
            <option value="{{$dv['o_r_s']['ors_hdr_id']}}" selected>{{$dv['o_r_s']['ors_no']}}
            </option>
            @endif
        </select>
    </div> --}}

    <div  class="col-12">
    <label>{{__('Select ORS No/s')}}</label>
    <select name="obli[]" id="ors_assign" placeholder="{{__('Select ORS No/s')}}" class="form-control select2" multiple required>
        @foreach($ors_list as $obli)
        <option value="{{ $obli->ors_no }}" >{{ $obli->ors_no }}</option>
            </option>
        @endforeach
    </select>
    </div>


    <div class="col-12">
        <label for="payee_id">{{__('Payee')}}</label>
        <select class="form-control" name="payee_id" id="payee_id">
            @if(isset($dv)&&isset($dv['payee']))
            <option value="{{$dv['payee']['payee_id']}}" selected>{{$dv['payee']['name']}}
            </option>
            @endif
        </select>
    </div>
    <div class="col-12">
        <label for="">DV Date</label>
        <input  type="date" class="form-control" name="dv_date" id="ors_date" value="{{ date('MM/DD/YYYY') }}">
    </div>
    <div class="col-12">
        <label for="">Check No</label>
        <input type="text" class="form-control" name="check_no" id="" placeholder="">
    </div>
    <div class="col-12">
        <label for="">Remarks/Purpose</label>
        <input type="text" class="form-control" name="particulars" id="" placeholder="">
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
                        {{-- <button type="button" class="btn btn-primary btn-sm add_component">
                            <i class="fa fa-plus"></i>
                            {{__('Add UACS')}}
                        </button> --}}
                    </li>

                </ul>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12" style="overflow-x: auto">
                        <table class="table table-striped table-bordered table-hover components" width="100%">
                            <thead class="btn-primary">

                                <th width="150px" class="text-center">{{__('UACS Code')}}</th>
                                <th width="10px" class="text-center">{{__('Amount')}}</th>
                                <th width="10px">{{__('Action')}}</th>
                            </thead>
                            <tbody class="items">
                                @php
                                $count = 0;
                                @endphp
                                @if(isset($ors) && isset($ors['details']) && !empty($ors['details']))
                                @foreach($ors['details'] as $orsdtl)
                                @php
                                $count++;
                                @endphp
                               <tr num="{{$count}}" dtl_id="{{$orsdtl['ors_dtl_id']}}">
                                <td>
                                    <div class="form-group">
                                        <select class="form-control uacs_id" name="details[0][uacs_id]" id="uacs_id{{$count}}" required>
                                            @if(isset($ors)&&isset($ors['details']))
                                            <option value="{{$ors['details']['uacs_id']}}" selected>
                                                {{$ors['details']['approsetupdtl_uacs']['uacs_subobject_code']}}
                                            </option>
                                            @endif
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <div id="toast_message" class="error-message"></div>
                                        <input type="number" class="input_amount" name="details[0][amount]" placeholder="{{__('Amount')}}" required>
                                        <span class="input-group-text">
                                            {{ get_currency() }}
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
