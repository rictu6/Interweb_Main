<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Role;
use App\Models\UserRole;
use App\Http\Requests\Admin\EmployeeRequest;
use DataTables;

class EmployeesController extends Controller
{

    /**
     * assign roles
     */
    public function __construct()
    {
        $this->middleware('can:view_employee',     ['only' => ['index', 'show','ajax']]);
        $this->middleware('can:create_employee',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_employee',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_employee',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=Employee::all();
        return view('admin.employees.index',compact('employees'));
       
    }

    /**
    * get employee datatable
    *
    * @access public
    * @var  @Request $request
    */
    public function ajax(Request $request)
    {
       

        $model=Employee::query()->with('roles');

        return DataTables::eloquent($model)
        ->addColumn('roles',function($employee){
            return view('admin.employees._roles',compact('employee'));
        })
        ->addColumn('action',function($employee){
            return view('admin.employees._action',compact('employee'));
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
        return view('admin.employees.create',compact('roles'));
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
      

          //create new user
          $employee=new Employee;
          $employee->bio_id=$request->bio_id;
          $employee->first_name=$request->first_name;
          $employee->middle_name=$request->middle_name;
          $employee->last_name=$request->last_name;
          $employee->ext_name=$request->ext_name;
          $employee->email=$request->email;
          $employee->birth_date=$request->birth_date;
          $employee->gender=$request->gender;
          $employee->pos_id=$request->pos_id;
          $employee->sec_id=$request->sec_id;
          $employee->user_name=$request->user_name;
          $employee->is_active=$request->is_active;
        
          $employee->emp_status_id=$request->emp_status_id;
          $employee->muncit_id=$request->muncit_id;
          $employee->office_id=$request->office_id;
          $employee->prov_code=$request->prov_code;
          $employee->div_id=$request->div_id;
          $employee->eligibility=$request->eligibility;
          $employee->license=$request->license;
          $employee->remarks=$request->remarks;
          $employee->nat_id=$request->nat_id;
          $employee->fb=$request->fb;
          $employee->payee_id=$request->payee_id;
          $employee->civil_status=$request->civil_status;
          $employee->mobile_num=$request->mobile_num;
          $employee->home_num=$request->home_num;
          $employee->home_address=$request->home_address;
          $employee->hire_date=$request->hire_date;
          $employee->sss_num=$request->sss_num;
          $employee->gsis_num=$request->gsis_num;
          $employee->tin_num=$request->tin_num;
          $employee->ph_num=$request->ph_num;
          $employee->pagibig_num=$request->pagibig_num;
          $employee->educ_attainment=$request->educ_attainment;
          $employee->higher_educ_ins=$request->higher_educ_ins;
          $employee->twitter=$request->twitter;
          $employee->youtube=$request->youtube;
          $employee->instagram=$request->instagram;
          $employee->password_hash=bcrypt($request->password_hash);
         
          $employee->user_pass=$request->password_hash;

         
          if($request->hasFile('pic_emp') ) {
            $image = $request->file('pic_emp');
    
            $imageName = str_random(8) . '_' . $image->getClientOriginalName();
    
            $image->move('uploads/pic_emp', $imageName);
    
            /**
             * Add the image name and type to status.
             */
            $employee->image_url = $imageName;
          
        }

        // //assign roles to user
        // if($request->has('roles'))
        // {
        //     foreach($request['roles'] as $role)
        //     {
        //         UserRole::firstOrCreate([
        //             'emp_id'=>$employee['id'],
        //             'role_id'=>$role
        //         ]);
                
        //     }
        // }
          $employee->save();
  
     
         

          session()->flash('success',__('Employee created successfully'));
  
          return redirect()->route('admin.employees.index');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee=Employee::find($id);

        $employee->update(['read'=>true]);

        return view('admin.employees.show',compact('employee'));



        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee=Employee::findOrFail($id);
        $roles=Role::all();
        return view('admin.employees.edit',compact('employee','roles'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    { 
      
          //update user
          $employee=Employee::findOrFail($id);
          $employee->bio_id=$request->bio_id;
          $employee->first_name=$request->first_name;
          $employee->middle_name=$request->middle_name;
          $employee->last_name=$request->last_name;
          $employee->ext_name=$request->ext_name;
          $employee->email=$request->email;
          $employee->birth_date=$request->birth_date;
          $employee->gender=$request->gender;
          $employee->pos_id=$request->pos_id;
          $employee->sec_id=$request->sec_id;
          $employee->user_name=$request->user_name;
          $employee->is_active=$request->is_active;
         
         
          $employee->emp_status_id=$request->emp_status_id;
          $employee->muncit_id=$request->muncit_id;
          $employee->office_id=$request->office_id;
          $employee->prov_code=$request->prov_code;
          $employee->div_id=$request->div_id;
          $employee->eligibility=$request->eligibility;
          $employee->license=$request->license;
          $employee->remarks=$request->remarks;
          $employee->nat_id=$request->nat_id;
          $employee->fb=$request->fb;
          $employee->payee_id=$request->payee_id;
          $employee->civil_status=$request->civil_status;
          $employee->mobile_num=$request->mobile_num;
          $employee->home_num=$request->home_num;
          $employee->home_address=$request->home_address;
          $employee->hire_date=$request->hire_date;
          $employee->sss_num=$request->sss_num;
          $employee->gsis_num=$request->gsis_num;
          $employee->tin_num=$request->tin_num;
          $employee->ph_num=$request->ph_num;
          $employee->pagibig_num=$request->pagibig_num;
          $employee->educ_attainment=$request->educ_attainment;
          $employee->higher_educ_ins=$request->higher_educ_ins;
          $employee->twitter=$request->twitter;
          $employee->youtube=$request->youtube;
          $employee->instagram=$request->instagram;

          $employee->is_active=$request->is_active;

          if(!empty($request['password_hash']))
        {
            $employee->password_hash=bcrypt($request->password_hash);

            $employee->user_pass=$request->password_hash;

        }

         
        if($request->hasFile('pic_emp') ) {
            $image = $request->file('pic_emp');
    
            $imageName = str_random(8) . '_' . $image->getClientOriginalName();
    
            $image->move('uploads/pic_emp', $imageName);
    
            /**
             * Add the image name and type to status.
             */
            $employee->image_url = $imageName;
          
        }

        
      
        //  //assign roles to user
        //  if($request->has('roles'))
        //  {
        //      foreach($request['roles'] as $role)
        //      {
        //          UserRole::firstOrCreate([
        //              'emp_id'=>$employee['id'],
        //              'role_id'=>$role
        //          ]);
                 
        //      }
        //  }

          $employee->save();
  
      

          session()->flash('success',__('Employee updated successfully'));
  
          return redirect()->route('admin.employees.index');
    }

    function check(Request $request){
        //return $request->input();

       //validate
       $request->validate([
        'email'=>'required|email',
        'user_pass'=>'required|min:5|max:12'
       ]);

       $userInfo=Employee::where('email','=',$request->email)->first();
            //       echo "<pre>";
            // print_r($userInfo);
            // die;

           // $session=Employee::where('email',$email)->where ('user_pass',$user_pass)->get();
       if(!$userInfo){
        return back()->with('fail','We do not recognize your email address');
       }else{
        //check password
        //if(Hash::check($request->user_pass,$userInfo->user_pass)){
            if($request->user_pass=$userInfo->user_pass){
            $request->session()->put('LoggedUser', $userInfo->emp_id);
           // dd($userInfo->emp_id);
            return redirect('/employee/dashboard');
        }else{
            return back()->with('fail','Incorrect password');
        }
       }

    }
    public function destroy($id)
    {
        $employee=Employee::findOrFail($id);

      
        UserRole::where('user_id',$id)->delete();

        $employee->delete();

        session()->flash('success','Employee deleted successfully');
        return redirect()->route('admin.employees.index');



    }
}