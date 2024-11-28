<table>
    <thead>
        <tr>
            <td align="right" colspan="7" style="font-style: italic;">{{ __('Annex A.3') }}</td>
        </tr>
        <tr>
            <td align="center" colspan="7">{{ __('INVENTORY CUSTODIAN SLIP') }}</td>

        </tr>
        <tr></tr>
        <tr>
            <td align="left" colspan="4">{{ __('Entity Name:') }} {{ $entityName }}</td>

        </tr>
        {{-- //@foreach($ics as $prop) --}}
        <tr>
            <td align="left" colspan="4">{{ __('Fund Cluster:___________________') }}</td>
            <td align="right"  colspan="2">{{ __('ICS No:') }} </td>

        </tr>
        {{-- @endforeach --}}

        <tr>
            <th rowspan="2">{{ __('Quantity') }}</th>
            <th rowspan="2">{{ __('Unit') }}</th>
            <th colspan="2">{{ __('Amount') }}</th>
            <th rowspan="2">{{ __('Description') }}</th>
            <th rowspan="2">{{ __('Item No.') }}</th>
            <th rowspan="2">{{ __('Estimated Useful Life') }}</th>

        </tr>
        <tr>

            <th>{{ __('Unit Cost') }}</th>
            <th>{{ __('Total Cost') }}</th>

        </tr>
    </thead>
    <tbody>
        @foreach($ics as $prop)
        <tr>
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
            <td align="center">{{  'N/A' }}</td>
            <td align="center">{{ $prop['amount'] ?? 'N/A' }}</td>
            <td align="center">
                @php
                    $amount = $prop['amount'] ?? 0;
                    $total_amount = $amount * $qty;
                @endphp
                {{ $total_amount ? $total_amount : 'N/A' }}
            </td>
            {{-- <td align="center">{{ $prop['item_description'] ?? 'N/A' }}</td> --}}
            <td align="center">
                {{ $prop['item_description'] ?? 'N/A' }}<br><br><br><br>
                Date Acquired: {{ $prop['date_acquired'] ?? 'N/A' }}
            </td>
            <td align="center">{{ $prop['semi_expendable_property_no'] ?? 'N/A' }}</td>
            <td align="center">{{ $prop['estimated_useful_life'] ?? 'N/A' }}</td>

        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" style="padding-top: 20px;">{{ __('Received From:') }}</td>
            <td colspan="4" style="padding-top: 20px;">{{ __('Received By:') }}</td>
        </tr>
        <tr>
            <td colspan="5" style="height: 60px; vertical-align: bottom; border-top: 1px solid black; text-align: center;">
                <strong style="display: inline-block; border-bottom: 1px solid black; padding-bottom: 2px;">
                    {{ __('ANA LEA ALGER') }}
                </strong><br>
                <strong>{{ __('Signature over Printed Name') }}</strong><br>

                <strong style="display: inline-block; border-bottom: 1px solid black; padding-bottom: 2px;">
                    {{ __('AO V/Supply Officer') }}
                </strong><br>
                <strong>{{ __('Position/Office') }}</strong><br>
                <em>{{ __('Date:') }} _____________________</em>
            </td>
            <td colspan="4" style="height: 100px; vertical-align: bottom; border-top: 1px solid black; text-align: center;">
                <!-- Second footer section with dynamic office data   dd($prop['status'], $office);-->
                @php
                    $office = match($prop['status']) {
                        0 => $prop['issued_office'] ?? 'N/A',
                        1 => $prop['returned_office'] ?? 'N/A',
                        2 => $prop['re_issued_office'] ?? 'N/A',
                        default => 'N/A',
                    };

                @endphp
                <strong>{{ $office }}</strong><br>
                <strong>{{ __('Signature over Printed Name') }}</strong><br>

                <strong>{{ __('_______________________') }}</strong><br>
                <strong>{{ __('Position/Office') }}</strong><br>
                <em>{{ __('Date:') }} _____________________</em>
            </td>

            {{-- <td colspan="4" style="height: 100px; vertical-align: bottom; border-top: 1px solid black; text-align: center;">
                <strong>{{ __('______________________') }}</strong><br>
                <strong>{{ __('Signature over Printed Name') }}</strong><br>


                <strong>{{ __('_______________________') }}</strong><br>
                <strong>{{ __('Position/Office') }}</strong><br>
                <em>{{ __('Date:') }} _____________________</em>
            </td> --}}
        </tr>
    </tfoot>
</table>
