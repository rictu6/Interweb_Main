<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Http\Requests\Admin\ProvinceRequest;
use DataTables;

class ProvincesController extends Controller
{

    /**
     * assign roles
     */
    public function __construct()
    {
        $this->middleware('can:view_province',     ['only' => ['index', 'show','ajax']]);
        $this->middleware('can:create_province',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_province',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_province',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces=Province::all();
        return view('admin.provinces.index',compact('provinces'));
        
    }

    /**
    * get Municipality datatable
    *
    * @access public
    * @var  @Request $request
    */
    public function ajax(Request $request)
    {
        
        $model=Province::query();
        return DataTables::eloquent($model)
        ->addColumn('action',function($province){
            return view('admin.provinces._action',compact('province'));
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
        return view('admin.provinces.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProvinceRequest $request)
    {
        Province::create($request->except('_token'));
        session()->flash('success','Province saved successfully');
        return redirect()->route('admin.provinces.index');
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
        $province=Province::findOrFail($id);
        return view('admin.provinces.edit',compact('province'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProvinceRequest $request, $id)
    {
        $province=Province::findOrFail($id);
        $province->update($request->except('_token','_method'));

        session()->flash('success','Province updated successfully');
        return redirect()->route('admin.provinces.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $province=Province::findOrFail($id);
        $province->delete();

        session()->flash('success','Province deleted successfully');
        return redirect()->route('admin.provinces.index');
    }
}
