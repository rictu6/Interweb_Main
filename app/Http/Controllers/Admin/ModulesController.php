<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;
use App\Http\Requests\Admin\ModuleRequest;
use DataTables;

class ModulesController extends Controller
{

    /**
     * assign roles
     */
    public function __construct()
    {
        $this->middleware('can:view_module',     ['only' => ['index', 'show','ajax']]);
        $this->middleware('can:create_module',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_module',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_module',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules=Module::all();
        return view('admin.modules.index',compact('modules'));
    }

    /**
    * get modules datatable
    *
    * @access public
    * @var  @Request $request
    */
    public function ajax(Request $request)
    {
        $model=Module::query();

        return DataTables::eloquent($model)
       
        ->addColumn('action',function($module){
            return view('admin.modules._action',compact('module'));
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
        return view('admin.modules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModuleRequest $request)
    {
        Module::create($request->except('_token'));
        session()->flash('success','Module saved successfully');
        return redirect()->route('admin.modules.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $module=Module::findOrFail($id);
        return view('admin.modules.edit',compact('module'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModuleRequest $request, $id)
    {
        $module=Module::findOrFail($id);
        $module->update($request->except('_token','_method'));

        session()->flash('success','Module updated successfully');
        return redirect()->route('admin.modules.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module=Module::findOrFail($id);
        $module->delete();

        session()->flash('success','Module deleted successfully');
        return redirect()->route('admin.modules.index');
    }
}
