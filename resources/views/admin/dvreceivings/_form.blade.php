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
    <select name="o_r_s[]" id="ors_assign" placeholder="{{__('Select ORS No/s')}}" class="form-control select2" multiple required>
        @foreach($ors_list as $obli)
        <option value="{{ $obli->ors_hdr_id }}" >{{ $obli->ors_no }}</option>
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
</div>

