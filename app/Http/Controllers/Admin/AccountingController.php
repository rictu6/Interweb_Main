<?php

namespace App\Http\Controllers\Admin;

use App\Models\ApproSetup;
use App\Models\ReportDTO;
use App\Http\Controllers\Controller;
use App\Models\ORSHeader;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Expense;
use App\Models\Doctor;
use App\Models\Test;
use App\Models\Culture;

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
                $report = AccountingController::generateReport($ors, $det, $runningBalance,null);
            } elseif ($ors->ors_type == 2) {
                // For ors_type 2, subtract the amount from the running balance
                $runningBalance -= $det->amount;
                $report = AccountingController::generateReport($ors, $det, $runningBalance,null);
            }

            }
            $reports[] = $report;
            }


        return view('admin.accounting.index',compact('reports'));
    }
    public static function generateReport($ors, $det, $runningBalance, $approdtl = null) {
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
    public function generate_report(Request $request)
    {
        $request->validate([
            'date'=>'required'
        ]);

        //format date
        $date=explode('-',$request['date']);
        $from=date('Y-m-d',strtotime($date[0]));
        $to=date('Y-m-d 23:59:59',strtotime($date[1]));

        //select groups of date between
        //$groups=($from==$to)?Group::with('patient','doctor')->whereDate('created_at',$from):Group::with('patient','doctor')->whereBetween('created_at',[$from,$to]);
$orsheaders=ORSHeader::with('processed','details','fundsource','payee')->get();

        // $groups=$groups->get();

        //make accounting
        $total=0; $paid=0; $due=0;

        // foreach($orsheaders->details as $dtl)
        // {
        //     // $total+=$dtl['amount'];
        //     // $paid+=$group['paid'];
        //     // $due+=$group['due'];
        // }

        //expenses
        $expenses=($from==$to)?Expense::with('category')->whereDate('date',$from)->get():Expense::with('category')->whereBetween('date',[$from,$to])->get();

        $total_expenses=0;

        foreach($expenses as $expense)
        {
            $total_expenses+=$expense['amount'];
        }

        //profit
        $profit=$total-$total_expenses;

        //old date
        $input_date=$request['date'];

        //generate pdf
        // $show_expenses=$request['show_expenses'];
        // $show_profit=$request['show_profit'];
        // $show_groups=$request['show_groups'];

        $pdf=generate_pdf(compact(
            'orsheaders',
            'total'

        ),3);

        return view('admin.accounting.index',compact(
'orsheaders',
            'total',

            'pdf'
        ));
    }
    /**
     * Generate accounting report
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generate_reports(Request $request)
    {
        $request->validate([
            'date'=>'required'
        ]);

        //format date
        $date=explode('-',$request['date']);
        $from=date('Y-m-d',strtotime($date[0]));
        $to=date('Y-m-d 23:59:59',strtotime($date[1]));

        //select groups of date between
        $groups=($from==$to)?Group::with('patient','doctor')->whereDate('created_at',$from):Group::with('patient','doctor')->whereBetween('created_at',[$from,$to]);

        //filter doctors
        $doctors=[];
        if($request->has('doctors'))
        {
            $groups->whereIn('doctor_id',$request['doctors']);

            $doctors=Doctor::whereIn('id',$request['doctors'])->get();

        }

        //filter tests
        $tests=[];
        if($request->has('tests'))
        {
            $groups->whereHas('tests',function($q)use($request){
               return $q->whereIn('test_id',$request['tests']);
            });

            $tests=Test::whereIn('id',$request['tests'])->get();
        }

        //filter cultures
        $cultures=[];
        if($request->has('cultures'))
        {
            $groups->whereHas('cultures',function($q)use($request){
                return $q->whereIn('culture_id',$request['cultures']);
            });

            $cultures=Culture::whereIn('id',$request['cultures'])->get();
        }

        $groups=$groups->get();

        //make accounting
        $total=0; $paid=0; $due=0;

        foreach($groups as $group)
        {
            $total+=$group['total'];
            $paid+=$group['paid'];
            $due+=$group['due'];
        }

        //expenses
        $expenses=($from==$to)?Expense::with('category')->whereDate('date',$from)->get():Expense::with('category')->whereBetween('date',[$from,$to])->get();

        $total_expenses=0;

        foreach($expenses as $expense)
        {
            $total_expenses+=$expense['amount'];
        }

        //profit
        $profit=$total-$total_expenses;

        //old date
        $input_date=$request['date'];

        //generate pdf
        $show_expenses=$request['show_expenses'];
        $show_profit=$request['show_profit'];
        $show_groups=$request['show_groups'];

        $pdf=generate_pdf(compact(
            'from',
            'to',
            'tests',
            'cultures',
            'doctors',
            'input_date',
            'groups',
            'expenses',
            'total',
            'paid',
            'due',
            'total_expenses',
            'profit',
            'show_groups',
            'show_expenses',
            'show_profit'
        ),3);

        return view('admin.accounting.index',compact(
            'from',
            'to',
            'tests',
            'cultures',
            'doctors',
            'input_date',
            'groups',
            'expenses',
            'total',
            'paid',
            'due',
            'total_expenses',
            'profit',
            'pdf'
        ));
    }


    public function doctor_report()
    {
        return view('admin.accounting.doctor_report');
    }

    public function generate_doctor_report(Request $request)
    {
        $request->validate([
            'date'=>'required',
            'doctor_id'=>'required'
        ]);

        //format date
        $date=explode('-',$request['date']);
        $from=date('Y-m-d',strtotime($date[0]));
        $to=date('Y-m-d 23:59:59',strtotime($date[1]));

        //select groups of date between
        $groups=($from==$to)?Group::with('patient','doctor')->whereDate('created_at',$from):Group::with('patient','doctor')->whereBetween('created_at',[$from,$to]);

        //filter doctors
        if($request->has('doctor_id'))
        {
            $groups->where('doctor_id',$request['doctor_id']);

            $doctor=Doctor::find($request['doctor_id']);
        }

        $groups=$groups->get();

        //make accounting
        $total=0; $paid=0; $due=0;

        foreach($groups as $group)
        {
            $total+=$group['doctor_commission'];
        }

        //payments
        $payments=($from==$to)?Expense::with('category')->whereDate('date',$from)->get():Expense::with('category')->whereBetween('date',[$from,$to])->get();

        foreach($payments as $payment)
        {
            $paid+=$payment['amount'];
        }

        $due=$total-$paid;

        //old date
        $input_date=$request['date'];

        //generate pdf
        $show_groups=$request['show_groups'];
        $show_payments=$request['show_payments'];

        $pdf=generate_pdf(compact(
            'from',
            'to',
            'doctor',
            'input_date',
            'groups',
            'payments',
            'total',
            'paid',
            'due',
            'show_groups',
            'show_payments',
        ),4);

        return view('admin.accounting.doctor_report',compact(
            'from',
            'to',
            'doctor',
            'input_date',
            'groups',
            'payments',
            'total',
            'paid',
            'due',
            'pdf'
        ));
    }
}
