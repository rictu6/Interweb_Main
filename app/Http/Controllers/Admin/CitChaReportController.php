<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use App\Models\CitCha;

use Illuminate\Http\Request;

use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;


class CitChaReportController extends Controller
{
    /**
     * assign roles
     */
    public function __construct()
    {
        // $this->middleware('can:view_accounting_reports',     ['only' => ['index']]);
        // $this->middleware('can:generate_report_accounting',     ['only' => ['generate_report']]);
    }
    /**
     * accounting view
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('admin.citcha_report.index');
    }
    public function generate_report(Request $request)
    {

        // // $from=date('Y-m-d',strtotime($date[0]));
        // // $to=date('Y-m-d 23:59:59',strtotime($date[1]));
        //dd($request);
        $date = explode('-', $request['created_at']);

        $citchas = CitCha::with('office_', 'service');
        $serviceCounts=0;

        // Filter based on 'service' if it exists in the request
        if ($request->has('service')) {
            $serviceIds = $request->input('service');

            $citchas->whereHas('service', function ($query) use ($serviceIds) {
                $query->whereIn('service_id', $serviceIds);
            });

        }
         // Filter based on 'month' if it exists in the request
        if ($request->has('month')) {
            $monthValue = $request->input('month');

            $citchas->whereRaw('MONTH(created_at) = ?', [$monthValue]);
        }
        // Fetch the filtered records
        $citchas = $citchas->get();
        $serviceCounts = $citchas->groupBy('service_id')->map->count();
        $citchas = $citchas->unique('service_id');
        $service_min= 10;

        $pdf = generate_pdf([
            'data' => [
                'citchas' => $citchas,
                'serviceCounts' => $serviceCounts,
                'service_min' => $service_min,
            ],
        ], 1);
// $pdf=null;
        return view('admin.citcha_report.index',compact(
            // 'from',
            // 'to',
            'citchas',
           // 'date',
          'serviceCounts',
            'service_min'
        //    , 'pdf'
        ));
    }




    public function ajax(Request $request)
    {
    //$model = CitCha::query();
    $model = CitCha::with('office_','service');
    if($request['filter_service']!=null) {
        $model->where('service_id',$request['filter_service']);
        }
        if ($request['filter_month'] != null) {
            // Assuming $request['filter_month'] contains a valid month (e.g., '07' for July)
            $month = $request['filter_month'];

            // Use a SQL pattern to match the month in the ors_no column
            $model->where('created_at', 'LIKE', "%-$month-%");
        }
    return DataTables::of($model)
    ->editColumn('service_count',function($cc){
        return view('admin.citcha_report._service_count',compact('cc'));
    })
        ->toJson();
    }

    public function getSurveyContent(Request $request) {
        $selectedValue = $request->input('selectedValue');

        if ($selectedValue == 1) {

            return view('admin.citcha._online');
        } else {

           return view('admin.citcha._onsite');
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        try {


        $citcha=new Citcha;
        $citcha->id=$request->id;

        $citcha->survey_type=$request->survey_type;
        $citcha->service_id=$request->service_id;
        $citcha->date_doc_released=$request->date_doc_released;
        //$datefrom=Carbon::createFromFormat('m/d/Y', $request->datefrom)->format('Y-m-d');
        $citcha->date_service_rendered = $request->date_service_rendered;//$request->datefrom;//Carbon::createFromFormat('d/m/Y', $request->datefrom)->format('Y-m-d');//Carbon::parse($request->datefrom)->format('Y-m-d');
        $citcha->client_type=$request->client_type;
        $citcha->name=$request->name;
        $citcha->email=$request->email;
        $citcha->contact=$request->contact;
        $citcha->age=$request->age;
        $citcha->gender=$request->gender;
        $citcha->office=$request->office;
        $citcha->office=$request->office;
        $citcha->province=$request->province;
        $citcha->muncit=$request->muncit;

        $citcha->cc1=$request->cc1;
        $citcha->cc2=$request->cc2;
        $citcha->cc3=$request->cc3;

        $citcha->sqd0=$request->sqd0;
        $citcha->sqd1=$request->sqd1;
        $citcha->sqd2=$request->sqd2;
        $citcha->sqd3=$request->sqd3;
        $citcha->sqd4=$request->sqd4;
        $citcha->sqd5=$request->sqd5;
        $citcha->sqd6=$request->sqd6;
        $citcha->sqd7=$request->sqd7;
        $citcha->sqd8=$request->sqd8;


        $citcha->save();



        session()->flash('success',__('Citcha created successfully'));

        return redirect()->route('admin.citcha.index');
        } catch (\Exception $th) {
            dd($th->getMessage());
        }
        //dd($request);
        //create new user

    }

//     public function service_count()
//     {
//         // Retrieve all CitCha instances
//         $citChas = CitCha::all();
// $service_count=0;
//         // Access the count of each service_id in the retrieved instances
//         foreach ($citChas as $citCha) {
//             $serviceId = $citCha->service_id;
//             $serviceIdCount = $citCha->service_id_count; // Accessing the accessor method

//             // Use $serviceId and $serviceIdCount as needed
//             //echo "Service ID: $serviceId, Count: $serviceIdCount\n";

//         }
//         return $service_count=$serviceIdCount;
//         // Other controller logic...
//     }








}
