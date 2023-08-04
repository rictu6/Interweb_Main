<?php

namespace App\Http\Controllers\Admin;
use view;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Role;
use App\Models\User;
use App\Models\Attendee ;
use App\Models\ScheduleUser;
use Illuminate\Support\Str;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\CreateScheduleRequest;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
class SchedulesController extends Controller
{


    public function __construct()
    {
        $this->middleware('can:view_schedule',     ['only' => ['index', 'show','ajax','schedule_list']]);
        $this->middleware('can:create_schedule',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_schedule',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_schedule',   ['only' => ['destroy']]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=Schedule::all();
        return view('admin.schedules.index',compact('users'));
    }
    public function ajax(Request $request)
    {
        $model=Schedule::query()->with('division','office','section','position','roles');

        return DataTables::eloquent($model)
        ->addColumn('roles',function($user){
                return view('admin.schedules._attendees',compact('user'));
            })
        ->addColumn('action',function($user){
            return view('admin.schedules._action',compact('user'));
        })
        ->toJson();



    }
    public function create()
    {
        $roles=Attendee::all();
        $user_attendee=User::all();

        return view('admin.schedules.create',compact('roles','user_attendee'));
    }
    public function store(Request $request)
    {





        $user=new Schedule;





            if($request->has('roles'))
            {
                foreach($request['roles'] as $role)
                {

                    if (ScheduleUser::where('emp_id', $role)->first())



                    {
                        return redirect()->back()->withErrors("Attendee/s already have schedule on this date")->withInput();
                    }
                    else
                    {


            $user->posted_by=$request->posted_by;
            $user->posted_date=$request->posted_date;
            $user->office_id=$request->office_id;
            $user->div_id=$request->div_id;
            $user->color=$request->color;
            $user->venue=$request->venue;
            $user->sec_id=$request->sec_id;

            $user->emp_id=$request->emp_id;
            $user->start=$request->start;
            $user->end=$request->end;
            $user->title=$request->title;

            $user->save();

dd($user->roles());

            // foreach ($request->approdtls as $detail) {
            //     if ($appro->save()) {
            //        // dd($request);
            //         ApproSetupDetail::create([
            //             'appro_setup_id' => $appro['appro_setup_id'],
            //             'uacs_subobject_code' => $detail['uacs_subobject_code'],
            //             'allotment_received' => $detail['allotment_received'],
            //         ]);
            //     }
            //  }

                        ScheduleUser::firstOrCreate([
                            'emp_id'=>$user['emp_id'],
                            'schedule_id'=>$user['id'],
                           // 'emp_id'=>$role,
                            'attendee_name'=>$role,
                            'start'=>$user['start'],
                            'end'=>$user['end']


                        ]);
                    }




                }
            }

dd($request);


            session()->flash('success','Schedule saved successfully');

            return redirect()->route('admin.schedule_list');

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

        try
        {

            $user=Schedule::findOrFail($id);
            $roles=Attendee::all();
            $user_attendee=User::all();


        return view('admin.schedules.edit',compact('user','roles','user_attendee'));
        }
        catch (\Exception $e)
        {
            dd($e -> getMessage());
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $user=Schedule::findOrFail($id);
        $user->posted_by=$request->posted_by;
        $user->posted_date=$request->posted_date;
        $user->office_id=$request->office_id;
        $user->venue=$request->venue;
        $user->div_id=$request->div_id;
        $user->color=$request->color;
        $user->sec_id=$request->sec_id;

        $user->emp_id=$request->emp_id;
        $user->start=$request->start;
        $user->end=$request->end;
        $user->title=$request->title;


        $user->save();


        ScheduleUser::where('schedule_id',$id)->delete();

        if($request->has('roles'))
        {

            foreach($request['roles'] as $attendee_name)
            {
                foreach($request['roles'] as $role)
                {
                if (ScheduleUser::where('emp_id', $role)->first())



                {
                    return redirect()->back()->withErrors("Attendee/s already have schedule on this date")->withInput();
                }
                else
                {

                ScheduleUser::firstOrCreate([
                    'emp_id'=>$id,
                    'schedule_id'=>$id,
                    'emp_id'=>$role,
                    'attendee_name'=>$attendee_name,

                    'start'=>$user['start'],
                    'end'=>$user['end']

                ]);
            }
        }
            }
        }
        else{
            return redirect()->back()->withErrors("This employee isn't working at your selected time")->withInput();
        }



        session()->flash('success','Schedule saved successfully');

        return redirect()->route('admin.schedule_list');
    }

    public function schedule_list()
    {
        $users=Schedule::all();
        return view('admin.schedules.schedule_list',compact('users'));
    }
    public function calendar_show()
    {
        // $tasks=Schedule::all();
        // return view('admin.schedules.calendar_show',compact('tasks'));

        $events = [];
        $data = Schedule::all();

        if($data->count())
         {
            foreach ($data as $key => $value)
            {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start),
                    new \DateTime($value->end.'+1 day'),
                    null,
                    // Add color
                 [
                    'color'=> $value->color,
                     'textColor' => $value->textColor,
                 ]
                );
            }
        }
$calendar =\Calendar::addEvents($events);
return view('admin.schedules.calendar_show',compact('events','calendar'));

    }
    public function destroy($id)
    {
        $users=Schedule::findOrFail($id);
        $users->delete();

        session()->flash('success','Schedule deleted successfully');
        return redirect()->route('admin.schedules.index');
    }
}
