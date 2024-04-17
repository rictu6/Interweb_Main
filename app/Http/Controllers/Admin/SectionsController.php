<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Division; 
use App\Models\Office;
use App\Http\Requests\Admin\SectionRequest;
use DataTables;

class SectionsController extends Controller
{

    /**
     * assign roles
     */
    public function __construct()
    {
        $this->middleware('can:view_section',     ['only' => ['index', 'show','ajax']]);
        $this->middleware('can:create_section',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_section',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_section',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections=Section::all();
        return view('admin.sections.index',compact('sections'));
    }

    /**
    * get section datatable
    *
    * @access public
    * @var  @Request $request
    */
    public function ajax(Request $request)
    {
        $model=Section::query()->with('office','division');

        return DataTables::eloquent($model)
      
        ->addColumn('action',function($section){
            return view('admin.sections._action',compact('section'));
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
        $offices = Office::all();
        $divisions = Division::all();
      


        return view('admin.sections.create',compact('offices','divisions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionRequest $request)
    {
        Section::create($request->except('_token'));
        session()->flash('success','Section saved successfully');
        return redirect()->route('admin.sections.index');
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
        $offices = Office::all();
        $divisions = Division::all();
      


        $section=Section::findOrFail($id);
        return view('admin.sections.edit',compact('section','offices','divisions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SectionRequest $request, $id)
    {
        $section=Section::findOrFail($id);
        $section->update($request->except('_token','_method'));

        session()->flash('success','Section updated successfully');
        return redirect()->route('admin.sections.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section=Section::findOrFail($id);
        $section->delete();

        session()->flash('success','Section deleted successfully');
        return redirect()->route('admin.sections.index');
    }
}
