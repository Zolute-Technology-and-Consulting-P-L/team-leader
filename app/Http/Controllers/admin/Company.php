<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;

class Company extends Controller
{
    public function index(){

    }

    public function create(CompanyRequest $request){
        return view('admin.company.create');
    }
}
