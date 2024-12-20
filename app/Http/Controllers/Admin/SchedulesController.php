<?php

namespace App\Http\Controllers\Admin;

use view;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole_Schedule;
use App\Models\Attendee ;
use App\Models\Position;
use App\Models\ScheduleUser;
use Illuminate\Support\Str;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\CreateScheduleRequest;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Validator;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;



class SchedulesController extends Controller
{


    public function __construct()
    {
        $this->middleware('can:view_schedule',     ['only' => ['index', 'show','ajax','schedule_list','schedule_view']]);
        $this->middleware('can:create_schedule',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_schedule',     ['only' => ['edit', 'update']]);

        $this->middleware('can:delete_schedule',   ['only' => ['destroy']]);
       // $this->middleware('can:view_RD_schedule',     ['only' => ['create', 'store','edit', 'update']]);
        // $this->middleware('can:view_viewer_schedule',     ['only' => ['create', 'store','edit', 'update']]);
        // $this->middleware('can:view_encoder_schedule',    ['only' => ['create', 'store','edit', 'update']]);
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
    }   // $model = DB::table('tbl_schedule')
        // ->join('tbl_user_schedule', 'tbl_schedule.id', '=', 'tbl_user_schedule.schedule_id')
        // ->join('user_roles', 'user_roles.user_id', '=', 'tbl_user_schedule.emp_id')
        // ->select('user_roles.role_id,tbl_user_schedule.is_drafted,tbl_user_schedule.emp_id,tbl_user_schedule.is_submitted')
        // ->get();
    public function ajax(Request $request)
    {
        $model = Schedule::
      with(['roles' => function($query) {
        $query;
    }])
    ->with(['userrole_schedule' => function($query) {
        $query
        ->where('role_id',11)
        ->orWhere('role_id',12)
        ->orWhere('role_id',9);
    }])
     ->where('is_drafted',1)->where('emp_id',auth()->guard('admin')->user()->emp_id)
     ->orWhere('is_drafted',1)->where('is_submitted',1)
     ->orWhere('status','Approval');


    return DataTables::eloquent($model)

        ->addColumn('roles',function($user){
                return view('admin.schedules._attendees',compact('user'));
            })
        ->addColumn('action',function($user){
            return view('admin.schedules._action',compact('user'));
        })
        ->toJson();

    }
    public function create(Request $request)
    {
        $roles=Attendee::all();
        $positions = Position::all();
        //$positions = \DB::table('tbl_util_position')->orderBy('pos_desc','asc')->get();



        return view('admin.schedules.create',compact('roles','positions'));

    }
    public function fetchAttendees($pos_id = null) {

        $roles = \DB::table('tbl_employee')->where('pos_id',$pos_id)->get();

        return response()->json([
            'status' => 1,
            'roles' => $roles
        ]);
    }
    //   return redirect()->back()->withErrors($group_test1['first_name']. ' ' .$group_test1['middle_name']. ' ' .$group_test1['last_name']. ' is attending' . ' ' .$scheduleUser1['title']. ' @ ' .$scheduleUser1['venue']. ' (From ' .$scheduleUser1['start']. ' to ' .$scheduleUser1['end']. ' ) ')->withInput();

    public function store(Request $request)
    {




        if ($request->get('action') == 'submit')
         {
                $user=new Schedule;

                $user->posted_by=$request->posted_by;
                $user->posted_date=$request->posted_date;
                $user->office_id=$request->office_id;
                $user->div_id=$request->div_id;


                if($request->sec_id == 13)//red
                {
                    $user->color= '#FF0000';
                }
                else if ($request->div_id == 5)//orange
                {
                    $user->color= '#FFA500';
                }
                else if ($request->sec_id == 1)//yellow
                {
                    $user->color= '#FFFF00';
                }
                else if ($request->sec_id == 12)//green
                {
                    $user->color= '#008000';
                }
                else if ($request->sec_id == 2)//blue
                {
                    $user->color= '#0000FF';
                }
                else if ($request->div_id == 3)//violet
                {
                    $user->color= '#EE82EE';
                }
                else if ($request->div_id == 2)//brown
                {
                    $user->color= '#A52A2A';
                }
                else if ($request->div_id == 1)//pink
                {
                    $user->color= '#FFC0CB';
                }
                else if ($request->sec_id == 4)//yellow green
                {
                    $user->color= '#ADFF2F';
                }
                else if ($request->div_id == 7)//grey
                {
                    $user->color= '#808080';
                }

                $user->venue=$request->venue;
                $user->sec_id=$request->sec_id;
                $user->emp_id=$request->emp_id;
                $user->start=$request->start;
                $user->end=$request->end;
                $user->time_start=$request->time_start;
                $user->time_end=$request->time_end;
                $user->title=$request->title;
                $user->category=$request->category;

                $user->status2=$request->status2;
                $user->status3=$request->status3;
                $user->remarks2=$request->remarks2;

                $user->is_submitted=1;
                $user->is_drafted=1;

                if($request->status == 'Returned')//red
                {

                    $user->status=$request->status;
                    $user->remarks=$request->remarks;
                }//. '-' . $request->posted_date . '_' .+1
                else{
                    $user->remarks=$request->remarks;
                      $user->status=$request->status;
                }

                $user->remarks3=$request->remarks3;
                $user->category=$request->category;

                if($request->hasFile('file'))
                {



                    $pic_emp=$request->file('file');
                    $pic_emp_name=$pic_emp->getClientOriginalName();
                    $pic_emp->move('assets/ScheduleAttachments',$pic_emp_name);
                    $user->file=$pic_emp_name;


                }
            ///////////////////////////is mancom start////////////////////////////////
            if($request->has('roles'))
            {

                    $count140 = implode(',', $request['roles']);

                    $rawSql_count = <<<SQL
                    WITH RECURSIVE cte AS
                            (
                            SELECT 1 i
                            UNION ALL
                            SELECT i + 1 i
                            FROM cte
                            WHERE i + 1 <= ( SELECT DATEDIFF(MAX(end),MIN(start))+1 FROM tbl_user_schedule )
                            ), dmin AS
                            (
                            SELECT MIN(start) AS min_date FROM tbl_user_schedule
                            )


                             select count(sss.emp_id) as emp_id FROM
                                  (
                                    SELECT t2.emp_id,tbl_employee.first_name,tbl_employee.middle_name,tbl_employee.last_name,tbl_employee.is_mancom_committee,
                                    t2.start,t2.end,t2.title,t2.venue,t2.time_start,t2.time_end
                                    FROM cte
                                    LEFT JOIN (SELECT * FROM tbl_user_schedule JOIN dmin ) AS t2
                                        ON DATE_ADD(t2.min_date, INTERVAL i-1 DAY) >= start
                                    AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) <= end
                                    INNER JOIN tbl_employee
                                    ON t2.emp_id=tbl_employee.emp_id


                                    where DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"
                                  AND "$request->time_start" BETWEEN t2.time_start AND t2.time_end and tbl_employee.is_mancom_committee is not true
                                  OR  "$request->time_end" BETWEEN t2.time_start AND t2.time_end AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end" and tbl_employee.is_mancom_committee is not true
                                  OR t2.time_start BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end" and tbl_employee.is_mancom_committee is not true
                                  OR t2.time_end BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end" and tbl_employee.is_mancom_committee is not true

                                 ) as sss

                                  WHERE sss.emp_id in ($count140)
                                  ORDER BY sss.emp_id




                    SQL;


                    $DisplayCountMancom = DB::select($rawSql_count);

                    $ListEmp = [];
                    foreach($DisplayCountMancom as $b)
                    {

                        $ListEmp[]=$b->emp_id;
                    }

                    $count111mancom = implode(',', $ListEmp);

                        if($count111mancom == 0)
                        {

                              $user->save();

                              foreach($request['roles'] as $role)
                              {

                                   $group_test=User::where('emp_id',$role)->firstOrFail();


                                   ScheduleUser::firstOrCreate([
                                        'schedule_id'=>$user['id'],
                                        'emp_id'=>$role,
                                        'title'=>$request->title,
                                        'venue'=>$request->venue,
                                        'attendee_name'=>$group_test['last_name']. ' ' .$group_test['first_name']. ',' .$group_test['middle_name'],
                                        'start'=>$user['start'],
                                        'end'=>$user['end'],
                                        'time_start'=>$user['time_start'],
                                        'time_end'=>$user['time_end']]);
                            }


                         }
                        else
                         {
                            $stringmancoms = implode(',', $request['roles']);

                            $rawSql = <<<SQL
                            WITH RECURSIVE cte AS
                                (
                                SELECT 1 i
                                UNION ALL
                                SELECT i + 1 i
                                FROM cte
                                WHERE i + 1 <= ( SELECT DATEDIFF(MAX(end),MIN(start))+1 FROM tbl_user_schedule )
                                ), dmin AS
                                (
                                SELECT MIN(start) AS min_date FROM tbl_user_schedule
                                )


                            select DISTINCT * FROM
                              (
                                SELECT t2.emp_id,tbl_employee.first_name,tbl_employee.middle_name,tbl_employee.last_name,tbl_employee.is_mancom_committee,
                                t2.start,t2.end,t2.title,t2.venue,t2.time_start,t2.time_end
                                FROM cte
                                LEFT JOIN (SELECT * FROM tbl_user_schedule JOIN dmin ) AS t2
                                    ON DATE_ADD(t2.min_date, INTERVAL i-1 DAY) >= start
                                AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) <= end
                                INNER JOIN tbl_employee
                                ON t2.emp_id=tbl_employee.emp_id



                                where DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"
                              AND "$request->time_start" BETWEEN t2.time_start AND t2.time_end  and tbl_employee.is_mancom_committee is not true
                              OR  "$request->time_end" BETWEEN t2.time_start AND t2.time_end AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end" and tbl_employee.is_mancom_committee is not true
                              OR t2.time_start BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end" and tbl_employee.is_mancom_committee is not true
                              OR t2.time_end BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end" and tbl_employee.is_mancom_committee is not true
                             ) as sss

                              WHERE sss.emp_id in ($stringmancoms)
                              ORDER BY sss.emp_id

                            SQL;

                             $DisplayNamesMancom = DB::select($rawSql);

                                $List = [];
                                foreach($DisplayNamesMancom as $a){

                                    $List[]=$a->first_name. ' ' .$a->middle_name. ' ' .$a->last_name. ' '  . 'What: '  .$a->title. ' Where: '.$a->venue. ' When: ' . ' from ' .$a->start. ' to ' .$a->end. ' Time: ' . ' from ' .$a->time_start. ' to ' .$a->time_end;



                                }


                             return redirect()->back()->withErrors($List)->withInput();


                        }


            }

        ////////////////////////////////is mancom end///////////////////////////////
             elseif($request->has('roles'))
                {

                        $count1 = implode(',', $request['roles']);

                        $rawSql_count = <<<SQL
                        WITH RECURSIVE cte AS
                            (
                            SELECT 1 i
                            UNION ALL
                            SELECT i + 1 i
                            FROM cte
                            WHERE i + 1 <= ( SELECT DATEDIFF(MAX(end),MIN(start))+1 FROM tbl_user_schedule )
                            ), dmin AS
                            (
                            SELECT MIN(start) AS min_date FROM tbl_user_schedule
                            )


                             select count(sss.emp_id) as emp_id FROM
                                  (
                                    SELECT t2.emp_id,tbl_employee.first_name,tbl_employee.middle_name,tbl_employee.last_name,
                                    t2.start,t2.end,t2.title,t2.venue,t2.time_start,t2.time_end
                                    FROM cte
                                    LEFT JOIN (SELECT * FROM tbl_user_schedule JOIN dmin ) AS t2
                                        ON DATE_ADD(t2.min_date, INTERVAL i-1 DAY) >= start
                                    AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) <= end
                                    INNER JOIN tbl_employee
                                    ON t2.emp_id=tbl_employee.emp_id


                                    where DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"
                                  AND "$request->time_start" BETWEEN t2.time_start AND t2.time_end
                                  OR  "$request->time_end" BETWEEN t2.time_start AND t2.time_end AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"
                                  OR t2.time_start BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"
                                  OR t2.time_end BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"

                                 ) as sss

                                  WHERE sss.emp_id in ($count1)
                                  ORDER BY sss.emp_id



                        SQL;


                        $DisplayCount = DB::select($rawSql_count);

                        $ListEmp = [];
                        foreach($DisplayCount as $b)
                        {

                            $ListEmp[]=$b->emp_id;
                        }

                        $count111 = implode(',', $ListEmp);

                            if($count111 == 0)
                            {

                                  $user->save();

                                  foreach($request['roles'] as $role)
                                  {

                                       $group_test=User::where('emp_id',$role)->firstOrFail();


                                       ScheduleUser::firstOrCreate([
                                            'schedule_id'=>$user['id'],
                                            'emp_id'=>$role,
                                            'title'=>$request->title,
                                            'venue'=>$request->venue,
                                            'attendee_name'=>$group_test['last_name']. ' ' .$group_test['first_name']. ',' .$group_test['middle_name'],
                                            'start'=>$user['start'],
                                            'end'=>$user['end'],
                                            'time_start'=>$user['time_start'],
                                            'time_end'=>$user['time_end']]);
                                }


                             }
                            else
                             {
                                $string = implode(',', $request['roles']);

                                $rawSql = <<<SQL
                                WITH RECURSIVE cte AS
                                    (
                                    SELECT 1 i
                                    UNION ALL
                                    SELECT i + 1 i
                                    FROM cte
                                    WHERE i + 1 <= ( SELECT DATEDIFF(MAX(end),MIN(start))+1 FROM tbl_user_schedule )
                                    ), dmin AS
                                    (
                                    SELECT MIN(start) AS min_date FROM tbl_user_schedule
                                    )


                                select DISTINCT * FROM
                                  (
                                    SELECT t2.emp_id,tbl_employee.first_name,tbl_employee.middle_name,tbl_employee.last_name,
                                    t2.start,t2.end,t2.title,t2.venue,t2.time_start,t2.time_end
                                    FROM cte
                                    LEFT JOIN (SELECT * FROM tbl_user_schedule JOIN dmin ) AS t2
                                        ON DATE_ADD(t2.min_date, INTERVAL i-1 DAY) >= start
                                    AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) <= end
                                    INNER JOIN tbl_employee
                                    ON t2.emp_id=tbl_employee.emp_id



                                    where DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"
                                  AND "$request->time_start" BETWEEN t2.time_start AND t2.time_end
                                  OR  "$request->time_end" BETWEEN t2.time_start AND t2.time_end AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"
                                  OR t2.time_start BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"
                                  OR t2.time_end BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"
                                 ) as sss

                                  WHERE sss.emp_id in ($string)
                                  ORDER BY sss.emp_id

                                SQL;

                                 $DisplayNames = DB::select($rawSql);

                                    $List = [];
                                    foreach($DisplayNames as $a){

                                        $List[]=$a->first_name. ' ' .$a->middle_name. ' ' .$a->last_name. ' '  . 'What: '  .$a->title. ' Where: '.$a->venue. ' When: ' . ' from ' .$a->start. ' to ' .$a->end. ' Time: ' . ' from ' .$a->time_start. ' to ' .$a->time_end;



                                    }


                                 return redirect()->back()->withErrors($List)->withInput();


                            }


                }


                session()->flash('success','Schedule Submitted successfully');



        }
        elseif($request->get('action') == 'draft')
        {
            $user=new Schedule;

            $user->posted_by=$request->posted_by;
            $user->posted_date=$request->posted_date;
            $user->office_id=$request->office_id;
            $user->div_id=$request->div_id;


            if($request->sec_id == 13)//red
            {
                $user->color= '#FF0000';
            }
            else if ($request->div_id == 5)//orange
            {
                $user->color= '#FFA500';
            }
            else if ($request->sec_id == 1)//yellow
            {
                $user->color= '#FFFF00';
            }
            else if ($request->sec_id == 12)//green
            {
                $user->color= '#008000';
            }
            else if ($request->sec_id == 2)//blue
            {
                $user->color= '#0000FF';
            }
            else if ($request->div_id == 3)//violet
            {
                $user->color= '#EE82EE';
            }
            else if ($request->div_id == 2)//brown
            {
                $user->color= '#A52A2A';
            }
            else if ($request->div_id == 1)//pink
            {
                $user->color= '#FFC0CB';
            }
            else if ($request->sec_id == 4)//yellow green
            {
                $user->color= '#ADFF2F';
            }
            else if ($request->div_id == 7)//grey
            {
                $user->color= '#808080';
            }








            $user->venue=$request->venue;
            $user->sec_id=$request->sec_id;
            $user->emp_id=$request->emp_id;
            $user->start=$request->start;
            $user->end=$request->end;
            $user->time_start=$request->time_start;
            $user->time_end=$request->time_end;
            $user->title=$request->title;
            $user->category=$request->category;

            $user->status2=$request->status2;
            $user->status3=$request->status3;
            $user->remarks2=$request->remarks2;


            $user->is_submitted=0;
            $user->is_drafted=1;



            if($request->status == 'Returned')//red
            {

                $user->status=$request->status;
                $user->remarks=$request->remarks;
            }//. '-' . $request->posted_date . '_' .+1
            else{
                $user->remarks=$request->remarks;
                  $user->status=$request->status;
            }

            $user->remarks3=$request->remarks3;
            $user->category=$request->category;

            if($request->hasFile('file'))
            {
                $pic_emp=$request->file('file');
                $pic_emp_name=$pic_emp->getClientOriginalName();
                $pic_emp->move('assets/ScheduleAttachments',$pic_emp_name);
                $user->file=$pic_emp_name;


            }


       ///////////////////////////is mancom start////////////////////////////////
       if($request->has('roles'))
       {

               $count140 = implode(',', $request['roles']);

               $rawSql_count = <<<SQL
               WITH RECURSIVE cte AS
                       (
                       SELECT 1 i
                       UNION ALL
                       SELECT i + 1 i
                       FROM cte
                       WHERE i + 1 <= ( SELECT DATEDIFF(MAX(end),MIN(start))+1 FROM tbl_user_schedule )
                       ), dmin AS
                       (
                       SELECT MIN(start) AS min_date FROM tbl_user_schedule
                       )


                        select count(sss.emp_id) as emp_id FROM
                             (
                               SELECT t2.emp_id,tbl_employee.first_name,tbl_employee.middle_name,tbl_employee.last_name,tbl_employee.is_mancom_committee,
                               t2.start,t2.end,t2.title,t2.venue,t2.time_start,t2.time_end
                               FROM cte
                               LEFT JOIN (SELECT * FROM tbl_user_schedule JOIN dmin ) AS t2
                                   ON DATE_ADD(t2.min_date, INTERVAL i-1 DAY) >= start
                               AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) <= end
                               INNER JOIN tbl_employee
                               ON t2.emp_id=tbl_employee.emp_id


                               where DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"
                             AND "$request->time_start" BETWEEN t2.time_start AND t2.time_end and tbl_employee.is_mancom_committee is not true
                             OR  "$request->time_end" BETWEEN t2.time_start AND t2.time_end AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end" and tbl_employee.is_mancom_committee is not true
                             OR t2.time_start BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end" and tbl_employee.is_mancom_committee is not true
                             OR t2.time_end BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end" and tbl_employee.is_mancom_committee is not true

                            ) as sss

                             WHERE sss.emp_id in ($count140)
                             ORDER BY sss.emp_id




               SQL;


               $DisplayCountMancom = DB::select($rawSql_count);

               $ListEmp = [];
               foreach($DisplayCountMancom as $b)
               {

                   $ListEmp[]=$b->emp_id;
               }

               $count111mancom = implode(',', $ListEmp);

                   if($count111mancom == 0)
                   {

                         $user->save();

                         foreach($request['roles'] as $role)
                         {

                              $group_test=User::where('emp_id',$role)->firstOrFail();


                              ScheduleUser::firstOrCreate([
                                   'schedule_id'=>$user['id'],
                                   'emp_id'=>$role,
                                   'title'=>$request->title,
                                   'venue'=>$request->venue,
                                   'attendee_name'=>$group_test['last_name']. ' ' .$group_test['first_name']. ',' .$group_test['middle_name'],
                                   'start'=>$user['start'],
                                   'end'=>$user['end'],
                                   'time_start'=>$user['time_start'],
                                   'time_end'=>$user['time_end']]);
                       }


                    }
                   else
                    {
                       $stringmancoms = implode(',', $request['roles']);

                       $rawSql = <<<SQL
                       WITH RECURSIVE cte AS
                           (
                           SELECT 1 i
                           UNION ALL
                           SELECT i + 1 i
                           FROM cte
                           WHERE i + 1 <= ( SELECT DATEDIFF(MAX(end),MIN(start))+1 FROM tbl_user_schedule )
                           ), dmin AS
                           (
                           SELECT MIN(start) AS min_date FROM tbl_user_schedule
                           )


                       select DISTINCT * FROM
                         (
                           SELECT t2.emp_id,tbl_employee.first_name,tbl_employee.middle_name,tbl_employee.last_name,tbl_employee.is_mancom_committee,
                           t2.start,t2.end,t2.title,t2.venue,t2.time_start,t2.time_end
                           FROM cte
                           LEFT JOIN (SELECT * FROM tbl_user_schedule JOIN dmin ) AS t2
                               ON DATE_ADD(t2.min_date, INTERVAL i-1 DAY) >= start
                           AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) <= end
                           INNER JOIN tbl_employee
                           ON t2.emp_id=tbl_employee.emp_id



                           where DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"
                         AND "$request->time_start" BETWEEN t2.time_start AND t2.time_end  and tbl_employee.is_mancom_committee is not true
                         OR  "$request->time_end" BETWEEN t2.time_start AND t2.time_end AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end" and tbl_employee.is_mancom_committee is not true
                         OR t2.time_start BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end" and tbl_employee.is_mancom_committee is not true
                         OR t2.time_end BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end" and tbl_employee.is_mancom_committee is not true
                        ) as sss

                         WHERE sss.emp_id in ($stringmancoms)
                         ORDER BY sss.emp_id

                       SQL;

                        $DisplayNamesMancom = DB::select($rawSql);

                           $List = [];
                           foreach($DisplayNamesMancom as $a){

                               $List[]=$a->first_name. ' ' .$a->middle_name. ' ' .$a->last_name. ' '  . 'What: '  .$a->title. ' Where: '.$a->venue. ' When: ' . ' from ' .$a->start. ' to ' .$a->end. ' Time: ' . ' from ' .$a->time_start. ' to ' .$a->time_end;



                           }


                        return redirect()->back()->withErrors($List)->withInput();


                   }


       }

      ///////////////////////////is mancom end////////////////////////////////
            elseif($request->has('roles'))
            {

                    $count1 = implode(',', $request['roles']);

                    $rawSql_count = <<<SQL
                    WITH RECURSIVE cte AS
                        (
                        SELECT 1 i
                        UNION ALL
                        SELECT i + 1 i
                        FROM cte
                        WHERE i + 1 <= ( SELECT DATEDIFF(MAX(end),MIN(start))+1 FROM tbl_user_schedule )
                        ), dmin AS
                        (
                        SELECT MIN(start) AS min_date FROM tbl_user_schedule
                        )


                         select count(sss.emp_id) as emp_id FROM
                              (
                                SELECT t2.emp_id,tbl_employee.first_name,tbl_employee.middle_name,tbl_employee.last_name,
                                t2.start,t2.end,t2.title,t2.venue,t2.time_start,t2.time_end
                                FROM cte
                                LEFT JOIN (SELECT * FROM tbl_user_schedule JOIN dmin ) AS t2
                                    ON DATE_ADD(t2.min_date, INTERVAL i-1 DAY) >= start
                                AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) <= end
                                INNER JOIN tbl_employee
                                ON t2.emp_id=tbl_employee.emp_id


                                where DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"
                                  AND "$request->time_start" BETWEEN t2.time_start AND t2.time_end
                                  OR  "$request->time_end" BETWEEN t2.time_start AND t2.time_end AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"
                                  OR t2.time_start BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"
                                  OR t2.time_end BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"
                             ) as sss

                              WHERE sss.emp_id in ($count1)
                              ORDER BY sss.emp_id



                    SQL;


                    $DisplayCount = DB::select($rawSql_count);

                    $ListEmp = [];
                    foreach($DisplayCount as $b)
                    {

                        $ListEmp[]=$b->emp_id;
                    }

                    $count111 = implode(',', $ListEmp);

                        if($count111 == 0)
                        {

                              $user->save();

                              foreach($request['roles'] as $role)
                              {

                                   $group_test=User::where('emp_id',$role)->firstOrFail();


                                   ScheduleUser::firstOrCreate([
                                        'schedule_id'=>$user['id'],
                                        'emp_id'=>$role,
                                        'title'=>$request->title,
                                        'venue'=>$request->venue,
                                        'attendee_name'=>$group_test['last_name']. ' ' .$group_test['first_name']. ',' .$group_test['middle_name'],
                                        'start'=>$user['start'],
                                        'end'=>$user['end'],
                                        'time_start'=>$user['time_start'],
                                        'time_end'=>$user['time_end']]);
                            }


                         }
                        else
                         {
                            $string = implode(',', $request['roles']);

                            $rawSql = <<<SQL
                            WITH RECURSIVE cte AS
                                (
                                SELECT 1 i
                                UNION ALL
                                SELECT i + 1 i
                                FROM cte
                                WHERE i + 1 <= ( SELECT DATEDIFF(MAX(end),MIN(start))+1 FROM tbl_user_schedule )
                                ), dmin AS
                                (
                                SELECT MIN(start) AS min_date FROM tbl_user_schedule
                                )


                            select DISTINCT * FROM
                              (
                                SELECT t2.emp_id,tbl_employee.first_name,tbl_employee.middle_name,tbl_employee.last_name,
                                t2.start,t2.end,t2.title,t2.venue,t2.time_start,t2.time_end
                                FROM cte
                                LEFT JOIN (SELECT * FROM tbl_user_schedule JOIN dmin ) AS t2
                                    ON DATE_ADD(t2.min_date, INTERVAL i-1 DAY) >= start
                                AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) <= end
                                INNER JOIN tbl_employee
                                ON t2.emp_id=tbl_employee.emp_id


                                where DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"
                                  AND "$request->time_start" BETWEEN t2.time_start AND t2.time_end
                                  OR  "$request->time_end" BETWEEN t2.time_start AND t2.time_end AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"
                                  OR t2.time_start BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"
                                  OR t2.time_end BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"
                             ) as sss

                              WHERE sss.emp_id in ($string)
                              ORDER BY sss.emp_id

                            SQL;

                             $DisplayNames = DB::select($rawSql);

                                $List = [];
                                foreach($DisplayNames as $a){

                                    $List[]=$a->first_name. ' ' .$a->middle_name. ' ' .$a->last_name. ' '  . 'What: '  .$a->title. ' Where: '.$a->venue. ' When: ' . ' from ' .$a->start. ' to ' .$a->end. ' Time: ' . ' from ' .$a->time_start. ' to ' .$a->time_end;



                                }


                             return redirect()->back()->withErrors($List)->withInput();


                        }


            }

            session()->flash('success','Schedule Drafted successfully');
        }



                 return redirect()->route('admin.schedule_list');


    }//  $user=Schedule::findOrFail($id);
    public function update(Request $request, $id)
    {



        if ($request->get('action') == 'submit')
         {

            if($request->status == "Approval" || $request->status == "Returned" || $request->status == "Reconsideration" || $request->status2 == "Disapproved" || $request->status2 == "Approved" || $request->status3 == "Conducted")//red
            {
                $user=Schedule::findOrFail($id);

                // $user->posted_by=$request->posted_by;
                // $user->posted_date=$request->posted_date;
                $user->office_id=$request->office_id;
                $user->div_id=$request->div_id;


                if($request->sec_id == 13)//red
                {
                    $user->color= '#FF0000';
                }
                else if ($request->div_id == 5)//orange
                {
                    $user->color= '#FFA500';
                }
                else if ($request->sec_id == 1)//yellow
                {
                    $user->color= '#FFFF00';
                }
                else if ($request->sec_id == 12)//green
                {
                    $user->color= '#008000';
                }
                else if ($request->sec_id == 2)//blue
                {
                    $user->color= '#0000FF';
                }
                else if ($request->div_id == 3)//violet
                {
                    $user->color= '#EE82EE';
                }
                else if ($request->div_id == 2)//brown
                {
                    $user->color= '#A52A2A';
                }
                else if ($request->div_id == 1)//pink
                {
                    $user->color= '#FFC0CB';
                }
                else if ($request->sec_id == 4)//yellow green
                {
                    $user->color= '#ADFF2F';
                }
                else if ($request->div_id == 7)//grey
                {
                    $user->color= '#808080';
                }


                $user->venue=$request->venue;
                $user->sec_id=$request->sec_id;
                // $user->emp_id=$request->emp_id;
                $user->start=$request->start;
                $user->end=$request->end;
                $user->time_start=$request->time_start;
                $user->time_end=$request->time_end;
                $user->title=$request->title;
                $user->category=$request->category;

                // $user->status2=$request->status2;


                $user->is_submitted=1;
                $user->is_drafted=1;

                if($request->status2 == 'Approved')//red
                {

                    $user->status2=$request->status2;

                    $user->remarks2=$request->remarks2;
                }//. '-' . $request->posted_date . '_' .+1


                if($request->status == 'Returned')//red
                {

                    $user->status=$request->status;
                    $user->status2=$request->null;
                    $user->remarks=$request->remarks;
                }//. '-' . $request->posted_date . '_' .+1
                else{
                    $user->remarks=$request->remarks;
                      $user->status=$request->status;
                }
                if($request->status == 'Reconsideration')//red
                {

                    $user->status=$request->status;
                    $user->remarks=$request->remarks;
                }//. '-' . $request->posted_date . '_' .+1
                else{
                    $user->remarks=$request->remarks;
                      $user->status=$request->status;
                }
                if($request->status2 == 'Disapproved')//red
                {
                    $user->status2=$request->status2;
                    $user->status=$request->null;
                    $user->remarks2=$request->remarks2;

                    $user->status3='Cancelled';




                }//. '-' . $request->posted_date . '_' .+1

                $user->status3=$request->status3;
                $user->remarks3=$request->remarks3;
                $user->category=$request->category;

                if($request->hasFile('file'))
                {
                    $pic_emp=$request->file('file');
                    $pic_emp_name=$pic_emp->getClientOriginalName();
                    $pic_emp->move('assets/ScheduleAttachments',$pic_emp_name);
                    $user->file=$pic_emp_name;


                }


                $user->save();

                DB::table('tbl_user_schedule')->where('schedule_id',$id)->delete();

         ///////////////////////////is mancom start////////////////////////////////
         if($request->has('roles'))
         {

                 $count140 = implode(',', $request['roles']);

                 $rawSql_count = <<<SQL
                 WITH RECURSIVE cte AS
                         (
                         SELECT 1 i
                         UNION ALL
                         SELECT i + 1 i
                         FROM cte
                         WHERE i + 1 <= ( SELECT DATEDIFF(MAX(end),MIN(start))+1 FROM tbl_user_schedule )
                         ), dmin AS
                         (
                         SELECT MIN(start) AS min_date FROM tbl_user_schedule
                         )


                          select count(sss.emp_id) as emp_id FROM
                               (
                                 SELECT t2.emp_id,tbl_employee.first_name,tbl_employee.middle_name,tbl_employee.last_name,tbl_employee.is_mancom_committee,
                                 t2.start,t2.end,t2.title,t2.venue,t2.time_start,t2.time_end,tbl_schedule.is_submitted
                                 FROM cte
                                 LEFT JOIN (SELECT * FROM tbl_user_schedule JOIN dmin ) AS t2
                                     ON DATE_ADD(t2.min_date, INTERVAL i-1 DAY) >= start
                                 AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) <= end
                                 INNER JOIN tbl_employee
                                 ON t2.emp_id=tbl_employee.emp_id
                                 INNER JOIN tbl_schedule
                                    ON t2.schedule_id=tbl_schedule.id


                                 where DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"
                               AND "$request->time_start" BETWEEN t2.time_start AND t2.time_end and tbl_employee.is_mancom_committee is not true AND is_submitted is true
                               OR  "$request->time_end" BETWEEN t2.time_start AND t2.time_end AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end" and tbl_employee.is_mancom_committee is not true AND is_submitted is true
                               OR t2.time_start BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end" and tbl_employee.is_mancom_committee is not true AND is_submitted is true
                               OR t2.time_end BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end" and tbl_employee.is_mancom_committee is not true AND is_submitted is true

                              ) as sss

                               WHERE sss.emp_id in ($count140) AND is_submitted is true
                               ORDER BY sss.emp_id




                 SQL;


                 $DisplayCountMancom = DB::select($rawSql_count);

                 $ListEmp = [];
                 foreach($DisplayCountMancom as $b)
                 {

                     $ListEmp[]=$b->emp_id;
                 }

                 $count111mancom = implode(',', $ListEmp);

                     if($count111mancom == 0)
                     {

                        $user->save();
                        DB::table('tbl_user_schedule')->where('schedule_id',$id)->delete();

                           foreach($request['roles'] as $role)
                           {

                                $group_test=User::where('emp_id',$role)->firstOrFail();


                                ScheduleUser::firstOrCreate([
                                     'schedule_id'=>$user['id'],
                                     'emp_id'=>$role,
                                     'title'=>$request->title,
                                     'venue'=>$request->venue,
                                     'attendee_name'=>$group_test['last_name']. ' ' .$group_test['first_name']. ',' .$group_test['middle_name'],
                                     'start'=>$user['start'],
                                     'end'=>$user['end'],
                                     'time_start'=>$user['time_start'],
                                     'time_end'=>$user['time_end']]);
                         }


                      }
                     else
                      {
                         $stringmancoms = implode(',', $request['roles']);

                         $rawSql = <<<SQL
                         WITH RECURSIVE cte AS
                             (
                             SELECT 1 i
                             UNION ALL
                             SELECT i + 1 i
                             FROM cte
                             WHERE i + 1 <= ( SELECT DATEDIFF(MAX(end),MIN(start))+1 FROM tbl_user_schedule )
                             ), dmin AS
                             (
                             SELECT MIN(start) AS min_date FROM tbl_user_schedule
                             )


                         select DISTINCT * FROM
                           (
                             SELECT t2.emp_id,tbl_employee.first_name,tbl_employee.middle_name,tbl_employee.last_name,tbl_employee.is_mancom_committee,
                             t2.start,t2.end,t2.title,t2.venue,t2.time_start,t2.time_end,tbl_schedule.is_submitted
                             FROM cte
                             LEFT JOIN (SELECT * FROM tbl_user_schedule JOIN dmin ) AS t2
                                 ON DATE_ADD(t2.min_date, INTERVAL i-1 DAY) >= start
                             AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) <= end
                             INNER JOIN tbl_employee
                             ON t2.emp_id=tbl_employee.emp_id
                             INNER JOIN tbl_schedule
                                    ON t2.schedule_id=tbl_schedule.id



                             where DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"
                           AND "$request->time_start" BETWEEN t2.time_start AND t2.time_end  and tbl_employee.is_mancom_committee is not true AND is_submitted is true
                           OR  "$request->time_end" BETWEEN t2.time_start AND t2.time_end AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end" and tbl_employee.is_mancom_committee is not true AND is_submitted is true
                           OR t2.time_start BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end" and tbl_employee.is_mancom_committee is not true AND is_submitted is true
                           OR t2.time_end BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end" and tbl_employee.is_mancom_committee is not true AND is_submitted is true
                          ) as sss

                           WHERE sss.emp_id in ($stringmancoms) AND is_submitted is true
                           ORDER BY sss.emp_id

                         SQL;

                          $DisplayNamesMancom = DB::select($rawSql);

                             $List = [];
                             foreach($DisplayNamesMancom as $a){

                                 $List[]=$a->first_name. ' ' .$a->middle_name. ' ' .$a->last_name. ' '  . 'What: '  .$a->title. ' Where: '.$a->venue. ' When: ' . ' from ' .$a->start. ' to ' .$a->end. ' Time: ' . ' from ' .$a->time_start. ' to ' .$a->time_end;



                             }


                          return redirect()->back()->withErrors($List)->withInput();


                     }


         }

     ////////////////////////////////is mancom end///////////////////////////////


                elseif($request->has('roles'))
                {

                    $user->save();
                    DB::table('tbl_user_schedule')->where('schedule_id',$id)->delete();

                 foreach($request['roles'] as $role)
                 {

                      $group_test=User::where('emp_id',$role)->firstOrFail();


                      ScheduleUser::firstOrCreate([
                           'schedule_id'=>$user['id'],
                           'emp_id'=>$role,
                           'title'=>$request->title,
                           'venue'=>$request->venue,
                           'attendee_name'=>$group_test['last_name']. ' ' .$group_test['first_name']. ',' .$group_test['middle_name'],
                           'start'=>$user['start'],
                           'end'=>$user['end'],
                           'time_start'=>$user['time_start'],
                           'time_end'=>$user['time_end']]);
                  }
                 }


                 session()->flash('success','Submitted successfully');

            }
            else
            {


                $user=Schedule::findOrFail($id);
                // $user->posted_by=$request->posted_by;
                // $user->posted_date=$request->posted_date;
                $user->office_id=$request->office_id;
                $user->div_id=$request->div_id;


                if($request->sec_id == 13)//red
                {
                    $user->color= '#FF0000';
                }
                else if ($request->div_id == 5)//orange
                {
                    $user->color= '#FFA500';
                }
                else if ($request->sec_id == 1)//yellow
                {
                    $user->color= '#FFFF00';
                }
                else if ($request->sec_id == 12)//green
                {
                    $user->color= '#008000';
                }
                else if ($request->sec_id == 2)//blue
                {
                    $user->color= '#0000FF';
                }
                else if ($request->div_id == 3)//violet
                {
                    $user->color= '#EE82EE';
                }
                else if ($request->div_id == 2)//brown
                {
                    $user->color= '#A52A2A';
                }
                else if ($request->div_id == 1)//pink
                {
                    $user->color= '#FFC0CB';
                }
                else if ($request->sec_id == 4)//yellow green
                {
                    $user->color= '#ADFF2F';
                }
                else if ($request->div_id == 7)//grey
                {
                    $user->color= '#808080';
                }

                $user->venue=$request->venue;
                $user->sec_id=$request->sec_id;
                // $user->emp_id=$request->emp_id;
                $user->start=$request->start;
                $user->end=$request->end;
                $user->time_start=$request->time_start;
                $user->time_end=$request->time_end;
                $user->title=$request->title;
                $user->category=$request->category;

                $user->status2=$request->status2;
                $user->status3=$request->status3;
                $user->remarks2=$request->remarks2;

                $user->is_submitted=1;
                $user->is_drafted=1;

                if($request->status2 == 'Approved')//red
                {

                    $user->status2=$request->status2;

                    $user->remarks2=$request->remarks2;
                }//. '-' . $request->posted_date . '_' .+1


                if($request->status == 'Returned')//red
                {

                    $user->status=$request->status;
                    $user->status2=$request->null;
                    $user->remarks=$request->remarks;
                }//. '-' . $request->posted_date . '_' .+1
                else{
                    $user->remarks=$request->remarks;
                      $user->status=$request->status;
                }
                if($request->status == 'Reconsideration')//red
                {

                    $user->status=$request->status;
                    $user->remarks=$request->remarks;
                }//. '-' . $request->posted_date . '_' .+1
                else{
                    $user->remarks=$request->remarks;
                      $user->status=$request->status;
                }
                if($request->status2 == 'Disapproved')//red
                {
                    $user->status2=$request->status2;
                    $user->status=$request->null;
                    $user->remarks2=$request->remarks2;

                    $user->status3='Cancelled';




                }//. '-' . $request->posted_date . '_' .+1


                $user->remarks3=$request->remarks3;
                $user->category=$request->category;
        //   $this->validate($request, [
        //                 'file' => 'required|file|mimes:jpg,png,jpeg,gif,svg|max:2048'
        //             ]);
                if($request->hasFile('file'))
                {



                    $pic_emp=$request->file('file');
                    $pic_emp_name=$pic_emp->getClientOriginalName();
                    $pic_emp->move('assets/ScheduleAttachments',$pic_emp_name);
                    $user->file=$pic_emp_name;


                }


         ///////////////////////////is mancom start////////////////////////////////
         if($request->has('roles'))
         {

                 $count140 = implode(',', $request['roles']);

                 $rawSql_count = <<<SQL
                 WITH RECURSIVE cte AS
                         (
                         SELECT 1 i
                         UNION ALL
                         SELECT i + 1 i
                         FROM cte
                         WHERE i + 1 <= ( SELECT DATEDIFF(MAX(end),MIN(start))+1 FROM tbl_user_schedule )
                         ), dmin AS
                         (
                         SELECT MIN(start) AS min_date FROM tbl_user_schedule
                         )


                          select count(sss.emp_id) as emp_id FROM
                               (
                                 SELECT t2.emp_id,tbl_employee.first_name,tbl_employee.middle_name,tbl_employee.last_name,tbl_employee.is_mancom_committee,
                                 t2.start,t2.end,t2.title,t2.venue,t2.time_start,t2.time_end,tbl_schedule.is_submitted
                             FROM cte
                             LEFT JOIN (SELECT * FROM tbl_user_schedule JOIN dmin ) AS t2
                                 ON DATE_ADD(t2.min_date, INTERVAL i-1 DAY) >= start
                             AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) <= end
                             INNER JOIN tbl_employee
                             ON t2.emp_id=tbl_employee.emp_id
                             INNER JOIN tbl_schedule
                                    ON t2.schedule_id=tbl_schedule.id


                                 where DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"
                               AND "$request->time_start" BETWEEN t2.time_start AND t2.time_end and tbl_employee.is_mancom_committee is not true AND is_submitted is true
                               OR  "$request->time_end" BETWEEN t2.time_start AND t2.time_end AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end" and tbl_employee.is_mancom_committee is not true AND is_submitted is true
                               OR t2.time_start BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end" and tbl_employee.is_mancom_committee is not true AND is_submitted is true
                               OR t2.time_end BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end" and tbl_employee.is_mancom_committee is not true AND is_submitted is true

                              ) as sss

                               WHERE sss.emp_id in ($count140) AND is_submitted is true
                               ORDER BY sss.emp_id




                 SQL;


                 $DisplayCountMancom = DB::select($rawSql_count);

                 $ListEmp = [];
                 foreach($DisplayCountMancom as $b)
                 {

                     $ListEmp[]=$b->emp_id;
                 }

                 $count111mancom = implode(',', $ListEmp);

                     if($count111mancom == 0)
                     {

                            $user->save();
                       DB::table('tbl_user_schedule')->where('schedule_id',$id)->delete();

                           foreach($request['roles'] as $role)
                           {

                                $group_test=User::where('emp_id',$role)->firstOrFail();


                                ScheduleUser::firstOrCreate([
                                     'schedule_id'=>$user['id'],
                                     'emp_id'=>$role,
                                     'title'=>$request->title,
                                     'venue'=>$request->venue,
                                     'attendee_name'=>$group_test['last_name']. ' ' .$group_test['first_name']. ',' .$group_test['middle_name'],
                                     'start'=>$user['start'],
                                     'end'=>$user['end'],
                                     'time_start'=>$user['time_start'],
                                     'time_end'=>$user['time_end']]);
                         }


                      }
                     else
                      {
                         $stringmancoms = implode(',', $request['roles']);

                         $rawSql = <<<SQL
                         WITH RECURSIVE cte AS
                             (
                             SELECT 1 i
                             UNION ALL
                             SELECT i + 1 i
                             FROM cte
                             WHERE i + 1 <= ( SELECT DATEDIFF(MAX(end),MIN(start))+1 FROM tbl_user_schedule )
                             ), dmin AS
                             (
                             SELECT MIN(start) AS min_date FROM tbl_user_schedule
                             )


                         select DISTINCT * FROM
                           (
                             SELECT t2.emp_id,tbl_employee.first_name,tbl_employee.middle_name,tbl_employee.last_name,tbl_employee.is_mancom_committee,
                             t2.start,t2.end,t2.title,t2.venue,t2.time_start,t2.time_end,tbl_schedule.is_submitted
                             FROM cte
                             LEFT JOIN (SELECT * FROM tbl_user_schedule JOIN dmin ) AS t2
                                 ON DATE_ADD(t2.min_date, INTERVAL i-1 DAY) >= start
                             AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) <= end
                             INNER JOIN tbl_employee
                             ON t2.emp_id=tbl_employee.emp_id
                             INNER JOIN tbl_schedule
                                    ON t2.schedule_id=tbl_schedule.id



                             where DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"
                           AND "$request->time_start" BETWEEN t2.time_start AND t2.time_end  and tbl_employee.is_mancom_committee is not true AND is_submitted is true
                           OR  "$request->time_end" BETWEEN t2.time_start AND t2.time_end AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end" and tbl_employee.is_mancom_committee is not true AND is_submitted is true
                           OR t2.time_start BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end" and tbl_employee.is_mancom_committee is not true AND is_submitted is true
                           OR t2.time_end BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end" and tbl_employee.is_mancom_committee is not true AND is_submitted is true
                          ) as sss

                           WHERE sss.emp_id in ($stringmancoms) AND is_submitted is true
                           ORDER BY sss.emp_id

                         SQL;

                          $DisplayNamesMancom = DB::select($rawSql);

                             $List = [];
                             foreach($DisplayNamesMancom as $a){

                                 $List[]=$a->first_name. ' ' .$a->middle_name. ' ' .$a->last_name. ' '  . 'What: '  .$a->title. ' Where: '.$a->venue. ' When: ' . ' from ' .$a->start. ' to ' .$a->end. ' Time: ' . ' from ' .$a->time_start. ' to ' .$a->time_end;



                             }


                          return redirect()->back()->withErrors($List)->withInput();


                     }


         }

     ////////////////////////////////is mancom end///////////////////////////////

                elseif($request->has('roles'))
                {

                        $count1 = implode(',', $request['roles']);

                        $rawSql_count = <<<SQL
                        WITH RECURSIVE cte AS
                            (
                            SELECT 1 i
                            UNION ALL
                            SELECT i + 1 i
                            FROM cte
                            WHERE i + 1 <= ( SELECT DATEDIFF(MAX(end),MIN(start))+1 FROM tbl_user_schedule )
                            ), dmin AS
                            (
                            SELECT MIN(start) AS min_date FROM tbl_user_schedule
                            )


                             select count(sss.emp_id) as emp_id FROM
                                  (
                                    SELECT t2.emp_id,tbl_employee.first_name,tbl_employee.middle_name,tbl_employee.last_name,
                                    t2.start,t2.end,t2.title,t2.venue,t2.time_start,t2.time_end,tbl_schedule.is_submitted
                                    FROM cte
                                    LEFT JOIN (SELECT * FROM tbl_user_schedule JOIN dmin ) AS t2
                                        ON DATE_ADD(t2.min_date, INTERVAL i-1 DAY) >= start
                                    AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) <= end
                                    INNER JOIN tbl_employee
                                    ON t2.emp_id=tbl_employee.emp_id
                                    INNER JOIN tbl_schedule
                                    ON t2.schedule_id=tbl_schedule.id



                                  where DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"
                                  AND "$request->time_start" BETWEEN t2.time_start AND t2.time_end
                                  AND is_submitted is true
                                  OR  "$request->time_end" BETWEEN t2.time_start AND t2.time_end AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"  AND is_submitted is true
                                  OR t2.time_start BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"  AND is_submitted is true
                                  OR t2.time_end BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"  AND is_submitted is true

                                 ) as sss

                                  WHERE sss.emp_id in ($count1)  AND is_submitted is true
                                  ORDER BY sss.emp_id



                        SQL;


                        $DisplayCount = DB::select($rawSql_count);

                        $ListEmp = [];
                        foreach($DisplayCount as $b)
                        {

                            $ListEmp[]=$b->emp_id;
                        }

                        $count111 = implode(',', $ListEmp);

                            if($count111 == 0)
                            {

                                  $user->save();
                                  DB::table('tbl_user_schedule')->where('schedule_id',$id)->delete();

                                  foreach($request['roles'] as $role)
                                  {

                                       $group_test=User::where('emp_id',$role)->firstOrFail();


                                       ScheduleUser::firstOrCreate([
                                            'schedule_id'=>$user['id'],
                                            'emp_id'=>$role,
                                            'title'=>$request->title,
                                            'venue'=>$request->venue,
                                            'attendee_name'=>$group_test['last_name']. ' ' .$group_test['first_name']. ',' .$group_test['middle_name'],
                                            'start'=>$user['start'],
                                            'end'=>$user['end'],
                                            'time_start'=>$user['time_start'],
                                            'time_end'=>$user['time_end']]);
                                }


                             }
                            else
                             {
                                $string = implode(',', $request['roles']);

                                $rawSql = <<<SQL
                                WITH RECURSIVE cte AS
                                    (
                                    SELECT 1 i
                                    UNION ALL
                                    SELECT i + 1 i
                                    FROM cte
                                    WHERE i + 1 <= ( SELECT DATEDIFF(MAX(end),MIN(start))+1 FROM tbl_user_schedule )
                                    ), dmin AS
                                    (
                                    SELECT MIN(start) AS min_date FROM tbl_user_schedule
                                    )


                                select DISTINCT * FROM
                                  (
                                    SELECT t2.emp_id,tbl_employee.first_name,tbl_employee.middle_name,tbl_employee.last_name,
                                    t2.start,t2.end,t2.title,t2.venue,t2.time_start,t2.time_end,tbl_schedule.is_submitted
                                    FROM cte
                                    LEFT JOIN (SELECT * FROM tbl_user_schedule JOIN dmin ) AS t2
                                        ON DATE_ADD(t2.min_date, INTERVAL i-1 DAY) >= start
                                    AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) <= end
                                    INNER JOIN tbl_employee
                                    ON t2.emp_id=tbl_employee.emp_id
                                    INNER JOIN tbl_schedule
                                    ON t2.schedule_id=tbl_schedule.id

                                    where DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"
                                  AND "$request->time_start" BETWEEN t2.time_start AND t2.time_end
                                  AND is_submitted is true
                                  OR  "$request->time_end" BETWEEN t2.time_start AND t2.time_end AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"  AND is_submitted is true
                                  OR t2.time_start BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"  AND is_submitted is true
                                  OR t2.time_end BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"  AND is_submitted is true


                                 ) as sss

                                  WHERE sss.emp_id in ($string)  AND is_submitted is true
                                  ORDER BY sss.emp_id

                                SQL;

                                 $DisplayNames = DB::select($rawSql);

                                    $List = [];
                                    foreach($DisplayNames as $a){

                                        $List[]=$a->first_name. ' ' .$a->middle_name. ' ' .$a->last_name. ' '  . 'What: '  .$a->title. ' Where: '.$a->venue. ' When: ' . ' from ' .$a->start. ' to ' .$a->end. ' Time: ' . ' from ' .$a->time_start. ' to ' .$a->time_end;



                                    }


                                 return redirect()->back()->withErrors($List)->withInput();


                            }


                }



                session()->flash('success','Schedule Submitted successfully');
            }





        }
        elseif($request->get('action') == 'draft')
        {
            $user=Schedule::findOrFail($id);

            // $user->posted_by=$request->posted_by;
            // $user->posted_date=$request->posted_date;
            $user->office_id=$request->office_id;
            $user->div_id=$request->div_id;


            if($request->sec_id == 13)//red
            {
                $user->color= '#FF0000';
            }
            else if ($request->div_id == 5)//orange
            {
                $user->color= '#FFA500';
            }
            else if ($request->sec_id == 1)//yellow
            {
                $user->color= '#FFFF00';
            }
            else if ($request->sec_id == 12)//green
            {
                $user->color= '#008000';
            }
            else if ($request->sec_id == 2)//blue
            {
                $user->color= '#0000FF';
            }
            else if ($request->div_id == 3)//violet
            {
                $user->color= '#EE82EE';
            }
            else if ($request->div_id == 2)//brown
            {
                $user->color= '#A52A2A';
            }
            else if ($request->div_id == 1)//pink
            {
                $user->color= '#FFC0CB';
            }
            else if ($request->sec_id == 4)//yellow green
            {
                $user->color= '#ADFF2F';
            }
            else if ($request->div_id == 7)//grey
            {
                $user->color= '#808080';
            }


            $user->venue=$request->venue;
            $user->sec_id=$request->sec_id;
            // $user->emp_id=$request->emp_id;
            $user->start=$request->start;
            $user->end=$request->end;
            $user->time_start=$request->time_start;
            $user->time_end=$request->time_end;
            $user->title=$request->title;
            $user->category=$request->category;

            $user->status2=$request->status2;
            $user->status3=$request->status3;
            $user->remarks2=$request->remarks2;


            $user->is_submitted=0;
            $user->is_drafted=1;



            if($request->status == 'Returned')//red
            {

                $user->status=$request->status;
                $user->remarks=$request->remarks;
            }
            else{
                $user->remarks=$request->remarks;
                  $user->status=$request->status;
            }

            $user->remarks3=$request->remarks3;
            $user->category=$request->category;

            if($request->hasFile('file'))
            {
                $pic_emp=$request->file('file');
                $pic_emp_name=$pic_emp->getClientOriginalName();
                $pic_emp->move('assets/ScheduleAttachments',$pic_emp_name);
                $user->file=$pic_emp_name;


            }

     ///////////////////////////is mancom start////////////////////////////////
     if($request->has('roles'))
     {

             $count140 = implode(',', $request['roles']);

             $rawSql_count = <<<SQL
             WITH RECURSIVE cte AS
                     (
                     SELECT 1 i
                     UNION ALL
                     SELECT i + 1 i
                     FROM cte
                     WHERE i + 1 <= ( SELECT DATEDIFF(MAX(end),MIN(start))+1 FROM tbl_user_schedule )
                     ), dmin AS
                     (
                     SELECT MIN(start) AS min_date FROM tbl_user_schedule
                     )


                      select count(sss.emp_id) as emp_id FROM
                           (
                             SELECT t2.emp_id,tbl_employee.first_name,tbl_employee.middle_name,tbl_employee.last_name,tbl_employee.is_mancom_committee,
                             t2.start,t2.end,t2.title,t2.venue,t2.time_start,t2.time_end,tbl_schedule.is_submitted
                             FROM cte
                             LEFT JOIN (SELECT * FROM tbl_user_schedule JOIN dmin ) AS t2
                                 ON DATE_ADD(t2.min_date, INTERVAL i-1 DAY) >= start
                             AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) <= end
                             INNER JOIN tbl_employee
                             ON t2.emp_id=tbl_employee.emp_id
                             INNER JOIN tbl_schedule
                                    ON t2.schedule_id=tbl_schedule.id


                             where DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"
                           AND "$request->time_start" BETWEEN t2.time_start AND t2.time_end and tbl_employee.is_mancom_committee is not true AND is_submitted is true
                           OR  "$request->time_end" BETWEEN t2.time_start AND t2.time_end AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end" and tbl_employee.is_mancom_committee is not true AND is_submitted is true
                           OR t2.time_start BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end" and tbl_employee.is_mancom_committee is not true AND is_submitted is true
                           OR t2.time_end BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end" and tbl_employee.is_mancom_committee is not true AND is_submitted is true

                          ) as sss

                           WHERE sss.emp_id in ($count140) AND is_submitted is true
                           ORDER BY sss.emp_id




             SQL;


             $DisplayCountMancom = DB::select($rawSql_count);

             $ListEmp = [];
             foreach($DisplayCountMancom as $b)
             {

                 $ListEmp[]=$b->emp_id;
             }

             $count111mancom = implode(',', $ListEmp);

                 if($count111mancom == 0)
                 {

                       $user->save();
                       DB::table('tbl_user_schedule')->where('schedule_id',$id)->delete();
                       foreach($request['roles'] as $role)
                       {

                            $group_test=User::where('emp_id',$role)->firstOrFail();


                            ScheduleUser::firstOrCreate([
                                 'schedule_id'=>$user['id'],
                                 'emp_id'=>$role,
                                 'title'=>$request->title,
                                 'venue'=>$request->venue,
                                 'attendee_name'=>$group_test['last_name']. ' ' .$group_test['first_name']. ',' .$group_test['middle_name'],
                                 'start'=>$user['start'],
                                 'end'=>$user['end'],
                                 'time_start'=>$user['time_start'],
                                 'time_end'=>$user['time_end']]);
                     }


                  }
                 else
                  {
                     $stringmancoms = implode(',', $request['roles']);

                     $rawSql = <<<SQL
                     WITH RECURSIVE cte AS
                         (
                         SELECT 1 i
                         UNION ALL
                         SELECT i + 1 i
                         FROM cte
                         WHERE i + 1 <= ( SELECT DATEDIFF(MAX(end),MIN(start))+1 FROM tbl_user_schedule )
                         ), dmin AS
                         (
                         SELECT MIN(start) AS min_date FROM tbl_user_schedule
                         )


                     select DISTINCT * FROM
                       (
                         SELECT t2.emp_id,tbl_employee.first_name,tbl_employee.middle_name,tbl_employee.last_name,tbl_employee.is_mancom_committee,
                         t2.start,t2.end,t2.title,t2.venue,t2.time_start,t2.time_end,tbl_schedule.is_submitted
                         FROM cte
                         LEFT JOIN (SELECT * FROM tbl_user_schedule JOIN dmin ) AS t2
                             ON DATE_ADD(t2.min_date, INTERVAL i-1 DAY) >= start
                         AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) <= end
                         INNER JOIN tbl_employee
                         ON t2.emp_id=tbl_employee.emp_id
                         INNER JOIN tbl_schedule
                                    ON t2.schedule_id=tbl_schedule.id



                         where DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"
                       AND "$request->time_start" BETWEEN t2.time_start AND t2.time_end  and tbl_employee.is_mancom_committee is not true AND is_submitted is true
                       OR  "$request->time_end" BETWEEN t2.time_start AND t2.time_end AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end" and tbl_employee.is_mancom_committee is not true AND is_submitted is true
                       OR t2.time_start BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end" and tbl_employee.is_mancom_committee is not true AND is_submitted is true
                       OR t2.time_end BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end" and tbl_employee.is_mancom_committee is not true AND is_submitted is true
                      ) as sss

                       WHERE sss.emp_id in ($stringmancoms) AND is_submitted is true
                       ORDER BY sss.emp_id

                     SQL;

                      $DisplayNamesMancom = DB::select($rawSql);

                         $List = [];
                         foreach($DisplayNamesMancom as $a){

                             $List[]=$a->first_name. ' ' .$a->middle_name. ' ' .$a->last_name. ' '  . 'What: '  .$a->title. ' Where: '.$a->venue. ' When: ' . ' from ' .$a->start. ' to ' .$a->end. ' Time: ' . ' from ' .$a->time_start. ' to ' .$a->time_end;



                         }


                      return redirect()->back()->withErrors($List)->withInput();


                 }


     }

 ////////////////////////////////is mancom end///////////////////////////////


            elseif($request->has('roles'))
            {

                    $count1 = implode(',', $request['roles']);

                    $rawSql_count = <<<SQL
                    WITH RECURSIVE cte AS
                        (
                        SELECT 1 i
                        UNION ALL
                        SELECT i + 1 i
                        FROM cte
                        WHERE i + 1 <= ( SELECT DATEDIFF(MAX(end),MIN(start))+1 FROM tbl_user_schedule )
                        ), dmin AS
                        (
                        SELECT MIN(start) AS min_date FROM tbl_user_schedule
                        )


                         select count(sss.emp_id) as emp_id FROM
                              (
                                SELECT t2.emp_id,tbl_employee.first_name,tbl_employee.middle_name,tbl_employee.last_name,
                                t2.start,t2.end,t2.title,t2.venue,t2.time_start,t2.time_end,tbl_schedule.is_submitted
                                FROM cte
                                LEFT JOIN (SELECT * FROM tbl_user_schedule JOIN dmin ) AS t2
                                    ON DATE_ADD(t2.min_date, INTERVAL i-1 DAY) >= start
                                AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) <= end
                                INNER JOIN tbl_employee
                                ON t2.emp_id=tbl_employee.emp_id
                                INNER JOIN tbl_schedule
                                    ON t2.schedule_id=tbl_schedule.id

                                    where DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"
                                  AND "$request->time_start" BETWEEN t2.time_start AND t2.time_end
                                  AND is_submitted is true
                                  OR  "$request->time_end" BETWEEN t2.time_start AND t2.time_end AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"  AND is_submitted is true
                                  OR t2.time_start BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"  AND is_submitted is true
                                  OR t2.time_end BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"  AND is_submitted is true


                             ) as sss

                              WHERE sss.emp_id in ($count1) AND is_submitted is true
                              ORDER BY sss.emp_id



                    SQL;


                    $DisplayCount = DB::select($rawSql_count);

                    $ListEmp = [];
                    foreach($DisplayCount as $b)
                    {

                        $ListEmp[]=$b->emp_id;
                    }

                    $count111 = implode(',', $ListEmp);

                        if($count111 == 0)
                        {

                              $user->save();
                              DB::table('tbl_user_schedule')->where('schedule_id',$id)->delete();
                              foreach($request['roles'] as $role)
                              {

                                   $group_test=User::where('emp_id',$role)->firstOrFail();


                                   ScheduleUser::firstOrCreate([
                                        'schedule_id'=>$user['id'],
                                        'emp_id'=>$role,
                                        'title'=>$request->title,
                                        'venue'=>$request->venue,
                                        'attendee_name'=>$group_test['last_name']. ' ' .$group_test['first_name']. ',' .$group_test['middle_name'],
                                        'start'=>$user['start'],
                                        'end'=>$user['end'],
                                        'time_start'=>$user['time_start'],
                                        'time_end'=>$user['time_end']]);
                            }


                         }
                        else
                         {
                            $string = implode(',', $request['roles']);

                            $rawSql = <<<SQL
                            WITH RECURSIVE cte AS
                                (
                                SELECT 1 i
                                UNION ALL
                                SELECT i + 1 i
                                FROM cte
                                WHERE i + 1 <= ( SELECT DATEDIFF(MAX(end),MIN(start))+1 FROM tbl_user_schedule )
                                ), dmin AS
                                (
                                SELECT MIN(start) AS min_date FROM tbl_user_schedule
                                )


                            select DISTINCT * FROM
                              (
                                SELECT t2.emp_id,tbl_employee.first_name,tbl_employee.middle_name,tbl_employee.last_name,
                                t2.start,t2.end,t2.title,t2.venue,t2.time_start,t2.time_end,tbl_schedule.is_submitted
                                FROM cte
                                LEFT JOIN (SELECT * FROM tbl_user_schedule JOIN dmin ) AS t2
                                    ON DATE_ADD(t2.min_date, INTERVAL i-1 DAY) >= start
                                AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) <= end
                                INNER JOIN tbl_employee
                                ON t2.emp_id=tbl_employee.emp_id
                                INNER JOIN tbl_schedule
                                    ON t2.schedule_id=tbl_schedule.id


                                    where DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"
                                  AND "$request->time_start" BETWEEN t2.time_start AND t2.time_end
                                  AND is_submitted is true
                                  OR  "$request->time_end" BETWEEN t2.time_start AND t2.time_end AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"  AND is_submitted is true
                                  OR t2.time_start BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"  AND is_submitted is true
                                  OR t2.time_end BETWEEN "$request->time_start" AND "$request->time_end" AND DATE_ADD(t2.min_date, INTERVAL i-1 DAY) between "$request->start" and "$request->end"  AND is_submitted is true


                             ) as sss

                              WHERE sss.emp_id in ($string) AND is_submitted is true
                              ORDER BY sss.emp_id

                            SQL;

                             $DisplayNames = DB::select($rawSql);

                                $List = [];
                                foreach($DisplayNames as $a){

                                    $List[]=$a->first_name. ' ' .$a->middle_name. ' ' .$a->last_name. ' '  . 'What: '  .$a->title. ' Where: '.$a->venue. ' When: ' . ' from ' .$a->start. ' to ' .$a->end. ' Time: ' . ' from ' .$a->time_start. ' to ' .$a->time_end;



                                }


                             return redirect()->back()->withErrors($List)->withInput();


                        }


            }

            session()->flash('success','Schedule Drafted successfully');
        }



                 return redirect()->route('admin.schedule_list');






    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $scheduleuser=ScheduleUser::where('schedule_id',$id)->first();

         $user=Schedule::where('id',$id)->first();

         $positions = \DB::table('tbl_util_position')->orderBy('pos_desc','asc')->get();

         $roles = Attendee::all();

        return view('admin.schedules.edit',compact('user','roles','positions','scheduleuser'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function schedule_list()
    {
        $users=Schedule::where('id',120)->get();
        return view('admin.schedules.schedule_list',compact('users'));
    }
    public function schedule_list_encoder()
    {
        $users=Schedule::where('id',0)->get();
       // dd($users);
      return view('admin.schedules.schedule_list_encoder',compact('users'));
    }
    public function schedule_list_srmu()
    {
        $users=Schedule::where('id',120)->get();
        return view('admin.schedules.schedule_list_srmu',compact('users'));
    }
    public function schedule_list_rd()
    {
        $users=Schedule::where('id',120)->get();
        return view('admin.schedules.schedule_list_rd',compact('users'));
    }
    public function show($id)
    {
        $user=Schedule::findOrFail($id);
        return view('admin.schedules.show',compact('user'));
    }
    public function schedule_popup($id)
    {
        try
        {

            $user=Schedule::findOrFail($id);
            $roles=Attendee::all();
            $user_attendee=User::all();

        return view('admin.schedules.schedule_popup',compact('user','roles','user_attendee'));

        }
        catch (\Exception $e)
        {
            dd($e -> getMessage());
        }
    }

    public function schedule_view($id)
    {
        //  $scheduleuser=ScheduleUser::where('schedule_id',$id)->first();

        //  $user=Schedule::where('id',$id)->first();

        // $positions = \DB::table('tbl_util_position')->orderBy('pos_desc','asc')->get();

        // $roles = Attendee::all();


        $scheduleuser = DB::table('tbl_schedule')
        ->select(['tbl_user_schedule.schedule_id','tbl_schedule.title', 'tbl_schedule.venue','tbl_schedule.start','tbl_schedule.end', 'tbl_schedule.time_start','tbl_schedule.time_end',  'tbl_schedule.attendee_name', 'tbl_schedule.status3'])
        ->join('tbl_user_schedule', 'tbl_schedule.id', '=', 'tbl_user_schedule.schedule_id')
        // ->join('add_entry_weight_category', 'add_entry_main_schedule.weight_gap', '=', 'add_entry_weight_category.id')

        ->where('tbl_user_schedule.schedule_id',$id)

        ->groupBy('tbl_user_schedule.schedule_id','tbl_schedule.title', 'tbl_schedule.venue','tbl_schedule.start','tbl_schedule.end', 'tbl_schedule.time_start','tbl_schedule.time_end','tbl_schedule.attendee_name','tbl_schedule.status3')

        ->get();

//dd($scheduleuser);

       return view('admin.schedules.schedule_view',compact('scheduleuser'));

    }
    public function calendar_show_emp_id($emp_id)
    {

        $users = DB::table('tbl_schedule')
        ->select(['tbl_schedule.emp_id','last_name','middle_name','first_name'])
        ->join('tbl_employee', 'tbl_schedule.emp_id', '=', 'tbl_employee.emp_id')
        ->where('id',2)
        ->get();

        $roles = Schedule::select('tbl_schedule.emp_id','last_name','middle_name','first_name')
        ->join('tbl_employee', 'tbl_schedule.emp_id', '=', 'tbl_employee.emp_id')
        ->distinct()
        ->get();










       $events = [];
       $data = \DB::table('tbl_schedule')
       ->where('status2','Approved')
       ->where('is_submitted',1)
        ->where('emp_id',$emp_id)
       ->get();

        if($data->count())
         {
            foreach ($data as $key => $value)
            {
                $events[] = Calendar::event(
                    'WHAT:' . ' ' . $value->title, //. ' ' . 'WHERE:' . ' ' . $value->venue
                    true,
                    new \DateTime($value->start),
                    new \DateTime($value->end.'+1 day'),
                    null,
                 [
                    'color'=> $value->color,
                    //  'textColor' => $value->textColor,
                    'url' => '/admin/get_schedule_view/' .$value->id. ''

                 ]

                );

            }
        }
                $calendar =\Calendar::addEvents($events);
                return view('admin.schedules.calendar_show',compact('events','roles','calendar','users'));
    }
    public function calendar_show_id($id)
    {

        $events = [];
       // $data = Schedule::where('status2','Approved')->first();
       $data = \DB::table('tbl_schedule')
       ->where('status2','Approved')
       ->where('is_submitted',1)
       ->where('id',$id)
       ->get();


       // $scheduleuser=ScheduleUser::where('schedule_id',$id)->first();
        if($data->count())
         {
            foreach ($data as $key => $value)
            {
                $events[] = Calendar::event(
                    'WHAT:' . ' ' . $value->title, //. ' ' . 'WHERE:' . ' ' . $value->venue
                    true,
                    new \DateTime($value->start),
                    new \DateTime($value->end.'+1 day'),
                    null,
                 [
                    'color'=> $value->color,
                    //  'textColor' => $value->textColor,
                    'url' => '/admin/get_schedule_view/' .$value->id. ''

                 ]

                );

            }
        }
                $calendar =\Calendar::addEvents($events);
                return view('admin.schedules.calendar_show',compact('events','calendar'));
    }
    public function calendar_show()
    {

        $users = DB::table('tbl_schedule')
        ->select(['tbl_schedule.emp_id','last_name','middle_name','first_name'])
        ->join('tbl_employee', 'tbl_schedule.emp_id', '=', 'tbl_employee.emp_id')

        ->get();


        $roles = Schedule::select('tbl_schedule.emp_id','last_name','middle_name','first_name')
        ->join('tbl_employee', 'tbl_schedule.emp_id', '=', 'tbl_employee.emp_id')
        ->distinct()
        ->get();




        // if($request->has('roles'))
        // {
        //     foreach($request['roles'] as $role)
        //     {
        //         $user=Schedule::findOrFail($request);
        //     }
        // }

        $events = [];
       $data = \DB::table('tbl_schedule')
       ->where('status2','Approved')
       ->where('is_submitted',1)


       ->get();

        if($data->count())
         {
            foreach ($data as $key => $value)
            {
                $events[] = Calendar::event(
                    'WHAT:' . ' ' . $value->title, //. ' ' . 'WHERE:' . ' ' . $value->venue
                    true,
                    new \DateTime($value->start),
                    new \DateTime($value->end.'+1 day'),
                    null,
                 [
                    'color'=> $value->color,
                    //  'textColor' => $value->textColor,
                    'url' => 'get_schedule_view/' .$value->id. ''

                 ]

                );

            }
        }

                $calendar =\Calendar::addEvents($events);

                 return view('admin.schedules.calendar_show',compact('events','roles','calendar','users'));

    }
    public function destroy($id)
    {
        $users=Schedule::findOrFail($id);
        $users->delete();
        session()->flash('success','Schedule deleted successfully');
        return redirect()->route('admin.schedules.index');
    }
}
