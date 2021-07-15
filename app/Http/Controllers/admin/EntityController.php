<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EntityRequest;
use App\Entity;
use App\Award;
use App\Company;


class EntityController extends Controller
{
    public function index(Request $request){
        $entities = Entity::orderBY('id','desc')->get();
        return view('admin.entity.index',compact('entities'));
    }

    public function create(){

        return view('admin.entity.create');
    }

    public function store(EntityRequest $request){
        if($request->id){
            $entity = Entity::find($request->id);
            $msg = 'Updated Successfully!';
        }else{
            $entity = new Entity;
            $msg = 'Created successfully!';
        }
        
        $entity->name = $request->entity_name;
        $entity->website = $request->website;
        $entity->success_page = $request->success_url;
        $entity->failed_page = $request->failed_url;
        $entity->save();
        return redirect()->route('entityList')->withSuccess($msg);
    }

    public function edit($id){
        $entityId = base64_decode($id);
        $entity = Entity::find($entityId);
        return view('admin.entity.create',compact('entity')); 
    }

    public function companyOption($entityId){
       $companies = Company::where('entity_id', $entityId)->where('status','0')->get();
       return view('admin.company.option_layout',compact('companies'))->render(); 
    }
    public function awardOption($entityId){
        $awards = Award::where('entity_id', $entityId)->where('status','0')->get();
       return view('admin.award.option_layout',compact('awards'))->render(); 
    }

    public function delete($id){
        $entity = Entity::find($id);
        $entity->delete();
        return redirect()->route('entityList')->withSuccess('Deleted!');
    }


}
