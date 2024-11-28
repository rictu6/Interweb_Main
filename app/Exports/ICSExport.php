<?php

namespace App\Exports;

use Illuminate\View\View;
use App\Models\PropertyType;


use App\Models\PropertyIssued;


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

class ICSExport implements WithTitle
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
    public $_ics_data;
    private $_propertyType_id;
    public function __construct($ics_data, $propertyType,$counter)
    {
        $this->_ics_data=$ics_data;
        $this->_counter=$counter;
        $this->_propertyType_id = $propertyType;
    }
//     public function view(): View
//     {
//         $propertyList = collect();
// //dd($this->_propertyType_id);
//         foreach ($this->_ics_data as $propertyIssued) {
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

    foreach ($this->_ics_data as $propertyIssued) {
        $propertyIssued_off = $propertyIssued->issued_office;
        // Fetch all properties that match the current property type ID
        $properties = PropertyIssued::where('issued_office', $propertyIssued_off)->get();

        // Add each property to the collection, ensuring no duplicates
        foreach ($properties as $property) {
            if (!$propertyList->contains($property)) {
                $propertyList->push($property);
            }
        }
    }

    $entityName = 'DILG REGION VI, ILOILO CITY';
    return view('admin.ics._export', [
        'ics' => $propertyList,
        'entityName' => $entityName
    ]);
}

    /**
     * @return string
     */

    public function title(): string {
        // $description = PropertyType::where('property_type_id', $this->_propertyType_id)
        // ->pluck('property_type_description')
        // ->first();
        // return $description?? 'No description available';
        // Format the counter to have three digits with leading zeros
        $formattedCounter = str_pad($this->_counter, 3, '0', STR_PAD_LEFT);
        return '24-' . $formattedCounter;
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
                // Apply styling to the first two rows of the sheet (headings)
                $event->sheet->getStyle('A1:C2')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                    // 'fill' => [
                    //     'fillType' => Fill::FILL_SOLID,
                    //     'startColor' => ['rgb' => 'CCCCCC'],
                    // ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ]);
            },

            // AfterSheet::class => function(AfterSheet $event) {
            //     // Define the text to search for
            //     $searchTexts = [
            //         'ANA LEA ALGER',
            //         'AO V/Supply Officer'
            //     ];

            //     // Define the range to search in
            //     $range = 'A1:A20'; // Adjust the range based on your sheet layout

            //     /** @var Worksheet $sheet */
            //     $sheet = $event->sheet;

            //     // Loop through the specified range to find and style the text
            //     foreach ($searchTexts as $text) {
            //         $cellCollection = $sheet->getCellCollection();
            //         foreach ($cellCollection as $cell) {
            //             $cellValue = $sheet->getCell($cell)->getValue();
            //             if (stripos($cellValue, $text) !== false) {
            //                 // Apply underline style to the found cell
            //                 $sheet->getStyle($cell)->applyFromArray([
            //                     'font' => [
            //                         'underline' => Font::UNDERLINE_SINGLE,
            //                     ],
            //                 ]);
            //                 // Optionally, apply bottom alignment
            //                 $sheet->getStyle($cell)->getAlignment()->setVertical(Alignment::VERTICAL_BOTTOM);
            //             }
            //         }
            //     }
            // },
            AfterSheet::class => function(AfterSheet $event) {
                // Manually set the width for each column
                $columnWidths = [
                    'A' => 10, // Set column A width to 10 units
                    'B' => 10, // Set column B width to 12 units
                    'C' => 10, // Set column C width to 15 units
                    'D' => 10, // Set column D width to approximately 5 cm
                    'E' => 188 / 7, // Set column E width to 20 units
                    'F' => 188 / 7,
                    'G' => 10,

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
                $event->sheet->getDelegate()->getStyle('C:D')->getNumberFormat()
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
    }
}
