<?php

namespace App\Exports;

use Illuminate\View\View;
use App\Models\PropertyType;


use App\Models\PropertyIssued;


use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;


class RegSepiExport implements WithTitle
,FromView
//,WithHeadings
//,FromQuery
//,WithMapping
,WithColumnFormatting
, WithCustomStartCell
, WithEvents
//,ShouldAutoSize
{
    private $_counter = 0;
    public $_regsepiData;
    private $_propertyType_id;
    public function __construct($regsepidata, $propertyType,$counter)
    {
        $this->_regsepiData=$regsepidata;
        $this->_counter=$counter;
        $this->_propertyType_id = $propertyType;
    }
//     public function view(): View
//     {
//         $propertyList = collect();
// //dd($this->_propertyType_id);
//         foreach ($this->_regsepiData as $propertyIssued) {
//             $propertyIssuedId = $propertyIssued->property_type_id;
//             $property = PropertyIssued::where('property_type_id', $propertyIssuedId)->first();

//             if ($property) {
//                 $propertyList->push($property);
//             }
//         }
//         $entityName ='DILG REGION VI, ILOILO CITY';
//         return view('admin.regsepi._export', [
//             'regsepi' => $propertyList
//             , 'entityName' => $entityName
//         ]);
//     }
public function view(): View
{
    $propertyList = collect();

    foreach ($this->_regsepiData as $propertyIssued) {
        $propertyIssuedId = $propertyIssued->property_type_id;
        // Fetch all properties that match the current property type ID
        $properties = PropertyIssued::where('property_type_id', $propertyIssuedId)->get();

        // Add each property to the collection, ensuring no duplicates
        foreach ($properties as $property) {
            if (!$propertyList->contains($property)) {
                $propertyList->push($property);
            }
        }
    }

    $entityName = 'DILG REGION VI, ILOILO CITY';
    return view('admin.regsepi._export', [
        'regsepi' => $propertyList,
        'entityName' => $entityName
    ]);
}

    /**
     * @return string
     */

    public function title(): string {
        $description = PropertyType::where('property_type_id', $this->_propertyType_id)
        ->pluck('property_type_description')
        ->first();
        return $description?? 'No description available';
        // Format the counter to have three digits with leading zeros
        // $formattedCounter = str_pad($this->_counter, 3, '0', STR_PAD_LEFT);
        // return '24-' . $formattedCounter;
    }


     public function columnFormats(): array
    {
        return [
            'I' =>  "0",
        ];
    }
    public function startCell(): string
    {
        return 'A4';
    }

    public function customStartCell(Worksheet $sheet)
    {
        // Set paper size to A4
        $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_A4);

    }

    public function registerEvents(): array
{
    return [
        BeforeSheet::class => function(BeforeSheet $event) {
            // Log statement
            Log::info('Executing BeforeSheet event');

            // Apply styling to the header row (row 7)
            $event->sheet->getStyle('A7:' . $event->sheet->getDelegate()->getHighestColumn() . '7')->applyFromArray([
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_LEFT,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ]);

            // Manually auto-size the columns based on header content in row 7
            $highestColumn = $event->sheet->getDelegate()->getHighestColumn();
            foreach (range('A', $highestColumn) as $col) {
                $event->sheet->getDelegate()->getColumnDimension($col)->setAutoSize(true);
            }
        },

        AfterSheet::class => function(AfterSheet $event) {
            // Manually set the width for each column
            $columnWidths = [
                'A' => 10, // Set column A width to 10 units
                'B' => 188 / 7, // Set column B width to 12 units
                'C' => 188 / 7, // Set column C width to 15 units
                'D' => 188 / 7, // Set column D width to approximately 5 cm
                'E' => 10, // Set column E width to 20 units
                'F' => 10,
                'G' => 188 / 7,
                'H' => 10,
                'I' => 188 / 7,
                'J' => 10,
                'K' => 188 / 7,
                'L' => 10,
                'M' => 10,
                'N' => 10,
                // '0' => 4,
                // Add more columns as needed
            ];

            foreach ($columnWidths as $column => $width) {
                $event->sheet->getDelegate()->getColumnDimension($column)->setWidth($width);
            }

            // Apply text wrapping to all data rows (starting from row 8 onwards)
            $highestColumn = $event->sheet->getDelegate()->getHighestColumn();
            $highestRow = $event->sheet->getDelegate()->getHighestRow();
            $event->sheet->getDelegate()->getStyle('A8:' . $highestColumn . $highestRow)->getAlignment()->setWrapText(true);
            $event->sheet->getDelegate()->getStyle('N:N')->getNumberFormat()
            ->setFormatCode('₱#,##0.00');
                      // Apply borders to all cells
                      $event->sheet->getStyle('A1:' . $highestColumn . $highestRow)->applyFromArray([
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '000000'],
                            ],
                        ],
                    ]);
        },
    ];



}}

