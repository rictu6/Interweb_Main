<?php

namespace App\Models;

class SaroDTO
{
    public $uacs_code;
   
    public $allotment_class;

    //public $allotment_amt;
    public $allotment_amt;
    public $obli;
    public $unlqdt;
    public $allotment_amount;
  
    public $obligation;
    public $unliquidated;

    public function __construct($uacs_code,$allotment_class,  $allotment_amt,$obli,$unlqdt,$allotment_amount,$obligation,$unliquidated)//,$amount, $withholding_tax, $other_deductions
    {
        $this->uacs_code = $uacs_code;
       
        $this->allotment_class = $allotment_class;
        
        $this->allotment_amt = $allotment_amt;
        $this->obli = $obli;
        $this->unlqdt = $unlqdt;
        $this->allotment_amount = $allotment_amount;
        $this->obligation = $obligation;
        $this->unliquidated = $unliquidated;
 

    }
}
