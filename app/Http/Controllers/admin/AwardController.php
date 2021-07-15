<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AwardRequest;
use App\Http\Requests\EditAwardRequest;
use App\Award;
use App\Entity;
use Exception;

class AwardController extends Controller
{
    public function index(){
        $awards = Award::orderBy('id','desc')->paginate(10);
        return view('admin.award.index',compact('awards'));
    }
    public function create(){
        $entities = Entity::all();
        return view('admin.award.create',compact('entities'));
    }

    public function store(AwardRequest $request){

        try {
            
            $awardName = $request->award_name;
            $award = new Award;
            $award->name = $awardName;
            $award->entity_id = $request->entity;
            if($file = $request->file('award_logo')){
                $logoName = $awardName.'-'.time().'.'.$file->extension();
                $file->move(public_path('award/logo'), $logoName);
                $award->award_logo = $logoName;
            }
            $award->save();
            return redirect()->route('awards')->withSuccess('Award has been created succesfully!');
        } catch (\Exception $ex) {
            return redirect()->back()->withError($ex->getMessage());
        }
    }

    public function changeStatus(Request $request){
        try {
            Award::where('id',$request->award_id)->update(['status'=>$request->value]);
            if($request->value == 0){
                $message = "Activated Successfully!";
            }else{
                $message = "Inactivated Successfully!";
            }
            return response()->json([
                'status' => true,
                'message' => $message
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'message' => $ex->getMessage()
            ]);
        }
    }

    public function edit($id){
        $awardInfo = Award::find(base64_decode($id));
        $entities = Entity::all();
        return view('admin.award.edit',compact('awardInfo','entities'));
    }

    public function update(EditAwardRequest $request){
        try {
            
            $awardName = $request->award_name;
            $award = Award::where('id',$request->id)->first();
            $award->name = $awardName;
            $award->entity_id = $request->entity;
            if($file = $request->file('award_logo')){
                $logoName = $awardName.'-'.time().'.'.$file->extension();
                $file->move(public_path('award/logo'), $logoName);
                $award->award_logo = $logoName;
            }
            $award->save();
            return redirect()->route('awards')->withSuccess('Award has been updated succesfully!');
        } catch (\Exception $ex) {
            return redirect()->back()->withError($ex->getMessage());
        }
    }
}
