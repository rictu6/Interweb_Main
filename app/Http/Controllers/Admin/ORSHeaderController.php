<?php

namespace App\Http\Controllers\Admin;
use App\Models\ApproSetup;

use App\Models\ApproSetupDetail;
use App\Models\Employee;

use App\Models\PAP;
use App\Models\SubAllotment;
use App\Models\UACS;
use App\Models\Payee;

use App\Models\ORSHeader;
use App\Models\BudgetType;
use App\Models\FundSource;
use App\Models\ORSDetails;
use App\Models\FundCluster;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use App\Models\AllotmentClass;
use App\Models\ResponsibilityCenter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Exceptions\Exception;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Editor\Fields\Date;

class ORSHeaderController extends \Illuminate\Routing\Controller
{

    public function __construct()
    {

        $this->middleware('can:view_orsheader',     ['only' => ['index','ajax','orsheader_list']]);
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
        $model = ORSHeader::query()
        ->with('processed','details','fundsource','payee');// Include the 'details' relationship
        return DataTables::eloquent($model)

            ->addColumn('action',function($ors){
                return view('admin.orsheaders._action',compact('ors'));
            })
            ->toJson();

    } catch (\Exception $th) {
        dd($th->getMessage());
    }
}

public function create()
{
         $rescenter=ResponsibilityCenter::all();
         $paps=PAP::all();
         $ors= new ORSHeader();
    return view('admin.orsheaders.create', compact('paps','rescenter','ors'));
}
function store (Request $request){
  //dd ($request);

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
$ors->ors_type = $request->input('ors_type') == '1' ? '1' : '2';

//  $ors->ors_id= $request->ors_id;
// $currentDate = Carbon::now()->format('Y-n');
$currentDate = Carbon::now()->format('Y-m-d');

$fund_source_code=FundSource::where('fund_source_id', '=', $request->fund_source_id)->first();


 $ors->ors_date= $currentDate;
 $ors->particulars= $request->particulars;
 $ors->budget_type= $request->budget_type;
 $ors->fund_cluster_id= $request->fund_cluster_id;
 $ors->fund_source_id= $request->fund_source_id;
 $ors->uacs_subclass_id= $request->uacs_subclass_id;
 $ors->payee_id= $request->payee_id;
 $ors->office_id= $request->office_id;
 $ors->address= $request->address;
//  $ors->status_code= $request->status_code;
 $ors->created_by= $user_id;

 $ors->date_received= $request->date_received;

//  $ors->cms_submission_history_id= $request->cms_submission_history_id;

//  $ors->dv_trust_receipts_id= $request->dv_trust_receipts_id;
$ors_number=$request->uacs_subclass_id."-".$fund_source_code->code."-".$currentDate."-"."000".$ors_last_no->ors_hdr_id;
$ors->ors_no= $ors_number;
// dd($ors_number);
//dd($request->ORSDetails);
DB::beginTransaction();
if ($ors->save()) {



try{
foreach ($request->details as $detail) {


        $max_amount=0;
            if($detail['allotment_class_id'] == 2){
            $sub=ApproSetup::where('sub_allotment_no',$detail['sub_allotment_id'])->first();
            $sub_amount = ApproSetupDetail::where('appro_setup_id', $sub->appro_setup_id)
            ->where('uacs_subobject_code', $detail['uacs_id'])
            // ->pluck('allotment_received')//change to running balnce
            ->pluck('running_balance')
            ->first();
            $max_amount= $sub_amount;
            }

            else{
            $sub=ApproSetup::where('pap_code',$detail['pap_id'])->first();
            $sub_amount = ApproSetupDetail::where('appro_setup_id', $sub->appro_setup_id)
            ->where('uacs_subobject_code', $detail['uacs_id'])
            // ->pluck('allotment_received')//change to running balnce
            ->pluck('running_balance')
            ->first();
            $max_amount= $sub_amount;
            }

        if ($detail['amount'] <=  $max_amount) {
            ORSDetails::create([
                'ors_id' => $ors->ors_hdr_id,
                'allotment_class_id' => $detail['allotment_class_id'],
                'responsibility_center' => $detail['responsibility_center'],
                'pap_id' => $detail['pap_id'],
                'uacs_id' => $detail['uacs_id'],
                'sub_allotment_id' => ($detail['allotment_class_id'] == 2) ? $detail['sub_allotment_id'] : ' ',
                'amount' => $detail['amount'],
            ]);

        } else {

            DB::rollback();
             //session()->flash('fail',__('Amount must be less than or equal to ' . $max_amount));
            $errorMsg = __('Amount must be less than or equal to ' . $max_amount);
            //return redirect()->back()->withErrors(['error' => $errorMsg]);


            //return response()->json(['errors' => $errorMsg], 422);
            return response()->json(['message' => $errorMsg], 422);
        }

            DB::commit(); // Commit the transaction only if there were no errors
            // session()->flash('success',__('New ORS has been successfully added to the database'));
            // return redirect()->route('admin.orsheader_list');


 }
 session()->flash('toast_message', __('New ORS has been successfully added to the database'));
 return response()->json(['redirect_to' => route('admin.orsheader_list')]);
} catch (\Exception $e) {
    // session()->flash('fail',__($e));
    DB::rollback(); // Rollback the transaction on any exception
    //return response()->json(['message' => 'Failed to save ORS. Please try again.'], 500);
    }
} else {
    // Handle the case where ORSHeader saving failed
   // return response()->json(['message' => 'Failed to save ORS. Please try again.'], 500);
   session()->flash('fail',__('Failed to save ORS. Please try again.'));
}
}


}
