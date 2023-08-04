<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use App\Models\Position;
use App\Models\Section;
use App\Models\Division;
use App\Models\Province;
use App\Models\Office;
use App\Models\Muncit;
use App\Models\EmpStatus;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use DataTables;

class UsersController extends Controller
{

    /**
     * assign roles
     */
    public function __construct()
    {
        $this->middleware('can:view_user',     ['only' => ['index', 'show','ajax']]);
        $this->middleware('can:create_user',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_user',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_user',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();


       return view('admin.users.index',compact('users'));
    }

    /**
    * get users datatable
    *
    * @access public
    * @var  @Request $request
    */
    public function ajax(Request $request)
    {
        $model=User::query()->with('roles');

        return DataTables::eloquent($model)
        ->addColumn('roles',function($user){
            return view('admin.users._roles',compact('user'));
        })
        ->addColumn('action',function($user){
            return view('admin.users._action',compact('user'));
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


        $roles=Role::all();

        $positions = Position::all();
        $sections = Section::all();
        $divisions = Division::all();
        $provinces = Province::all();
        $offices = Office::all();
        $muncits = Muncit::all();
        $empstats = EmpStatus::all();
        return view('admin.users.create',compact('roles','positions','sections'
        ,'divisions','provinces','offices','muncits','empstats'));
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


        //create new user
        $user=new User;
        $user->bio_id=$request->bio_id;
        $user->first_name=$request->first_name;
        $user->middle_name=$request->middle_name;
        $user->last_name=$request->last_name;
        $user->ext_name=$request->ext_name;
        $user->email=$request->email;
        $user->birth_date=$request->birth_date;
        $user->gender=$request->gender;
        $user->pos_id=$request->pos_id;
        $user->sec_id=$request->sec_id;
        $user->user_name=$request->user_name;
        $user->is_active=$request->is_active;
        $user->emp_status_id=$request->emp_status_id;
        $user->muncit_id=$request->muncit_id;
        $user->office_id=$request->office_id;
        $user->prov_code=$request->prov_code;
        $user->div_id=$request->div_id;
        // $user->eligibility=$request->eligibility;
        // $user->license=$request->license;
        $user->remarks=$request->remarks;
        $user->nationality="Filipino";
        $user->fb=$request->fb;
        $user->payee_id=$request->payee_id;
        $user->civil_status=$request->civil_status;
        $user->mobile_num=$request->mobile_num;
        $user->home_num=$request->home_num;
        // $user->year_attended=$request->year_attended;
        $user->home_address=$request->home_address;
        $user->hire_date=$request->hire_date;
        $user->sss_num=$request->sss_num;
        $user->gsis_num=$request->gsis_num;
        $user->tin_num=$request->tin_num;
        $user->ph_num=$request->ph_num;
        $user->pagibig_num=$request->pagibig_num;
        // $user->educ_attainment=$request->educ_attainment;
        // $user->higher_educ_ins=$request->higher_educ_ins;

        $user->youtube=$request->youtube;

        $user->password_hash=bcrypt($request->password_hash);
        $user->user_pass=$request->password_hash;


        $user->save();

        //assign roles to user
        if($request->has('roles'))
        {
            foreach($request['roles'] as $role)
            {
                UserRole::firstOrCreate([
                    'user_id'=>$user['emp_id'],
                    'role_id'=>$role
                ]);

            }
        }

        session()->flash('success',__('User Employee created successfully'));

        return redirect()->route('admin.users.index');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_old($id)
    {
        try{

        $user=User::findOrFail($id);
        $roles=Role::all();
        $positions = Position::all();
        $sections = Section::all();
        $divisions = Division::all();
        $provinces = Province::all();
        $offices = Office::all();
        $muncits = Muncit::all();
        $empstats = EmpStatus::all();
        return view('admin.users.edit', compact('roles','positions','user','sections','divisions','provinces','offices','muncits','empstats'));
        } catch (\Exception $th) {
            dd($th->getMessage());
        }
    }
  public function edit($id){
        try {
            $user=User::with('position','section','province',
            'gender','division','muncit' )->findOrFail($id);
           $roles=Role::all();
                $empstatus=EmpStatus::all();

           // dd( $user);
           return view('admin.users.edit', compact('user','roles','empstatus'));
        } catch (\Exception $th) {
            dd($th->getMessage());
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
        try{
        //update user
        $user=User::findOrFail($id);
        $user->bio_id=$request->bio_id;
        $user->first_name=$request->first_name;
        $user->middle_name=$request->middle_name;
        $user->last_name=$request->last_name;
        $user->ext_name=$request->ext_name;
        $user->email=$request->email;
        $user->birth_date=$request->birth_date;
        $user->gender=$request->gender;
        $user->pos_id=$request->pos_id;
        $user->sec_id=$request->sec_id;
        $user->user_name=$request->user_name;
        $user->is_active=$request->is_active;
        $user->emp_status_id=$request->emp_status_id;
        $user->muncit_id=$request->muncit_id;
        $user->office_id=$request->office_id;
        $user->prov_code=$request->prov_code;
        $user->div_id=$request->div_id;
        // $user->eligibility=$request->eligibility;
        // $user->license=$request->license;
        $user->remarks=$request->remarks;
        $user->nationality="Filipino";
        $user->fb=$request->fb;
        $user->payee_id=$request->payee_id;
        $user->civil_status=$request->civil_status;
        $user->mobile_num=$request->mobile_num;
        $user->home_num=$request->home_num;
        // $user->year_attended=$request->year_attended;
        $user->home_address=$request->home_address;
        $user->hire_date=$request->hire_date;
        $user->sss_num=$request->sss_num;
        $user->gsis_num=$request->gsis_num;
        $user->tin_num=$request->tin_num;
        $user->ph_num=$request->ph_num;
        $user->pagibig_num=$request->pagibig_num;
        // $user->educ_attainment=$request->educ_attainment;
        // $user->higher_educ_ins=$request->higher_educ_ins;

        $user->youtube=$request->youtube;


         if(!empty($request['password_hash']))
         {
            $user->user_pass=$request->password_hash;
            $user->password_hash=bcrypt($request->password_hash);
         }


        $user->save();

        UserRole::where('user_id',$id)->delete();

        if($request->has('roles'))
        {
            foreach($request['roles'] as $role)
            {
                UserRole::firstOrCreate([
                    'user_id'=>$id,
                    'role_id'=>$role
                ]);

            }
        }

        session()->flash('success',__('User updated successfully'));

        return redirect()->route('admin.users.index');
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
        $user=User::findorFail($id);

        //delete assigned roles
        UserRole::where('user_id',$id)->delete();

        //delete user finally
        $user->delete();

        session()->flash('success',__('User deleted successfully'));

        return redirect()->route('admin.users.index');
    }
}
