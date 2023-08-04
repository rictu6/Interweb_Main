<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateUpdateFTARequest;
use App\Http\Requests\Admin\UpdateFTARequest;
use view;
use DataTables;
use Carbon\Carbon;
use App\Models\FTA;
use App\Models\LCE;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateFTARequest;
use App\Http\Requests\Admin\UpdateUserRequest;

class FTAsController extends Controller
{

    /**
     * assign roles
     */
    public function __construct()
    {
       // $this->middleware('can:view_fta_list',     ['only' => ['fta_list']]);
        $this->middleware('can:view_fta',     ['only' => ['index', 'show','ajax','fta_list']]);
        $this->middleware('can:create_fta',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_fta',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_fta',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
        //     $ftas=FTA::all();
        //     $fta_count_ongoing=0;
        //     $fta_count_done =0;
        // foreach ($ftas as $fta) {
        //     if (strtotime($fta['datefrom']) <= time() && strtotime($fta['dateto']) >= strtotime('today')) {
        //         $fta_count_ongoing+= 1;
        //     } else {
        //         $fta_count_done+= 1;
        //     }
        //     $fta->save();
        // }
        $fta_count_ongoing = FTA::query()
        ->where(function ($query) {
            $query->whereRaw("STR_TO_DATE(datefrom, '%d-%m-%Y') <= NOW()")
                ->whereRaw("STR_TO_DATE(dateto, '%d-%m-%Y') >= DATE(NOW())");
        })
        ->count();

    $fta_count_done = FTA::query()
        ->where(function ($query) {
            $query->whereRaw("STR_TO_DATE(datefrom, '%d-%m-%Y') > NOW()")
                ->orWhereRaw("STR_TO_DATE(dateto, '%d-%m-%Y') < DATE(NOW())");
        })
        ->count();





//dd($fta_count_ongoing);

            return view('admin.ftas.index',compact('fta_count_ongoing','fta_count_done'));
        } catch (\Exception $th) {

            dd($th->getMessage());
        }


    }
    public function fta_list()
    {try {
        return view('admin.ftas.fta_list');
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
        $model = FTA::query()->with('local_chief_exec.province','local_chief_exec.muncit');

        // Fetch the result set from the database
        $ftas = $model->get();

        foreach ($ftas as $fta) {
            if (strtotime($fta['datefrom']) <= time() && strtotime($fta['dateto']) >= strtotime('today')) {
                $fta->status = 'ongoing';
            } else {
                $fta->status = 'done';
            }
            $fta->save();
        }

        if($request['filter_leave']!=null) {
            $model->where('leavetype',$request['filter_leave']);
        }
        if($request['filter_destination']!=null) {
            $model->where('destination',$request['filter_destination']);
        }
        if($request['filter_status']!=null) {
            $model->where('status',$request['filter_status']);
        }

        if ($request->has('filter_date')) {
            $dateRange = explode('-', $request->input('filter_date'));
            $startDate = date('Y-m-d', strtotime($dateRange[0]));
            $endDate = date('Y-m-d', strtotime($dateRange[1]));

            $model->where(function ($query) use ($startDate, $endDate) {
                $query->where(function ($q) use ($startDate, $endDate) {
                    $q->whereBetween(DB::raw("STR_TO_DATE(datefrom, '%d-%m-%Y')"), [$startDate, $endDate])
                      ->orWhereBetween(DB::raw("STR_TO_DATE(dateto, '%d-%m-%Y')"), [$startDate, $endDate]);
                });
            });
        }



        return DataTables::eloquent($model)
            ->editColumn('status',function($fta){
                return view('admin.ftas._status',compact('fta'));
            })
            ->editColumn('frequency_of_travel',function($fta){
                return view('admin.ftas._frequency_of_travel',compact('fta'));
            })
            ->addColumn('action',function($fta){
                return view('admin.ftas._action',compact('fta'));
            })
            ->toJson();

    } catch (\Exception $th) {
        dd($th->getMessage());
    }
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = FTA::with('local_chief_exec.province','local_chief_exec.muncit')->get();
    //     foreach ($model as $fta) { working
    //         $fta->remarks = $model->where('lce_id','=',$fta->lce_id)->count();
    //        //$model->push($fta);
    //     }
    //   dd($model);
        return view('admin.ftas.create');//,compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUpdateFTARequest $request)
    {
        //dd($request);
        try {
        $fta=new FTA;
        $fta->lce_id=$request->lce_id;

        $fta->leavetype=$request->leavetype;
        $fta->destination=$request->destination;
        $fta->exact_destination=$request->exact_destination;
        //$datefrom=Carbon::createFromFormat('m/d/Y', $request->datefrom)->format('Y-m-d');
        $fta->datefrom = $request->datefrom;//$request->datefrom;//Carbon::createFromFormat('d/m/Y', $request->datefrom)->format('Y-m-d');//Carbon::parse($request->datefrom)->format('Y-m-d');
        $fta->dateto=$request->dateto;
        $fta->remarks=$request->remarks;
        $fta->deleted_at=null;
        //dd($fta);
        $fta->save();



        session()->flash('success',__('FTA created successfully'));

        return redirect()->route('admin.fta_list');
        } catch (\Exception $th) {
            dd($th->getMessage());
        }
        //dd($request);
        //create new user

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
           // Portfolio::with('previews')->find($id);
           // FTA::with('LCE.Province','LCE.Muncit')->get();
            $fta=FTA::with('local_chief_exec.province','local_chief_exec.muncit')->find($id);
           // dd($fta);
            return view('admin.ftas.edit',compact('fta'));
    } catch (\Exception $th) {
        dd($th->getMessage()) ;
    }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUpdateFTARequest $request, $id)
    {
        $fta=FTA::findOrFail($id);
        $fta->update($request->except('_token','_method'));
//dd($fta);
        session()->flash('success','FTA updated successfully');
        return redirect()->route('admin.fta_list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fta=FTA::findOrFail($id);


        //delete fta finally
        $fta->delete();

        session()->flash('success',__('FTA deleted successfully'));

        return redirect()->route('admin.fta_list');
    }
}
