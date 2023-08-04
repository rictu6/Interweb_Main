<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FileCategory;
use App\Http\Requests\Admin\FileCategoryRequest;
use DataTables;

class FileCategoriesController extends Controller
{

    /**
     * assign roles
     */
    public function __construct()
    {
        $this->middleware('can:view_filecategory',     ['only' => ['index', 'show','ajax']]);
        $this->middleware('can:create_filecategory',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_filecategory',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_filecategory',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filecategories=FileCategory::all();
        return view('admin.filecategories.index',compact('filecategories'));
    }

    /**
    * get filecategories datatable
    *
    * @access public
    * @var  @Request $request
    */
    public function ajax(Request $request)
    {
        $model=FileCategory::query();

        return DataTables::eloquent($model)
        ->addColumn('action',function($filecategory){
            return view('admin.filecategories._action',compact('filecategory'));
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
        
        return view('admin.filecategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

        $request['cat_id']=filecategory_cat_id();
        FileCategory::create($request->except('_token','_method'));
        session()->flash('success','File Category saved successfully');
        return redirect()->route('admin.filecategories.index');




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
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $filecategory=FileCategory::findOrFail($id);
        return view('admin.filecategories.edit',compact('filecategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FileCategoryRequest $request, $id)
    {
        try{
        $filecategory=FileCategory::findOrFail($id);
        $filecategory->update($request->except('_token','_method'));

        session()->flash('success','File Category updated successfully');
        return redirect()->route('admin.filecategories.index');
    } catch (\Exception $th) {
        dd($th->getMessage());
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $filecategory=FileCategory::findOrFail($id);
        $filecategory->delete();

        session()->flash('success','File Category deleted successfully');
        return redirect()->route('admin.filecategories.index');
    }
}
