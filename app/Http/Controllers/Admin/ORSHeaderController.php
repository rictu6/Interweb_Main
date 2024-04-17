<?php

namespace App\Http\Controllers\Admin;
use App\Models\Employee;

use App\Models\PAP;
use App\Models\UACS;
use App\Models\Payee;

use App\Models\ORSHeader;
use App\Models\BudgetType;
use App\Models\FundSource;
use App\Models\ORSDetails;
use App\Models\FundCluster;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\AllotmentClass;
use App\Models\ResponsibilityCenter;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Editor\Fields\Date;

class ORSHeaderController extends \Illuminate\Routing\Controller
{

    public function __construct()
    {

        $this->middleware('can:view_orsheader',     ['only' => ['index', 'show','ajax','orsheader_list']]);
        $this->middleware('can:create_orsheader',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_orsheader',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_orsheader',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {



            return view('admin.orsheaders.index');
        } catch (\Exception $th) {

            dd($th->getMessage());
        }


    }
    public function orsheader_list()
    {try {
        return view('admin.orsheaders.orsheader_list');
    } catch (\Exception $th) {
        dd($th->getMessage());
    }



    }
    /**
    * get users datatable
    *
    * @access public
    * @var  @Request $request
    */


    public function ajax(Request $request)
{
    try {
        $model = ORSHeader::query();




        return DataTables::eloquent($model)

            ->addColumn('action',function($fta){
                return view('admin.ftas._action',compact('fta'));
            })
            ->toJson();

    } catch (\Exception $th) {
        dd($th->getMessage());
    }
}

public function create()
{
//     $payee=Payee::all();
//         $responsibilitycenters=ResponsibilityCenter::all();
//         $allotments=AllotmentClass::all();
//         $fundclusters=FundCluster::all();
//         $budgettypes=BudgetType::all();
        //$fundsources=FundSource::all();
         $paps=PAP::all();
//         $uacs=UACS::all();
//         $orsdtl = ORSDetails::with(['responsibilitycenters', 'allotments', 'fundclusters', 'budgettypes', 'fundsources', 'paps', 'uacs'])->get();
// $ors=ORSHeader::with(['orsdtl','payee']);
// dd($orsdtl);


    return view('admin.orsheaders.create', compact('paps'));
}
function store (Request $request){
// dd ($request);
$ors =new ORSHeader;
$ors_last_no=ORSHeader::latest()->first();
if (empty($ors_last_no)) {
    $ors_last_no = new ORSHeader();
    $ors_last_no->ors_hdr_id = 1;
} else {
    $ors_last_no->ors_hdr_id += 1;
}
$user_id =     Auth::guard('admin')->user()->emp_id;
 $ors->office_id= $request->office_id;
//  $ors->type= $request->type;
//  $ors->ors_id= $request->ors_id;
$currentDate = Carbon::now()->format('Y-n');
$fund_source_code=FundSource::where('fund_source_id', '=', $request->fund_source_id)->first();


 $ors->ors_date= $currentDate;
 $ors->particulars= $request->particulars;
 $ors->budget_type= $request->budget_type;
 $ors->fund_cluster_id= $request->fund_cluster_id;
 $ors->fund_source_id= $request->fund_source_id;
 $ors->uacs_subclass_id= $request->uacs_subclass_id;
 $ors->payee= $request->payee;
 $ors->office_id= $request->office_id;
 $ors->address= $request->address;
//  $ors->status_code= $request->status_code;
 $ors->created_by= $user_id;
 $ors->date_created= $currentDate;
 $ors->date_received= $request->date_received;
//  $ors->dv_received_id= $request->dv_received_id;
//  $ors->cms_submission_history_id= $request->cms_submission_history_id;
 $ors->payee= $request->payee;
//  $ors->dv_trust_receipts_id= $request->dv_trust_receipts_id;
$ors_number=$request->uacs_subclass_id."-".$fund_source_code->code."-".$currentDate."-"."000".$ors_last_no->ors_hdr_id;
$ors->ors_no= $ors_number;
// dd($ors_number);
//dd($request->ORSDetails);
foreach ($request->ORSDetails as $detail) {
    if ($ors->save()) {

        ORSDetails::create([
            'ors_id' => $ors->ors_hdr_id,
            'allotment_class_id' => $detail['allotment_class_id'],
            'responsibility_center' => $detail['responsibility_center'],
            'pap_id' => $detail['pap_id'],
            'uacs_id' => $detail['uacs_id'],
            'sub_allotment_id' => $detail['sub_allotment_id'],
            'amount' => $detail['amount'],
        ]);
    }
 }

 //$save=$ors->save();
 //if($save){
     return back()->with('success', 'New ORS has been successfully added to database');
 ///}else{
   //  return back()->with('fail', 'Please try again');
 //}
}
    function saveors(Request $request){

        dd($request->all());
        $request->validate([

            'office_id'=>'required',
            'type'=>'required',
            'ors_id'=>'required',
            'ors_no'=>'required',
            'ors_date'=>['required','date'],
            'particulars'=>'required',
            'budget_type'=>'required',
            'fund_cluster'=>'required',
            'fund_source'=>'required',
            'uacs_subclass_id'=>'required',
            'payee'=>'required',
            'office'=>'required',
            'address'=>'required',
            'status_code'=>'required',
            'created_by'=>'required',
            'date_created'=>['required','date'],
            'date_received'=>['required','date'],
            'dv_received_id'=>'required',
            'cms_submission_history_id'=>'required',
            'payee_id'=>'required',
            'dv_trust_receipts_id'=>'required'
        ]);
        //Insert

        $ors =new ORSHeader;
       //
        $ors->office_id= $request->office_id;
        $ors->type= $request->type;
        $ors->ors_id= $request->ors_id;
        $ors->ors_no= '000999999';//$request->ors_no;
        $ors->ors_date= $request->ors_date;
        $ors->particulars= $request->particulars;
        $ors->budget_type= $request->budget_type;
        $ors->fund_cluster= $request->fund_cluster;
        $ors->fund_source= $request->fund_source;
        $ors->uacs_subclass_id= $request->uacs_subclass_id;
        $ors->payee= $request->payee;
        $ors->office= $request->office;
        $ors->address= $request->address;
        $ors->status_code= $request->status_code;
        $ors->created_by= $request->created_by;
        $ors->date_created= $request->date_created;
        $ors->date_received= $request->date_received;
        $ors->dv_received_id= $request->dv_received_id;
        $ors->cms_submission_history_id= $request->cms_submission_history_id;
        $ors->payee_id= $request->payee_id;
        $ors->dv_trust_receipts_id= $request->dv_trust_receipts_id;

        $ors=ORSHeader::findOrFail($request->ors_id);
        $ors->orsdetails()->create([
            'charge_to'=>$request->charge_to,
            'responsibility_center'=>$request->responsibility_center,
            'pap_id'=>$request->pap_id,
            'uacs_id'=> $request->uacs_id,
            'sub_allotment_id'=>$request->sub_allotment_id,
            'subsidiary_ledger'=>$request->subsidiary_ledger,
            'amount'=>$request->amount,
        ]);
        //$orsdtl=new ORSDetails;
        // $orsdtl->charge_to=$request->charge_to;
        // $orsdtl->responsibility_center=$request->responsibility_center;
        // $orsdtl->pap_id=$request->pap_id;
        // $orsdtl->uacs_id=$request->uacs_id;
        // $orsdtl->sub_allotment_id=$request->sub_allotment_id;
        // $orsdtl->subsidiary_ledger=$request->subsidiary_ledger;
        // $orsdtl->amount=$request->amount;



        $save=$ors->save();
        if($save){
            return back()->with('success', 'New ORS has been successfully added to database');
        }else{
            return back()->with('fail', 'Please try again');
        }
    }

    function orsentry(){
        $data=['LoggedUserInfo'=>Employee::where('emp_id','=',session('LoggedUser'))->first()];
        //dd(data);
        $payees=Payee::all();
        $responsibilitycenters=ResponsibilityCenter::all();
        $allotments=AllotmentClass::all();
        $fundclusters=FundCluster::all();
        $budgettypes=BudgetType::all();
        $fundsources=FundSource::all();
        $paps=PAP::all();
        $uacs=UACS::all();

        return view('budget.orsentry',$data,compact('payees','responsibilitycenters',
        'allotments','fundclusters','budgettypes','fundsources','paps','uacs'));

    }

}