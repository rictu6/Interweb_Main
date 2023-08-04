<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmpStatus;
use App\Http\Requests\Admin\EmpStatusRequest;
use DataTables;

class EmpStatussController extends Controller
{

    /**
     * assign roles
     */
    public function __construct()
    {
        $this->middleware('can:view_empstatus',     ['only' => ['index', 'show','ajax']]);
        $this->middleware('can:create_empstatus',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_empstatus',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_empstatus',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empstatuss=EmpStatus::all();
        return view('admin.empstatuss.index',compact('empstatuss'));
    }

    /**
    * get empstatuss datatable
    *
    * @access public
    * @var  @Request $request
    */
    public function ajax(Request $request)
    {
        $model=EmpStatus::query();

        return DataTables::eloquent($model)
        ->addColumn('action',function($empstatus){
            return view('admin.empstatuss._action',compact('empstatus'));
        })
        ->toJson();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.empstatuss.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpStatusRequest $request)
    {
        EmpStatus::create($request->except('_token'));
        session()->flash('success','Employee Status saved successfully');
        return redirect()->route('admin.empstatuss.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empstatus=EmpStatus::find($id);

        $empstatus->update(['read'=>true]);

        return view('admin.empstatuss.show',compact('empstatus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empstatus=EmpStatus::findOrFail($id);
        return view('admin.empstatuss.edit',compact('empstatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpStatusRequest $request, $id)
    {
        $empstatus=EmpStatus::findOrFail($id);
        $empstatus->update($request->except('_token','_method'));

        session()->flash('success','Employee Status updated successfully');
        return redirect()->route('admin.empstatuss.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empstatus=EmpStatus::findOrFail($id);
        $empstatus->delete();

        session()->flash('success','Employee Status deleted successfully');
        return redirect()->route('admin.empstatuss.index');
    }
}
