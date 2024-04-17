<?php

namespace App\Http\Controllers\Admin;

use App\Exports\RegSepiExport;
use Illuminate\Support\Facades\View;

use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;

use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\PropertyIssued;
// use Excel;

class RegSepiController extends Controller
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
       //$property_list = PropertyIssued::get();
        return view('admin.regsepi.index');
    }

    public function ajax(Request $request)
    {
    $model = PropertyIssued::query();

    return DataTables::of($model)

        ->toJson();
    }
    public function export()
    {
        ob_end_clean(); // this
        ob_start(); // and this
        return Excel::download(new RegSepiExport, 'regsepi.xlsx');
    }
    // public function create()
    // {

    //     return view('admin.property_issued.create');//,compact('roles'));
    // }

    public function generate_report(Request $request)
    {
        //$date = explode('-', $request['created_at']);

        $property_list = PropertyIssued::get();
        // Filter based on 'service' if it exists in the reques
        $excel = generate_excel([
            'data' => [
                'properties' => $property_list,
            ],
        ], 1);
//dd($property_list);
        return view('admin.inventory_report.index',compact('property_list', 'excel'));//
    }




    public function getStatusContent(Request $request) {

        $selectedValue = $request->input('selectedValue');

        if ($selectedValue == 0) {

            return view('admin.property_issued._issued');
        } else if ($selectedValue == 1){

            return view('admin.property_issued._returned');
        }else{

        return view('admin.property_issued._reissued');
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

        //dd($request);
        try {


        $property=new PropertyIssued();
        $property->property_issued_id=$request->property_issued_id;

        $property->date_acquired=$request->date_acquired;
        $property->semi_expendable_property_no=$request->semi_expendable_property_no;
        $property->ics_rrsp_no=$request->ics_rrsp_no;
        //$datefrom=Carbon::createFromFormat('m/d/Y', $request->datefrom)->format('Y-m-d');
        $property->item_description = $request->item_description;//$request->datefrom;//Carbon::createFromFormat('d/m/Y', $request->datefrom)->format('Y-m-d');//Carbon::parse($request->datefrom)->format('Y-m-d');
        $property->estimated_useful_life=$request->estimated_useful_life;
        $property->issued_qty=$request->issued_qty;
        $property->issued_office=$request->issued_office;
        $property->returned_qty=$request->returned_qty;
        $property->returned_office=$request->returned_office;
        $property->re_issued_qty=$request->re_issued_qty;
        $property->re_issued_office=$request->re_issued_office;
        $property->disposed_qty=$request->disposed_qty;
        $property->balance_qty=$request->balance_qty;
        $property->amount=$request->amount;
        $property->remarks=$request->remarks;
        $property->property_type=$request->property_type;
        $property->entity_name=$request->entity_name;

;

        //dd($property);
        $property->save();



        session()->flash('success',__('Property created successfully'));

        return redirect()->route('admin.property_issued.index');
        } catch (\Exception $th) {
            dd($th->getMessage());
        }
        //dd($request);
        //create new user

    }

//     public function service_count()
//     {
//         // Retrieve all property$property instances
//         $propertys = property$property::all();
// $service_count=0;
//         // Access the count of each service_id in the retrieved instances
//         foreach ($propertys as $property) {
//             $serviceId = $property->service_id;
//             $serviceIdCount = $property->service_id_count; // Accessing the accessor method

//             // Use $serviceId and $serviceIdCount as needed
//             //echo "Service ID: $serviceId, Count: $serviceIdCount\n";

//         }
//         return $service_count=$serviceIdCount;
//         // Other controller logic...
//     }








}
