<?php

namespace App\Http\Controllers\Admin;


use view;
use DataTables;
use Carbon\Carbon;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class MenusController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:view_division',['only' => ['contactus','whoweare','mvsv','newsandupdate','pof','seal2021','ddpn']]);
     
    }
   
    public function contactus()
    {
         //general
         $settings=setting('info');
        return view('admin.menus.contactus',compact('settings'));
       
    }
    public function whoweare()
    {
         //general
        
        return view('admin.menus.whoweare');
       
    }
    public function mvsv()
    {
         //general
        
        return view('admin.menus.mvsv');
       
    }
    public function pof()
    {
         //general newsandupdate
        
        return view('admin.menus.pof');
       
    }
    public function newsandupdate()
    {
         //general newsandupdate seal2021
        
        return view('admin.menus.newsandupdate');
       
    }
    public function seal2021()
    {
         //general newsandupdate seal2021
        
        return view('admin.menus.seal2021');
       
    }
    public function seal2016()
    {
         //general newsandupdate seal2021
        
        return view('admin.menus.seal2016');
       
    }
    public function seal2010()
    {
         //general newsandupdate seal2021
        
        return view('admin.menus.seal2010');
       
    }
    public function ddpn()
    {
         //general newsandupdate seal2021
        
        return view('admin.menus.ddpn');
       
    }
    public function pubandnot()
    {
         //general newsandupdate seal2021keyofficials
        
        return view('admin.menus.pubandnot');
       
    }
    public function keyofficials()
    {
         //general newsandupdate seal2021
        
        return view('admin.menus.keyofficials');
       
    }
}
