<?php

namespace App\Http\Controllers\Admin;
use App\Models\PAP;
use App\Models\UACS;

use App\Models\Payee;
use App\Models\Employee;
use App\Models\ORSHeader;
use App\Models\ApproSetup;

use App\Models\BudgetType;
use App\Models\FundSource;
use App\Models\ORSDetails;
use App\Models\FundCluster;
use App\Models\SubAllotment;
use Illuminate\Http\Request;
use App\Models\AllotmentClass;
use App\Models\ApproSetupDetail;
use App\Models\ResponsibilityCenter;
use Illuminate\Support\Facades\Auth;

class SubAllotmentController extends \Illuminate\Routing\Controller
{

    public function __construct()
    {

        $this->middleware('can:view_suballotment',     ['only' => ['index', 'show','ajax','suballotment_list']]);
        $this->middleware('can:create_suballotment',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_suballotment',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_suballotment',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $uacs=UACS::all();//for next uacs ke hindi ya ma load
            return view('admin.suballotments.index',compact('uacs'));
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
    $payees=Payee::all();
        $responsibilitycenters=ResponsibilityCenter::all();
        $allotments=AllotmentClass::all();
        $fundclusters=FundCluster::all();
        $budgettypes=BudgetType::all();
        $fundsources=FundSource::all();
        $paps=PAP::all();
        $uacs=UACS::all();

    return view('admin.orsheaders.create',compact('payees','responsibilitycenters',
    'allotments','fundclusters','budgettypes','fundsources','paps','uacs'));
}

function store(Request $request){

    //   dd($request);

     $user =     Auth::guard('admin')->user()->emp_id;// +' '+ Auth::guard('admin')->user()->last_name;

$appro=new ApproSetup();

$appro->budget_year=$request->budget_year;
$appro->month=$request->month;
$appro->fund_source_id=$request->fund_source_id;
$appro->pap_code=$request->pap_id;
$appro->allotment_class_id=2;
$appro->sub_allotment_no=$request->sub_allotment_no;
$appro->remarks=$request->remarks;

$appro->budget_type=$request->budget_type;
$appro->processedby=  $user;


     foreach ($request->approdtls as $detail) {
        if ($appro->save()) {
           // dd($request);
            ApproSetupDetail::create([
                'appro_setup_id' => $appro['appro_setup_id'],
                'uacs_subobject_code' => $detail['uacs_subobject_code'],
                'allotment_received' => $detail['allotment_received'],
            ]);
        }
     }
// if ($appro->save()) {
//     $appro->approdtls()->create([
//         'uacs_subobject_code' => $request->uacs_subobject_code,
//         'allotment_received' => $request->allotment_received,
//     ]);
   return back()->with('success', 'New Sub-Allotment has been successfully added to the database');
// } else {
//     return back()->with('fail', 'Please try again');
// }

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
