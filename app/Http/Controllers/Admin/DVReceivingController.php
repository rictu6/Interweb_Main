<?php

namespace App\Http\Controllers\Admin;
use App\Models\ApproSetup;
use App\Models\DVObli;
use App\Models\DVReceiving;
use App\Models\Employee;

use App\Models\PAP;
use App\Models\UACS;
use App\Models\Payee;

use App\Models\ORSHeader;
use App\Models\BudgetType;
use App\Models\FundSource;
use App\Models\ORSDetails;
use App\Models\FundCluster;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\AllotmentClass;
use App\Models\ResponsibilityCenter;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Editor\Fields\Date;

class DVReceivingController extends \Illuminate\Routing\Controller
{

    public function __construct()
    {

        $this->middleware('can:view_dvreceive',     ['only' => ['index', 'show','ajax','dvreceiving_list']]);
        $this->middleware('can:create_dvreceive',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_dvreceive',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_dvreceive',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return view('admin.dvreceivings.index');
        } catch (\Exception $th) {

            dd($th->getMessage());
        }


    }
    // public function dvreceiving_list()
    // {try {
    //     return view('admin.dvreceivings.dvreceiving_list');
    // } catch (\Exception $th) {
    //     dd($th->getMessage());
    // }
    // }



    /**
    * get users datatable
    *
    * @access public
    * @var  @Request $request
   */
  public function ajax(Request $request)
    {
    try {
        //display by prov here
        $current_user = Auth::guard('admin')->user();
        $current_user->refresh(); // Refresh the user data
        $current_user->load('province');

    if ($current_user->province == null) {// || $current_user->province->prov_code == null
        $model = DVReceiving::query()->
        with('processed', 'payee','obli');// Include the 'details' relationship
    } else {
        $createdprovinceByList = User::where('prov_code', $current_user->province->prov_code)
        ->select('emp_id')
        ->get()
        ->pluck('emp_id')
        ->toArray();

    $model = DVReceiving::whereIn('generated_by', $createdprovinceByList)
        ->    with('processed', 'payee','obli');

    }
        //end here pro
    if ($request['filter_year'] != null) {
        $year = $request['filter_year'];
        $model->whereRaw("YEAR(dv_date) = ?", [$year]);
    }

    if ($request['filter_month'] != null) {
        $month = $request['filter_month'];
        $model->where('dv_date', 'LIKE', "%-$month-%");
    }

    if($request['filter_dvno']!=null) {
    $model->where('dv_no',$request['filter_dvno']);
    }



        return DataTables::eloquent($model)
        ->addColumn('obli',function($dv){
                return view('admin.dvreceivings._ors',compact('dv'));
            })

        ->toJson();
    } catch (\Exception $th) {
        dd($th->getMessage());
    }
}



//     public function ajax(Request $request)
// {
//     try {
//         $model = DVReceiving::query()  ->
//        with('processed','payee','o_r_s');
//          //->get();// Include the 'details' relationship
//         // $model = $query->get();


//          foreach ($model as $dv) {
//             $orsHdrIds = explode(',', $dv->ors_hdr_id);
//             if (count($orsHdrIds) > 0) {
//                 foreach ($orsHdrIds as $id) {
//                     $ors=ORSHeader::where('ors_hdr_id',$id)->first();
//                     if ($ors) {
//                         $dv->o_r_s[] = $ors;
//                         //$dv->ors_hdr_id=+$ors->ors_no;
// $dv->save();
//                     }
//                 }

//             }
//         }

//         return DataTables::eloquent($model)

//             // ->addColumn('action',function($dv){
//             //     return view('admin.orsheaders._action',compact('ors'));
//             // })
//             ->toJson();

//     } catch (\Exception $th) {
//         dd($th->getMessage());
//     }
// }

public function create()
{
    $current_user = Auth::guard('admin')->user();
    $current_user->refresh(); // Refresh the user data
    $current_user->load('province');
    $ors_list = [];
        if ($current_user->province == null) {// || $current_user->province->prov_code == null
            $ors_list = ORSHeader::select('ors_no')
            ->distinct()
            ->with('processed', 'details', 'fundsource', 'payee')
            ->get();
        
        
        } else {
            $createdprovinceByList = User::where('prov_code', $current_user->province->prov_code)
            ->select('emp_id')
            ->get()
            ->pluck('emp_id')
            ->toArray();

            $ors_list = ORSHeader::whereIn('created_by', $createdprovinceByList)
            ->select('ors_no')
            ->distinct()
            ->get();
        
        }

      $selectedOffice=ResponsibilityCenter::where('res_center_id', '=', $current_user->office_id)->get();
    //   $ors_list = ORSHeader::select('ors_no')
    //   ->distinct()
    //   ->get();

    
    // dd(   $ors_list);
    return view('admin.dvreceivings.create', compact('ors_list','selectedOffice'));
}


function store (Request $request){
//dd($request);
    $user_id =     Auth::guard('admin')->user()->emp_id;
    $currentDate = Carbon::now()->format('Y-m-d');

    if($request->has('obli'))
    {
             $dv =new DVReceiving;
                $dv->office_id= $request->office_id;
                $dv->dv_no=$request->dv_no;
                $dv->dv_type=$request->dv_type;
                $dv->payee_id= $request->payee_id;
                $dv->dv_date=  $request->dv_date;
                $dv->check_no= $request->check_no;
                $dv->generated_by= $user_id;
                $dv->save();

                foreach ($request['obli'] as $ors) {
                    DVObli::firstOrCreate([
                    'dv_id'=>$dv['dv_received_id'],
                    'ors_no'=>$ors,
                    ]);
                    $orshdr = ORSHeader::with('details')->where('ors_no', $ors)->first();
                    //get to assigm sa new ORS which the other properties ecept for 
                    //uacs_id and amount and particulars is in the $request['details']
                    $newOrs = new ORSHeader();
                    $newOrs ->dv_received_id = $dv->dv_received_id;
                    $newOrs ->ors_no = $ors;//$orshdr['ors_no'];
                    $newOrs ->office_id = $orshdr->office_id;
                    $newOrs ->ors_type = 2;
                    $newOrs ->particulars = $request->particulars;
                    $newOrs ->ors_date= $currentDate; 
                    $newOrs ->budget_type= $orshdr->budget_type;
                    $newOrs ->fund_cluster_id= $orshdr->fund_cluster_id;
                    $newOrs ->fund_source_id= $orshdr->fund_source_id;
                    $newOrs ->uacs_subclass_id= $orshdr->uacs_subclass_id;
                    $newOrs ->payee_id= $request->payee_id;
                    $newOrs ->address= $orshdr->address;
                    $newOrs ->created_by= $user_id;
                    $newOrs ->date_received= $orshdr->date_received;
                    $newOrs ->save();

                    foreach($request['details'] as $det){
                        //new_orsdetail= new ORSDetails();
                //dd($orshdr);
                  
                        foreach ($orshdr->details as $dtl) {//this is to update the running balance of deposited ors by uacs
                            if ($orshdr->ors_type==1 && $dtl['uacs_id']==$det['uacs_id']){
                                $runningbal=$dtl['running_balance']-$det['amount'];
                                $dtl->update(['running_balance' => $runningbal]);
                                //$orshdr->details->save();
                            }
                            // if ($ors->ors_type==2 && $dtl->uacs_id==$det->uacs_id){//this is to update the newly create ors with type 2
                            //     $runningbal=$dtl['running_balance']-$det['amount'];
                            // }
                           if($dtl['uacs_id']==$det['uacs_id']){
                              ORSDetails::create([
                                'ors_id' => $newOrs->ors_hdr_id,
                                'allotment_class_id' => $dtl['allotment_class_id'],
                                'responsibility_center' => $dtl['responsibility_center'],
                                'pap_id' => $dtl['pap_id'],
                                'uacs_id' => $det['uacs_id'],
                                'sub_allotment_id' => ($dtl['allotment_class_id'] == 2) ? $dtl['sub_allotment_id'] : ' ',
                                'amount' => $det['amount'],
                                'running_balance' => $runningbal,
                            ]);
                           }
                          
                        }
                    }
                }
    }

// dd($request);


session()->flash('success',__('New DV has been successfully added to database'));
return redirect()->route('admin.dvreceiving_list');


}


}