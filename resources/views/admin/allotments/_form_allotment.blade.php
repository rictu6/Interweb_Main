
<div class="form-group">
    <div class="row">
        <div class="col-lg-12">
        <label for="budget_year">{{__('Budget Year')}}</label>
        <select   name="budget_year" id="budget_year"
        class="form-control">
          <option value="">Budget Year</option>
            <option value="2023">2023</option>
             <option value="2022">2022</option>
             </select>

      <div class="col-lg-12">
        <label for="month">{{__('Month')}}</label>
        <select   name="month" id="month"
        class="form-control">
          <option value="">Month</option>
            <option value="1">January</option>
             <option value="2">February</option>
             <option value="3">March</option>
             <option value="4">April</option>
             <option value="5">May</option>
             <option value="6">June</option>
             <option value="7">July</option>
             <option value="8">August</option>
             <option value="9">September</option>
             <option value="10">October</option>
             <option value="11">November</option>
             <option value="12">Decemberr</option>
             </select>
      </div>
    </div>
    <div class="col-lg-12">
      <label for="budget_type">{{__('Authorization')}}</label>
      <select  class="form-control" name="budget_type" id="budget_type">
          @if(isset($saro)&&isset($ors['budgettype']))
          <option value="{{$saro['budgettype']['budget_type_id']}}" selected> {{$saro['budgettype']['description']}}
            </option>
            @endif
      </select>
    </div>
    <div class="col-lg-12">
        <label for="fund_source_id">{{__('Fund Source')}}</label>
        <select  class="form-control" name="fund_source_id" id="fund_source_id">
            @if(isset($saro)&&isset($saro['fundsource']))
            <option value="{{$saro['fundsource']['fund_source_id']}}" selected>{{$saro['fundsource']['code']}} - {{$saro['fundsource']['description']}}
              </option>
              @endif
        </select>
      </div>
      <div class="col-lg-12">
        <label for="pap_id">{{__('PAP')}}</label>
        <select  class="form-control" name="pap_id" id="pap_id">
            @if(isset($saro)&&isset($saro['pap']))
            <option value="{{$saro['pap']['pap_id']}}" selected>{{$saro['pap']['code']}} - {{$saro['pap']['description']}}
              </option>
              @endif
        </select>
       </div>
      <div class="col-lg-12">
    <label for="sub_allotment_no">{{__('GAA/ SARO No.')}}</label>
        <input type="text" class="form-control" name="sub_allotment_no" placeholder="{{__('GAA/ SARO No.')}}"  required>
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
                                <th width="400px">{{__('UACShh')}}</th>
                                <th width="100px">{{__('Allotment Received')}}</th>
                                <th width="10px">{{__('Action')}}</th>
                            </thead>
                            <tbody class="items">
                                @php
                                  $count=0;
                                  $option_count=0;
                                @endphp
                                @if(isset($saro))
                                {{-- para ni sa mag edit later on, kung set na an saro, cons ni wala gashow ang uacs initially --}}
                                    @foreach($saro['approdtls'] as $detail)
                                    {{-- bisan wala na ang if kg foreach gagana ang code, gn butang ko lg parasa id sang tr --}}
                                        @php
                                            $count++;
                                        @endphp
                                        {{-- num="{{$count}}" test_id="{{$component['id']}}" --}}
                                        <tr dtl_id="{{$detail['appro_dtl_id']}}" >
                                            {{-- @if($component['title']) --}}
                                                <td>
                                                    <div class="form-group">
                                                        {{-- <label for="uacs_subobject_code">{{__('UACS')}}</label> --}}
                                                        <input type="hidden" id="count" value="{{ $count }}">
                                                        <select  class="form-control" name="approdtls[0][uacs_subobject_code]" id="uacs_subobject_code">
                                                            @if(isset($saro)&&isset($saro['approdtls']))
                                                            <option value="{{$saro['approdtls']['uacs_subobject_code']}}" selected>{{$saro['approdtls']['uacs_subobject_code']}}
                                                              </option>
                                                              @endif
                                                        </select>
                                                      </div>
                                                </td>
                                                <td>
                                               <div class="form-group">
                                                <div class="input-group-append">
                                                                    <input type="number" class="form-control" name="approdtls[0][allotment_received]"  min="0" class="allotment_received" required>
                                                                        <span class="input-group-text">
                                                                            {{get_currency()}}
                                                                        </span>
                                                                        </div>
                                                            </div>
                                                        </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger delete_row">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            {{-- @endif --}}
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
<input type="hidden" name="" id="option_count" value="{{$option_count}}">

