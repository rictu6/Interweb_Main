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
    public function dvreceiving_list()
    {try {
        return view('admin.dvreceivings.dvreceiving_list');
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
    $user =  Auth::guard('admin')->user();

      $selectedOffice=ResponsibilityCenter::where('res_center_id', '=', $user->office_id)->get();

    $ors_list=ORSHeader::all();
    // dd(   $ors_list);
    return view('admin.dvreceivings.create', compact('ors_list','selectedOffice'));
}


function store (Request $request){
dd($request);
    $user_id =     Auth::guard('admin')->user()->emp_id;

    if($request->has('obli'))
    {
       // foreach($request['o_r_s'] as $ors)
       // {
             $dv =new DVReceiving;
             $orsNumbers = $request['obli'];
             //$existingDV = DVReceiving::whereIn('ors_no', $orsNumbers)->first();//omit, coz ors can be tag more than once
             //dd($orsNumbers);
            // if ($existingDV) {
                // return redirect()->back()->withErrors("One or more ORS numbers already attached to a DV")->withInput();
            //  }
            // else
            // {
                $dv->office_id= $request->office_id;
                $dv->dv_no=$request->dv_no;
                $dv->dv_type=$request->dv_type;
                //$dv->ors_hdr_id=implode(',', $request['obli']);
                $dv->payee_id= $request->payee_id;
                $dv->dv_date=  $request->dv_date;
                $dv->check_no= $request->check_no;
                $dv->generated_by= $user_id;
                $dv->save();
                foreach ($request['obli'] as $ors) {
                    $orshdr = ORSHeader::where('ors_no', $ors)->first();
                    $orshdr->dv_received_id = $dv->dv_received_id;
                    $orshdr->save();
                    //dd($orshdr);
                    //save dvobli here
                    //$group_test=User::where('emp_id',$role)->firstOrFail();

                    DVObli::firstOrCreate([
                    'dv_id'=>$dv['dv_received_id'],
                    'ors_no'=>$orshdr['ors_no'],
               ]);

                    //end sae dvobli here

                    // Update running balance whenever budget is allotted
                    foreach ($orshdr->details as $dtl) {
                        $approsetup = ApproSetup::with('approdtls')
                            ->where('pap_code', $dtl->pap_id)
                            ->get();
//dd($approsetup);
                        foreach ($approsetup as $setup) {
                            if ($setup->relationLoaded('approdtls')) {
                                $filteredApprodtls = $setup->approdtls->filter(function ($approdtl) use ($dtl) {
                                    return $approdtl->uacs_subobject_code == $dtl->uacs_id;
                                });
                                //dd($filteredApprodtls);
                                foreach ($filteredApprodtls as $approdtl) {
                                    // Update running balance here
                                    // $approdtl->running_balance =
                                    if ($approdtl->uacs_subobject_code == $dtl->uacs_id) {
                                        if ($approdtl->running_balance >= $dtl->amount) {
                                            $approdtl->running_balance -= $dtl->amount;


                                            $approdtl->save();
                                        } else {
                                            session()->flash('fail',__('Not enough balance.'));
                                            //throw new Exception("Not enough balance.");
                                        }
                                    }
                                }
                            }
                        }
                    }
                }


            //}
        //}
    }

// dd($request);


session()->flash('success',__('New DV has been successfully added to database'));
return redirect()->route('admin.dvreceiving_list');


}


}