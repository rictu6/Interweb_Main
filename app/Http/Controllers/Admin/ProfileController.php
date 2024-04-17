<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UpdateProfileRequest;
use App\Models\User;

use App\Models\Position;
use App\Models\Section;

use App\Models\Division;
use App\Models\Province;
use App\Models\Office;

use App\Models\Muncit;
use App\Models\EmpStatus;


class ProfileController extends Controller
{
    /**
     * Show the form for editing profile
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

        $this->middleware('can:edit_profile',     ['only' => ['edit', 'update']]);

    }

    public function edit_old()
    {


       $users = User::all();
       $positions = Position::all();
       $sections = Section::all();

       $divisions = Division::all();
       $provinces = Province::all();
       $offices = Office::all();

       $muncits = Muncit::all();
       $empstats = EmpStatus::all();
    //    dd($positions);
        return view('admin.profile.edit', compact('positions','users','sections'
        ,'divisions','provinces','offices','muncits','empstats'
    ));

    }

public function edit(){
    try {
        $user=User::with('position','section','province',
        'gender','division','muncit')->findOrFail(auth()->guard('admin')->user()->emp_id);
        $empstatus=EmpStatus::all();
       // $roles=Role::all();
        // $user=User::with('position','section','province',
        // 'gender','roles','division','empstatus','muncit' );//->find($id);//
       // dd( $user);
       return view('admin.profile.edit', compact('user','empstatus'));
    } catch (\Exception $th) {
        dd($th->getMessage());
    }

}
    /**
     * Update profile
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {//try{
       // dd($request);
       //update user
       $user=User::findOrFail(auth()->guard('admin')->user()->emp_id);
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

       $user->emp_remarks=$request->emp_remarks;
       $user->nationality="Filipino";
       $user->fb=$request->fb;
       $user->payee_id=$request->payee_id;
       $user->civil_status=$request->civil_status;
       $user->mobile_num=$request->mobile_num;
       $user->home_num=$request->home_num;

       $user->home_address=$request->home_address;
       $user->hire_date=$request->hire_date;
       $user->sss_num=$request->sss_num;
       $user->gsis_num=$request->gsis_num;
       $user->tin_num=$request->tin_num;
       $user->ph_num=$request->ph_num;
       $user->pagibig_num=$request->pagibig_num;
       $user->youtube=$request->youtube;

       if(!empty($request['password_hash']))
       {
           $user->user_pass=$request->password_hash;
           $user->password_hash=bcrypt($request->password_hash);
       }
    //    if($request->hasFile('pic_emp'))
    //    {
    //        $pic_emp=$request->file('pic_emp');
    //        $pic_emp_name=auth()->guard('admin')->user()->emp_id.'.'.$pic_emp->getClientOriginalExtension();
    //        $pic_emp->move('uploads/signature', $pic_emp_name);
    //        $pic_emp_path = 'uploads/signature/' . $pic_emp_name;
    //        $user->pic_emp = $pic_emp_name;
    //       // $user->pic_emp_data = base64_encode(file_get_contents($pic_emp_path));
    //       $picEmp_root = $request->file('pic_emp');
    //       $picEmpContents = base64_encode(file_get_contents($picEmp_root->getRealPath()));
    //       $user->pic_emp_data = $picEmpContents;
    //    }


    // if ($request->hasFile('pic_emp')) {
    //     $pic_emp = $request->file('pic_emp');
    //     $pic_emp_name = auth()->guard('admin')->user()->emp_id . '.' . $pic_emp->getClientOriginalExtension();
    //     $pic_emp->move('uploads/signature', $pic_emp_name);
    //     $user->pic_emp = $pic_emp_name;
    //     if (is_uploaded_file($pic_emp)) {
    //         // store the binary data of the uploaded file in the pic_emp_data attribute
    //         $user->pic_emp_data = file_get_contents($pic_emp);
    //     }

    // }

    // if ($request->hasFile('pic_emp')) {
    //     $pic_emp = $request->file('pic_emp');
    //     $pic_emp_name = auth()->guard('admin')->user()->emp_id.'.'.$pic_emp->getClientOriginalExtension();
    //     $pic_emp->storeAs('uploads/signature', $pic_emp_name);
    //     $user->pic_emp = $pic_emp_name;

    //     // store the binary data of the uploaded file in the pic_emp_data attribute
    //     $user->pic_emp_data = base64_encode(file_get_contents($pic_emp->getRealPath()));
    // }

    // if ($request->hasFile('pic_emp')) {
    //     $pic_emp = $request->file('pic_emp');
    //     $user->pic_emp = $pic_emp->getClientOriginalName();
    //     $user->pic_emp_data = file_get_contents($pic_emp);
    // }

    if($request->hasFile('pic_emp')) {
        $pic_emp = $request->file('pic_emp');
        $orig_pic_emp = $pic_emp->getClientOriginalName();
        $user->pic_emp_data = file_get_contents($pic_emp->getRealPath());
        $pic_emp_name = auth()->guard('admin')->user()->emp_id.'.'.$pic_emp->getClientOriginalExtension();
        $pic_emp->move('uploads/signature', $pic_emp_name);
        $user->pic_emp = $pic_emp_name;
    }



    //    if (count($_FILES) > 0) {
    //     //if (is_uploaded_file($_FILES['pic_emp']['tmp_name'])) {
    //         $imgData = addslashes(file_get_contents($_FILES['pic_emp']['tmp_name']));
    //         $user->pic_emp_data = $imgData;
    //    // }
    // }


//dd($user);

        $user->save();

        session()->flash('success',__('Profile updated successfully'));

        return redirect()->route('admin.profile.edit');
   // } catch (\Exception $th) {
   //     dd($th->getMessage());
    //}
    }
}
