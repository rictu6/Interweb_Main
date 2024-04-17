<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;

use App\Models\Patient;

use App\Models\Division;

use App\Models\Timetable;
use App\Models\Agenda;
use App\Models\Module;
use App\Models\Permission;
use App\Models\Event;
use App\Models\Province;
use App\Models\Position;
use App\Models\Section;
use App\Models\FileCategory;
use App\Models\User;
use App\Models\Office;
use App\Models\EmpStatus;
use App\Models\Muncit;

use Spatie\Activitylog\Models\Activity;

class IndexController extends Controller
{
    /**
     * admin dashboard
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //general statistics
        //$tests_count=Test::where('parent_id',0)->orWhere('separated',true)->count();
      //  $cultures_count=Culture::count();

        $modules_count=Module::count();
        $divisions_count=Division::count();
        // $filecategories_count=FileCategory::count();
        // $files_count=File::count();

        $agendas_count=Agenda::count();
       
         $users_count=User::count();
        $provinces_count=Province::count();
        $positions_count=Position::count();
        $sections_count=Section::count();
        $permissions_count=Permission::count();
        $offices_count=Office::count();
        $empstatuss_count=EmpStatus::count();
        $muncits_count=Muncit::count();







        //todays visits
        //$today_visits=Visit::with('patient')->where('visit_date','like','%'.date('d-m-Y').'%')->get();







        return view('admin.index',compact(

            'divisions_count',

            'agendas_count',
            
            'modules_count',
           
            'provinces_count',
            'positions_count',
            'sections_count',
             'users_count',
            'offices_count',
            'permissions_count',
            'empstatuss_count',
            'muncits_count'

        ));
    }
}
