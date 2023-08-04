<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Muncit;
use App\Http\Requests\Admin\MuncitRequest;
use DataTables;

class MuncitsController extends Controller
{

    /**
     * assign roles
     */
    public function __construct()
    {
        $this->middleware('can:view_muncit',     ['only' => ['index', 'show','ajax']]);
        $this->middleware('can:create_muncit',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_muncit',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_muncit',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $muncits=Muncit::all();
        return view('admin.muncits.index',compact('muncits'));
        
    }

    /**
    * get Municipality datatable
    *
    * @access public
    * @var  @Request $request
    */
    public function ajax(Request $request)
    {
        
        $model=Muncit::query();
        return DataTables::eloquent($model)
        ->addColumn('action',function($muncit){
            return view('admin.muncits._action',compact('muncit'));
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
        return view('admin.muncits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MuncitRequest $request)
    {
        Muncit::create($request->except('_token'));
        session()->flash('success','Municipality saved successfully');
        return redirect()->route('admin.muncits.index');
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
        $muncit=Muncit::findOrFail($id);
        return view('admin.muncits.edit',compact('muncit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MuncitRequest $request, $id)
    {
        $muncit=Muncit::findOrFail($id);
        $muncit->update($request->except('_token','_method'));

        session()->flash('success','Municipality updated successfully');
        return redirect()->route('admin.muncits.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $muncit=Muncit::findOrFail($id);
        $muncit->delete();

        session()->flash('success','Municipality deleted successfully');
        return redirect()->route('admin.muncits.index');
    }
}
