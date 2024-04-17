<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Module;
use App\Http\Requests\Admin\PermissionRequest;
use DataTables;

class PermissionsController extends Controller
{

    /**
     * assign roles
     */
    public function __construct()
    {
        $this->middleware('can:view_permission',     ['only' => ['index', 'show','ajax']]);
        $this->middleware('can:create_permission',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_permission',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_permission',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions=Permission::all();
        return view('admin.permissions.index',compact('permissions'));
        
    }

    /**
    * get Municipality datatable
    *
    * @access public
    * @var  @Request $request
    */
    public function ajax(Request $request)
    {
        $model=Permission::query()->with('module');
        return DataTables::eloquent($model)
        ->addColumn('action',function($permission){
            return view('admin.permissions._action',compact('permission'));
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
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {

        
        Permission::create($request->except('_token'));
        session()->flash('success','Permission saved successfully');
        return redirect()->route('admin.permissions.index');

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
        $permission=Permission::findOrFail($id);
        return view('admin.permissions.edit',compact('permission'));

       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, $id)
    {
        $permission=Permission::findOrFail($id);
        $permission->update($request->except('_token','_method'));

        session()->flash('success','Permission updated successfully');
        return redirect()->route('admin.permissions.index');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission=Permission::findOrFail($id);
        $permission->delete();

        session()->flash('success','Permission deleted successfully');
        return redirect()->route('admin.permissions.index');
    }
}
