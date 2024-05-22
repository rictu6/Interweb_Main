<?php

namespace App\Exports;

use Illuminate\View\View;
use App\Models\PropertyIssued;


use Maatwebsite\Excel\Events\AfterSheet;


use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
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

class SepcExport implements WithTitle
,FromView
//,WithHeadings
//,FromQuery
//,WithMapping
,WithColumnFormatting
, WithCustomStartCell
, WithEvents
,ShouldAutoSize
{
    private $_counter = 0;
    public $_sepcData;
    public function __construct($sepcData,$counter)
    {
        $this->_sepcData=$sepcData;
        $this->_counter=$counter;
    }
    public function view(): View
    {
        $propertyList = collect();

        foreach ($this->_sepcData as $propertyIssued) {
            $propertyIssuedId = $propertyIssued->property_issued_id;
            $property = PropertyIssued::where('property_issued_id', $propertyIssuedId)->first();

            if ($property) {
                $propertyList->push($property);
            }
        }
        $entityName ='DILG REGION VI, ILOILO CITY';
        return view('admin.sepc._export', [
            'sepc' => $propertyList
            , 'entityName' => $entityName
        ]);
    }
    /**
     * @return string
     */

    public function title(): string {


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


            AfterSheet::class => function(AfterSheet $event) {
                // Set orientation to landscape
                $event->sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);

                // Get the highest column index in the header row
                $highestColumn = $event->sheet->getDelegate()->getHighestColumn();

                // Get the highest row index in the header row
                $highestRow = $event->sheet->getDelegate()->getHighestRow();

                // Set borders for the entire header row
                $event->sheet->getDelegate()->getStyle('A4:' . $highestColumn . $highestRow)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ],
                ]);
            },
        ];
    }

}
