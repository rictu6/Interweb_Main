<?php

namespace App\Http\Controllers\Admin;

use console;
use Illuminate\Http\Request;

use App\Exports\RegSepiExport;

use App\Models\PropertyIssued;

use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;
use App\Exports\RegSepiSheetExport;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;





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
         return view('admin.regsepi.index');
     }

     public function ajax(Request $request)
     {
         $model = PropertyIssued::query();
         return DataTables::of($model)->toJson();
     }

     public function export()
     {
         try {
             $propertyList = PropertyIssued::
             with('property_type')
             ->get()->groupBy('property_issued_id');
             return (new RegSepiSheetExport($propertyList))->download('regsepi.xlsx');
         } catch (\Exception $e) {
            dd($e->getMessage());

             return back()->with('error', 'There was an error generating the export. Please try again.');
         }
     }




}
