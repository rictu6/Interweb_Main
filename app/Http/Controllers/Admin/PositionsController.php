<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Position;
use App\Http\Requests\Admin\PositionRequest;
use DataTables;

class PositionsController extends Controller
{

    /**
     * assign roles
     */
    public function __construct()
    {
        $this->middleware('can:view_position',     ['only' => ['index', 'show','ajax']]);
        $this->middleware('can:create_position',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_position',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_position',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions=Position::all();
        return view('admin.positions.index',compact('positions'));
    }

    /**
    * get position datatable
    *
    * @access public
    * @var  @Request $request
    */
    public function ajax(Request $request)
    {
       
        $model=Position::query();

        return DataTables::eloquent($model)
      
        ->addColumn('action',function($position){
            return view('admin.positions._action',compact('position'));
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
        return view('admin.positions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PositionRequest $request)
    {

        
        Position::create($request->except('_token'));
        session()->flash('success','Position saved successfully');
        return redirect()->route('admin.positions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $position=Position::findOrFail($id);
        return view('admin.positions.edit',compact('position'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PositionRequest $request, $id)
    {
        $position=Position::findOrFail($id);
        $position->update($request->except('_token','_method'));

        session()->flash('success','Position updated successfully');
        return redirect()->route('admin.positions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $position=Position::findOrFail($id);
        $position->delete();

        session()->flash('success','Position deleted successfully');
        return redirect()->route('admin.positions.index');
    }
}
