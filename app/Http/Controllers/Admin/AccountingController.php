<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\ApproSetup;
use App\Models\Culture;
use App\Models\Doctor;
use App\Models\Expense;
use App\Models\Group;
use App\Models\ORSHeader;
use App\Models\ReportDTO;
use App\Models\SaroDTO;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AccountingController extends Controller
{
    /**
     * assign roles
     */
    public function __construct()
    {
        $this->middleware('can:view_accounting_reports',     ['only' => ['index']]);
        $this->middleware('can:generate_report_accounting',     ['only' => ['generate_report']]);
    }


    /**
     * accounting view
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {   $total_balance=0;
        $runningBalance = 0;
        $count=0;
        $ors_show=new ORSHeader();
        $ors_payments = ORSHeader::with('processed', 'details', 'details.uacs', 'details.pap', 'fundsource', 'payee', 'disbursement')
                ->where('ors_type', 2)
                ->whereHas('disbursement', function ($query) {
                $query->whereNotNull('dv_no');
                })
                // ->orderByDesc('ors_date')
                ->get();

        $ors_deposit = ORSHeader::with('processed', 'details', 'details.uacs', 'details.pap', 'fundsource', 'payee')
                    ->where('ors_type', 1)
                    // ->orderByAsc('ors_date')
                    ->get();
                    $ors_show = $ors_payments->concat($ors_deposit)->sortBy('ors_date');

        $reports = [];
//dd($ors_show);
        foreach ($ors_show as $ors) {
             $count++;
            foreach ($ors->details as $det) {
                //  dd($ors->details);
                $uacs_id = $det->uacs_id;


            // Calculate the running balance
            if ($ors->ors_type == 1) {
                // For ors_type 1, add the amount to the running balance
                $runningBalance += $det->amount;
                $report = AccountingController::generateROReport($ors, $det, $runningBalance,null);
            } elseif ($ors->ors_type == 2) {
                // For ors_type 2, subtract the amount from the running balance
                $runningBalance -= $det->amount;
                $report = AccountingController::generateROReport($ors, $det, $runningBalance,null);
            }

            }
            $reports[] = $report;
            }

//dd($reports);
        return view('admin.accounting.index',compact('reports'));
    }
    public function cash_register()
    {
        $runningBalance = 0;
        $ors_show=new ORSHeader();
        $ors_payments = ORSHeader::with('processed', 'details', 'details.uacs', 'details.pap', 'fundsource', 'payee', 'disbursement')
                ->where('ors_type', 2)
                ->whereHas('disbursement', function ($query) {
                $query->whereNotNull('dv_no');
                })
                // ->orderByDesc('ors_date')
                ->get();

        $ors_deposit = ORSHeader::with('processed', 'details', 'details.uacs', 'details.pap', 'fundsource', 'payee')
                    ->where('ors_type', 1)
                    // ->orderByAsc('ors_date')
                    ->get();
        $ors_show = $ors_payments->concat($ors_deposit)->sortBy('ors_hdr_id');

                $reports = [];
                //dd($ors_show);
        foreach ($ors_show as $ors) {

            foreach ($ors->details as $det) {
                //  dd($ors->details);
                $uacs_id = $det->uacs_id;

                //$report = AccountingController::generate_fieldReport($ors, $det);
                // // Calculate the running balance
                 if ($ors->ors_type == 1) {

                 $runningBalance += $det->amount;
                $report = AccountingController::generate_cashreg_Report($ors, $det,$runningBalance);
                }
                elseif ($ors->ors_type == 2) {

                    $runningBalance -= $det->amount;
                $report = AccountingController::generate_cashreg_Report($ors, $det,$runningBalance);
                }
                $reports[] = $report;
                }

                }

        return view('admin.accounting.cash_register',compact('reports'));
    }
    public function field()
    {
        $ors_this_month=new ORSHeader();
        $ors_show=new ORSHeader();
        $ors_payments = ORSHeader::with('processed', 'details', 'details.uacs', 'details.pap','details.allotment_class', 'fundsource', 'payee', 'disbursement')
                ->where('ors_type', 2)
                ->whereHas('disbursement', function ($query) {
                $query->whereNotNull('dv_no');
                })
                // ->orderByDesc('ors_date')
                ->get();

        $ors_deposit = ORSHeader::with('processed', 'details', 'details.uacs', 'details.pap','details.allotment_class', 'fundsource', 'payee')
                    ->where('ors_type', 1)
                    // ->orderByAsc('ors_date')
                    ->get();
        $ors_show = $ors_payments->concat($ors_deposit)->sortBy('ors_hdr_id');

        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $ors_this_month = $ors_show->whereBetween('ors_date', [
            Carbon::create($currentYear, $currentMonth, 1),
            Carbon::create($currentYear, $currentMonth, 1)->endOfMonth(),
        ]);

                $reports = [];
                //dd($ors_show);
        foreach ($ors_show as $ors) {
        //$current_month_ors=new ORSHeader();
        $current_month_ors=$ors_this_month->where('ors_hdr_id',$ors->ors_hdr_id)->first();
        //dd($current_month_ors);
        $current_details=$current_month_ors->details;
        dd($current_details);
            foreach ($ors->details as $det) {
                  //dd($ors->details);
                $uacs_id = $det->uacs_id;
                $runningBalance=$ors->ors_type == 1 ? $det->amount : $det->running_balance;
                $report = AccountingController::generate_fieldReport( $det, $runningBalance,$current_details);

                $reports[] = $report;
                }
//dd($reports);
                }
                //dd($reports);
        return view('admin.accounting.field',compact('reports'));
    }
    public static function generate_fieldReport($det,$runningBalance,$current_details) {

        $report = new SaroDTO(
            $det->uacs ? $det->uacs->code : null,
            $det->allotment_class ? $det->allotment_class->description : null,

            $current_details->amount,
            $current_details->amount,
            $runningBalance,

            $det->allotment_class ? $det->allotment_class->description : null,
            $det->amount,
            $runningBalance
        );

        return $report;
    }
    public static function generate_cashreg_Report($ors, $det,$runningBalance) {

        $report = new ReportDTO(
            $ors->ors_date,
            $ors->disbursement ? $ors->disbursement->dv_no : null,
            $ors->disbursement ? $ors->disbursement->check_no : null,
            isset($ors->ors_no) ? $ors->ors_no : null,
            isset($ors->payee) && is_object($ors->payee) ? $ors->payee->name . '-' . $ors->particulars : null,
            $ors->ors_type == 1 ? $det->amount : null,
            $ors->ors_type == 2 ? $det->amount : null,
            $runningBalance,
            $det->uacs ? $det->uacs->description : null,
            $det->uacs ? $det->uacs->code : null
        );

        return $report;
    }
    public static function generateROReport($ors, $det, $runningBalance, $approdtl = null) {
        $report = new ReportDTO(
            $ors->ors_date,
            $ors->disbursement ? $ors->disbursement->dv_no : null,
            $ors->disbursement ? $ors->disbursement->check_no : null,
            isset($ors->ors_no) ? $ors->ors_no : null,
            isset($ors->payee) && is_object($ors->payee) ? $ors->payee->name . '-' . $ors->particulars : null,
            $ors->ors_type == 1 ? $det->amount : null,
            $ors->ors_type == 2 ? $det->amount : null,
            $runningBalance,
            $det->uacs ? $det->uacs->description : null,
            $det->uacs ? $det->uacs->code : null
        );

        return $report;
    }
    public function index__()
    {   $current=0;
        $total=0;
        $count=0;
        $ors_show=new ORSHeader();
        $ors_payments = ORSHeader::with('processed', 'details', 'details.uacs', 'details.pap','details.allotment_class', 'fundsource', 'payee', 'disbursement')
                ->where('ors_type', 2)
                ->whereHas('disbursement', function ($query) {
                $query->whereNotNull('dv_no');
                })
                // ->orderByDesc('ors_date')
                ->get();

        $ors_deposit = ORSHeader::with('processed', 'details', 'details.uacs', 'details.pap','details.allotment_class', 'fundsource', 'payee')
                    ->where('ors_type', 1)
                    // ->orderByAsc('ors_date')
                    ->get();
                    $ors_show = $ors_payments->concat($ors_deposit)->sortBy('ors_date');

        $reports = [];
//dd($ors_show);
        foreach ($ors_show as $ors) {
             $count++;
            foreach ($ors->details as $det) {
                //  dd($ors->details);
                $uacs_id = $det->uacs_id;

                $approsetup = ApproSetup::with('approdtls')
                ->where('pap_code', $det->pap_id)
                ->get();

                $total_count = ORSHeader::where('ors_type', 2)
                ->whereHas('disbursement', function ($query) {
                    $query->whereNotNull('dv_no');
                })
                ->whereHas('details', function ($query) use ($uacs_id) {
                    $query->where('uacs_id', $uacs_id);
                })
                ->count();
                foreach ($approsetup as $setup) {
                    if ($setup->relationLoaded('approdtls')) {
                        $filteredApprodtls = $setup->approdtls->filter(function ($approdtl) use ($det) {
                            return $approdtl->uacs_subobject_code == $det->uacs_id;
                        });


                        foreach ($filteredApprodtls as $approdtl) {
                            if ($ors->ors_type == 2) {
                                $uacscode = $approdtl->uacs_subobject_code;
                                if (!isset($runningBalances[$uacscode])) {
                                    // Initialize the running balance for this uacscode to allotment_received
                                    $runningBalances[$uacscode] = $approdtl->allotment_received;
                                }

                                // Calculate the running balance for the current record
                                $running = $runningBalances[$uacscode] - $det->amount;

                                // Update the running balance for the next iteration
                                $runningBalances[$uacscode] = $running;
                            } else {
                                $running = $det->amount;
                               // $current=+$running;
                            }

                            // // Check if this is the last record for the current uacscode
                            // if ($approdtl->uacs_subobject_code == $det->uacs_id && $ors->ors_type == 2) {
                            //     if ($total_count == 1 || $total_count == $count) {
                            //         // Use the original allotment_received value as running balance for the last record
                            //         $running = $approdtl->allotment_received;
                            //     }
                            // }
//KUN ANO NKA ASSIGN SA DTO AMO NA NA ITADLONG YA REGARDLESS KANG KUN ANO NGA VALUE ASSIGN MO KNA RIDYA
$report = new ReportDTO(
    $ors->ors_date,
    $ors->disbursement ? $ors->disbursement->dv_no : null,
    $ors->disbursement ?$ors->disbursement->check_no: null,
    isset($ors->ors_no)?$ors->ors_no:null,

    isset($ors->payee) && is_object($ors->payee) ? $ors->payee->name . '-' . $ors->particulars : null,
    $ors->ors_type==1?   $det->amount:null,
    $ors->ors_type==2?   $det->amount:null,
    // $det->amount,
    $running,
    // ($approdtl->uacs_subobject_code == $det->uacs_id &&   $ors->ors_type==2)?$approdtl->running_balance: $det->amount,
    $det->uacs?  $det->uacs->description:null,
    $det->uacs?  $det->uacs->code:null


);
                        }

                    }}

            $reports[] = $report;
            }



        }



        return view('admin.accounting.index',compact('reports'));//'orsheaders','total',
    }



    public function doctor_report()
    {
        return view('admin.accounting.doctor_report');
    }


}