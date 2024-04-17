<?php

namespace App\Exports;
use App\Models\PropertyIssued;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class RegSepiExport implements FromView, WithColumnFormatting, WithCustomStartCell, WithEvents,ShouldAutoSize
{
    public function view(): View
    {
        return view('admin.regsepi._export', [
            'regsepi' => PropertyIssued::all()
        ]);
    }

    public function columnFormats(): array
    {
        return [
            'I' =>  "0",
        ];
    }
    public function startCell(): string
    {
        return 'A1';
    }

    public function customStartCell(Worksheet $sheet)
    {
        // Set paper size to A4
        $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_A4);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // Set orientation to landscape
                $event->sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);

                // Get the highest column index in the header row
                $highestColumn = $event->sheet->getDelegate()->getHighestColumn();

                // Get the highest row index in the header row
                $highestRow = $event->sheet->getDelegate()->getHighestRow();

                // Set borders for the entire header row
                $event->sheet->getDelegate()->getStyle('A5:' . $highestColumn . $highestRow)->applyFromArray([
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


?>
