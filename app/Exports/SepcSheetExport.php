<?php

namespace App\Exports;

use App\Models\PropertyIssued;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class SepcSheetExport implements WithTitle,WithHeadings, FromQuery,WithMapping

{
    public $sepc;
    public function __construct($sepc)
    {
        $this->sepc=$sepc;
    }
    /**
     * @return string
     */
    public function title(): string{
    return $this->sepc->property_issued_id;
     }

     public function headings():array{
        return[
           'Date',
            'Reference',
            'Item Desc',
            'Estimated',
            'Issued',
            'Returned',
            'Re-issued'
        ];
     }
     public function query(){
        return PropertyIssued::where('property_issued_id',$this->sepc->property_issued_id);
     }
     public function map($row):array{
        return[
           $row['Date'],
           $row['Reference'],
           $row['Item Desc'],
           $row['Estimated'],
           $row['Issued'],
           $row['Returned'],
           $row['Re-issued']
        ];
     }
}
