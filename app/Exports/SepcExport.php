<?php

namespace App\Exports;

use App\Models\PropertyIssued;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class SepcExport implements WithMultipleSheets
{
    use Exportable;

    protected $data;

    public function __construct($data)
    {
        $this->data=$data;
    }
/**
   * @return array
   * */

  public function sheets():array
  {
    $sheets=[];
    foreach($this->data as $sepc){
        $sheets[]=new PropertyIssued($sepc->property_issued_id);
    }
    return $sheets;
  }

}
