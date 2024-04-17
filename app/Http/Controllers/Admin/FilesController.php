<?php

namespace App\Http\Controllers\Admin;

use view;
use DataTables;
use Carbon\Carbon;
use App\Models\File;
use App\Models\FileCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
class FilesController extends Controller
{

    /**
     * assign roles
     */
    public function __construct()
    {
        $this->middleware('can:view_legal_dash',     ['only' => ['index']]);
        $this->middleware('can:view_legal',     ['only' => ['show','ajax','file_list']]);
        $this->middleware('can:create_legal',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_legal',     ['only' => ['edit', 'update','fileview']]);
        $this->middleware('can:download_legal',     ['only' => ['download']]);
        $this->middleware('can:delete_legal',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        try
        {
           
            $files_count_barangaymatters = File::where('cat_id', '2')->count();
            $files_count_conflictofinterest = File::where('cat_id', '3')->count();
            $files_count_benefitsofbrgyoff = File::where('cat_id', '4')->count();
            $files_count_adminprocess = File::where('cat_id', '5')->count();
            $files_count_benefitslocaloff = File::where('cat_id', '8')->count();
            $files_count_na = File::where('cat_id', '9')->count();

            $files_count_provlevelconcerns = File::where('cat_id', '10')->count();
            $files_count_lguconcerns = File::where('cat_id', '11')->count();
            $files_count_barangaylevelconcerns = File::where('cat_id', '12')->count();
            return view('admin.files.index',compact('files_count_barangaymatters','files_count_conflictofinterest',
            'files_count_benefitsofbrgyoff','files_count_adminprocess','files_count_benefitslocaloff','files_count_na','files_count_provlevelconcerns','files_count_lguconcerns','files_count_barangaylevelconcerns'));



        } catch (\Exception $th) {

            dd($th->getMessage());
        }
    }
    public function file_list()
    {
        $files=File::all();
        return view('admin.files.file_list',compact('files'));

    }

    public function download(Request $request,$files)
    {
      return response()->download(public_path('assets/Legal'.$files));
    }


    /**
    * get file datatable
    *
    * @access public
    * @var  @Request $request
    */
    public function ajax(Request $request)
    {
        $model=File::query()->with('filecategory');

        return DataTables::eloquent($model)
        ->addColumn('action',function($file){
            return view('admin.files._action',compact('file'));

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


        return view('admin.files.create');




    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            try
            {



            $data=new File();
            if($request->hasFile('file'))
            {
                $pic_emp=$request->file('file');
                $pic_emp_name=$pic_emp->getClientOriginalName();
                $pic_emp->move('assets/ScheduleAttachments',$pic_emp_name);
                $data->file=$pic_emp_name;
            }

            $data->ref_num=$request->ref_num;
            $data->file_desc=$request->file_desc;
            $data->title_subject=$request->title_subject;
            $data->cat_id=$request->cat_id;
            $data->save();

            session()->flash('success',__('File created successfully'));

                 return redirect()->route('admin.file_list');

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
            $file=File::findOrFail($id);
            return view('admin.files.show',compact('file'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
        $file=File::findOrFail($id);
        return view('admin.files.edit',compact('file'));
        }
        catch (\Exception $e)
        {
            dd($e -> getMessage());
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            try
            {
            $data=File::findOrFail($id);

            if($request->hasFile('file'))
            {
                $pic_emp=$request->file('file');
                $pic_emp_name=$pic_emp->getClientOriginalName();
                $pic_emp->move('assets/Legal',$pic_emp_name);
                $data->file=$pic_emp_name;
            }

            $data->ref_num=$request->ref_num;
            $data->file_desc=$request->file_desc;
            $data->title_subject=$request->title_subject;
            $data->cat_id=$request->cat_id;
            $data->save();

            session()->flash('success',__('File created successfully'));

            return redirect()->route('admin.file_list');

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
        $file=File::findOrFail($id);
        $file->delete();

        session()->flash('success','File deleted successfully');
        return redirect()->route('admin.files.index');
    }
}
