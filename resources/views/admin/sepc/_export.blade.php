<table>
    <thead>
        <tr>
            <td align="right" colspan="11" style="font-style: italic;">{{ __('Annex A.1') }}</td>
        </tr>
        <tr>
            <td align="center" colspan="11">{{ __('SEMI-EXPENDABLE PROPERTY CARD') }}</td>

        </tr>
        <tr></tr>
        <tr>
            <td align="left" colspan="4">{{ __('Entity Name:') }} {{ $entityName }}</td>
            <td align="right" colspan="7">{{ __('Fund Cluster:___________________') }}</td>
        </tr>
        @foreach($sepc as $prop)
        <tr>
            <td align="left" colspan="8">{{ __('Semi-expendable Property:') }} {{ $prop['semi_expendable_property'] ?? 'N/A' }}</td>
            <td align="left" colspan="3" rowspan="2">{{ __('Semi-expendable Property Number:') }} <br>{{ $prop['semi_expendable_property_no'] ?? 'N/A' }}</td>
        </tr>
        @endforeach
        @foreach($sepc as $prop)
        <tr>
            <td align="left" colspan="8">{{ __('Description:') }} {{ $prop['item_description'] ?? 'N/A' }}</td>
        </tr>
        @endforeach
        <tr>
            <th rowspan="2">{{ __('Date') }}</th>
            <th rowspan="2">{{ __('Reference') }}</th>
            <th colspan="3">{{ __('Receipt') }}</th>
            <th colspan="3">{{ __('Issue/Transfer/Disposal') }}</th>
            <th>{{ __('Balance') }}</th>
            <th rowspan="2">{{ __('Amount') }}</th>
            <th rowspan="2">{{ __('Remarks') }}</th>
        </tr>
        <tr>
            <th>{{ __('Qty') }}</th>
            <th>{{ __('Unit Cost') }}</th>
            <th>{{ __('Total Cost') }}</th>
            <th>{{ __('Item No.') }}</th>
            <th>{{ __('Qty') }}</th>
            <th>{{ __('Office/Officer') }}</th>
            <th>{{ __('Qty') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sepc as $prop)
        <tr>
            {{-- <td align="center">{{ $prop['date_acquired'] ?? 'N/A' }}</td> --}}
            <td align="center">{{ date('Y-m-d', strtotime($prop['date_acquired'])) ?? 'N/A' }}</td>

            <td align="center">{{ $prop['reference'] ?? 'N/A' }}</td>
            <td align="center">
                @php
                    $qty = match($prop['status']) {
                        0 => $prop['issued_qty'],
                        1 => $prop['returned_qty'],
                        2 => $prop['re_issued_qty'],
                        default => 0,
                    };
                @endphp
                {{ $qty ? $qty : 'N/A' }}
            </td>
            <td align="center">{{ $prop['amount'] ?? 'N/A' }}</td>
            <td align="center">
                @php
                    $amount = $prop['amount'] ?? 0;
                    $total_amount = $amount * $qty;
                @endphp
                {{ $total_amount ? $total_amount : 'N/A' }}
            </td>
            <td align="center">{{ $prop['ics_rrsp_no'] ?? 'N/A' }}</td>
            <td align="center">
                @php
                    $qty = match($prop['status']) {
                        0 => $prop['issued_qty'],
                        1 => $prop['returned_qty'],
                        2 => $prop['re_issued_qty'],
                        default => 0,
                    };
                @endphp
                {{ $qty ? $qty : 'N/A' }}
            </td>
            <td align="center">
                @php
                    $qty = match($prop['status']) {
                        0 => $prop['issued_office'],
                        1 => $prop['returned_office'],
                        2 => $prop['re_issued_office'],
                        default => 0,
                    };
                @endphp
                {{ $qty ? $qty : 'N/A' }}
            </td>
            <td align="center">{{ $prop['balance_qty'] ?? '0.00' }}</td>
            <td align="center">{{ $prop['amount'] ?? 'N/A' }}</td>
            <td align="center">{{ $prop['remarks'] ?? ' ' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
