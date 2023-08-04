<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\User;
use App\Http\Requests\Admin\DivisionRequest;
use DataTables;

class DivisionsController extends Controller
{

    /**
     * assign roles
     */
    public function __construct()
    {
        $this->middleware('can:view_division',     ['only' => ['index', 'show','ajax']]);
        $this->middleware('can:create_division',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_division',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_division',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions=Division::all();
        return view('admin.divisions.index',compact('divisions'));
    }
    /**
    * get division datatable
    *
    * @access public
    * @var  @Request $request
    */
    public function ajax(Request $request)
    {
        $model=Division::query();

        return DataTables::eloquent($model)
        ->addColumn('action',function($division){
            return view('admin.divisions._action',compact('division'));
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

        return view('admin.divisions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DivisionRequest $request)
    {
        Division::create($request->except('_token'));
        session()->flash('success','Division saved successfully');
        return redirect()->route('admin.divisions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $division=Division::find($id);

        $division->update(['read'=>true]);

        return view('admin.divisions.show',compact('division'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $division=Division::findOrFail($id);
        return view('admin.divisions.edit',compact('division'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DivisionRequest $request, $id)
    {
        $division=Division::findOrFail($id);
        $division->update($request->except('_token','_method'));

        session()->flash('success','Division updated successfully');
        return redirect()->route('admin.divisions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $division=Division::findOrFail($id);
        $division->delete();

        session()->flash('success','Division deleted successfully');
        return redirect()->route('admin.divisions.index');
    }
}
