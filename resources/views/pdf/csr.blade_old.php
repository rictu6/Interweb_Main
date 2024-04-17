@extends('layouts.pdf')

@section('content')
<style>
    .title{
        font-size: 20px;
        background-color: #dddddd;
        border: 1px solid black!important;
        margin-bottom: 10px;
    }
    .table{
        margin-top: 20px;
    }
    .accounting_header{
        border: 2px solid black;
        background-color: #F0F0F0;
    }

</style>
    <div class="accounting_header">
        <h3 align="left">
            <img  src="{{url('img/header_code.png')}}" width="15px" alt="">
            {{__('Consolidated Client Satisfaction Report')}}
        </h3>
        <h6 align="center">{{__('Due Date')}} : {{date('d-m-Y')}}</h6>
        {{-- <h6 align="center">{{__('From Date')}} {{date('d-m-Y',strtotime($data['from']))}} {{__('To Date')}} {{date('d-m-Y',strtotime($citcha['to']))}}</h6> --}}
    </div>
    <!-- Report Details -->
    {{-- @if(isset($request['show_csr1'])) gn omit ko ke wla mn gina pasa sa compact ni--}}
    <table class="table table-bordered">
        <thead>
        <tr class="title">
            <th colspan="9">
                {{__('Part 1')}}

            </th>
        </tr>
        <tr>
            <th>{{__('Service Type')}}</th>
            <th>{{__('Required Minimum Number of Responses (Annual)')}}</th>
            <th>{{__('Number of Responses Received')}}</th>

        </tr>
        </thead>
        <tbody>
            @if(is_array($data) && isset($data['citchas']) && is_array($data['citchas']) && count($data['citchas']) == 0)

            <tr>
                <td colspan="9" align="center">
                    {{__('No data available')}}
                </td>
            </tr>
    {{--  if(isset($data['citchas'])) --}}
    @else
        @foreach($data as $cc)
        <tr>
            <td align="center">
                @if(isset($cc['service']))
                {{($cc['service']['description'])}}
            @endif

            </td>
            <td align="center">
                {{-- @if(isset($cc)) --}}
                {{ $data['service_min'] }}

            {{-- @endif --}}
            </td>
            <td align="center">
                @if(isset($cc['service_id']))
                {{-- {{($cc['service_id'])}} --}}
                {{ ($data['serviceCounts'][$cc->service_id]) ?? 0 }}
            @endif


            </td>

        </tr>
        @endforeach
        @endif
        </tbody>
    </table>
    {{-- @endif --}}
    <!-- \Report Details -->

    <!-- Expenses Details -->
    @if(isset($data['show_expenses']))
        <table class="table table-bordered" width="100%">
          <thead>
            <tr class="title">
                <th colspan="3">
                    {{__('Expenses')}}
                </th>
            </tr>
            <tr>
              <th>{{__('Category')}}</th>
              <th>{{__('Date')}}</th>
              <th>{{__('Amount')}}</th>
            </tr>
          </thead>
          <tbody>
            @if(count($data['expenses'])==0)
            <tr>
                <td colspan="3" align="center">
                    {{__('No data available')}}
                </td>
            </tr>
            @endif
            @foreach($data['expenses'] as $expense)
            <tr>
                <td align="center">
                  @if(isset($expense['category']))
                    {{$expense['category']['name']}}
                  @endif
                </td>
              <td align="center">{{date('d-m-Y',strtotime($expense['date']))}}</td>
              <td align="center">{{formated_price($expense['amount'])}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
    @endif
    <!-- \Expenses Details -->

    <!--  Report Summary  -->
    {{-- <table class="table table-bordered" width="100%">
        <thead>
            <tr class="title">
                <th colspan="2">
                    {{__('Accounting Report Summary')}}
                </th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <th width="100px" align="left">{{__('Total')}}:</th>
            <td>{{formated_price($data['total'])}}</td>
        </tr>
        <tr>
            <th width="100px" align="left">{{__('Paid')}}:</th>
            <td>{{formated_price($data['paid'])}}</td>
        </tr>
        <tr>
            <th width="100px" align="left">{{__('Due')}}:</th>
            <td>{{formated_price($data['due'])}}</td>
        </tr>
        @if(isset($data['show_expenses']))
        <tr>
            <th width="100px" align="left">{{__('Expenses')}}:</th>
            <td>{{formated_price($data['total_expenses'])}}</td>
        </tr>
        @endif
        @if(isset($data['show_profit']))
        <tr>
            <th width="100px" align="left">{{__('Profit')}}:</th>
            <td>{{formated_price($data['profit'])}}</td>
        </tr>
        @endif
        </tbody>
    </table> --}}
    <!-- \ Report Summary-->
@endsection
