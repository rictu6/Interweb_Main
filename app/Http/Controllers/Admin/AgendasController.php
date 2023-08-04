<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agenda;

use App\Http\Requests\Admin\AgendaRequest;
use DataTables;

class AgendasController extends Controller
{

    /**
     * assign roles
     */
    public function __construct()
    {
        $this->middleware('can:view_agenda',     ['only' => ['index', 'show','ajax']]);
        $this->middleware('can:create_agenda',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_agenda',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_agenda',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agendas=Agenda::all();
        return view('admin.agendas.index',compact('agendas'));

    }

    /**
    * get  datatable
    *
    * @access public
    * @var  @Request $request
    */
    public function ajax(Request $request)
    {
        $model=Agenda::query();

        return DataTables::eloquent($model)
        ->addColumn('schedule',function($agenda){
            return view('admin.agendas._schedule',compact('agenda'));
        })
       
        ->addColumn('action',function($agenda){
            return view('admin.agendas._action',compact('agenda'));
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
       
        return view('admin.agendas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgendaRequest $request)
    {
        Agenda::create($request->except('_token'));
        session()->flash('success','Agenda saved successfully');
        return redirect()->route('admin.agendas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agenda=Agenda::find($id);

        $agenda->update(['read'=>true]);

        return view('admin.agendas.show',compact('agenda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

       

        $agenda=Agenda::findOrFail($id);
        
        return view('admin.agendas.edit',compact('agenda'));

      
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AgendaRequest $request, $id)
    {
        $agenda=Agenda::findOrFail($id);
        $agenda->update($request->except('_token','_method'));

        session()->flash('success','Agenda updated successfully');
        return redirect()->route('admin.agendas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agenda=Agenda::findOrFail($id);
        $agenda->delete();

        session()->flash('success','Agenda deleted successfully');
        return redirect()->route('admin.agendas.index');
    }
}
