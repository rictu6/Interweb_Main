<?php

namespace App\Exports;

use App\Models\PropertyIssued;



use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ICSSheetExport implements WithMultipleSheets

{
    use Exportable;

    protected $data;

    public function __construct($data)
    {
        //dd($data);
        $this->data=$data;
    }
/**
   * @return array
   * */

  public function sheets():array
  {
    $counter = 0;
    $sheets=[];
    // foreach($this->data as $sepc){
    //     $sheets[]=new SepcExport($sepc);
    // }
    foreach ($this->data as $propertyType => $propertyList) {
        $counter++;
        $sheets[] = new ICSExport($propertyList, $propertyType,$counter);
    }
    return $sheets;
  }
}
