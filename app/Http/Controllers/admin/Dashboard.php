<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Award;
use App\Company;
use App\CompanyAward;
use App\Entity;

class Dashboard extends Controller
{
    public function index(){
        $companies = Company::where('status','0')->get();
        $awardes = Award::where('status','0')->get();
        $compAwards = CompanyAward::orderBy('created_at','desc')->paginate(10);
        $entities = Entity::all();
        return view('admin.dashboard',compact('companies','awardes','compAwards','entities'));
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
