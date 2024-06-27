<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SepcExport;
use Illuminate\Http\Request;
use App\Exports\RegSepiExport;

use App\Models\PropertyIssued;

use Illuminate\Support\Carbon;

use App\Exports\ICSSheetExport;
use App\Exports\SepcSheetExport;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
// use Excel;

class RepSepiController extends Controller
{
    /**
     * assign roles
     */
    public function __construct()
    {
        $this->middleware('can:view_property',     ['only' => ['index','ajax']]);
        $this->middleware('can:create_property',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_property',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_property',   ['only' => ['destroy']]);
    }


    /**
     * accounting view
     *
     * @return \Illuminate\Http\Response
     */




    public function index()
    {
       //$property_list = PropertyIssued::get();
        return view('admin.repsepi.index');
    }

    public function ajax(Request $request)
    {
    $model = PropertyIssued::query();

    return DataTables::of($model)

        ->toJson();
    }


    public function export(Request $request)
    {             $property_list = PropertyIssued::
        with('property_type')
        ->get()->groupBy('property_issued_id');
        // $property_list = PropertyIssued::all()->groupBy
        // ('property_issued_id');
        //dd($property_list);
        return(new ICSSheetExport($property_list))->download('repsepi.xlsx');
        //return view('admin.inventory_report.index',compact('property_list', 'excel'));//
    }










}
