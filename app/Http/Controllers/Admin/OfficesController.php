<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Office;
use App\Http\Requests\Admin\OfficeRequest;
use DataTables;

class OfficesController extends Controller
{

    /**
     * assign roles
     */
    public function __construct()
    {
        $this->middleware('can:view_office',     ['only' => ['index', 'show','ajax']]);
        $this->middleware('can:create_office',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_office',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_office',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offices=Office::all();
        return view('admin.offices.index',compact('offices'));
    }

    /**
    * get Office datatable
    *
    * @access public
    * @var  @Request $request
    */
    public function ajax(Request $request)
    {
        $model=Office::query();

        return DataTables::eloquent($model)
        ->addColumn('action',function($office){
            return view('admin.offices._action',compact('office'));
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
        return view('admin.offices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfficeRequest $request)
    {
        try{
            //update user
        Office::create($request->except('_token'));
        session()->flash('success','Office saved successfully');
        return redirect()->route('admin.offices.index');
    } catch (\Exception $th) {

        dd($th->getMessage());

    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $office=Office::find($id);

        $office->update(['read'=>true]);

        return view('admin.offices.show',compact('office'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $office=Office::findOrFail($id);
        return view('admin.offices.edit',compact('office'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OfficeRequest $request, $id)
    {
        $office=Office::findOrFail($id);
        $office->update($request->except('_token','_method'));

        session()->flash('success','Office updated successfully');
        return redirect()->route('admin.offices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $office=Office::findOrFail($id);
        $office->delete();

        session()->flash('success','Office deleted successfully');
        return redirect()->route('admin.offices.index');
    }
}
