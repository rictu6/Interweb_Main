<?php

namespace App\Models;

class ReportDTO
{
    public $date;
    public $dv_no;
    public $check_no;
    public $ors_no;
    public $payee;
    public $deposits;
    public $payments;
    public $balance;
    public $account_desc;
    public $uacs_code;
    public $amount;
    public $withholding_tax;
    public $other_deductions;


    public function __construct($date, $dv_no, $check_no,$ors_no,$payee,
    $deposits, $payments,$balance, $account_desc, $uacs_code)//,$amount, $withholding_tax, $other_deductions
    {
        $this->date = $date;
        $this->dv_no = $dv_no;
        $this->check_no = $check_no;
        $this-> ors_no= $ors_no;
        $this->payee = $payee;
        $this->deposits = $deposits;
        $this->payments = $payments;
        $this->balance = $balance;
        $this->account_desc = $account_desc;
        $this->uacs_code = $uacs_code;
 
        // $this->other_deductions = $other_deductions;

    }
}
