<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AwardRequest;

class Award extends Controller
{
    public function index(){
        return view('admin.award.index');
    }
    public function create(){
        return view('admin.award.create');
    }

    public function store(AwardRequest $request){

        
    }
}
