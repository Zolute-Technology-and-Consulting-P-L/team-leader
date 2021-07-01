<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AwardRequest;
use App\Award;
use Exception;

class AwardController extends Controller
{
    public function index(){
        $awards = Award::paginate(10);
        return view('admin.award.index',compact('awards'));
    }
    public function create(){
        return view('admin.award.create');
    }

    public function store(AwardRequest $request){

        try {
            
            $awardName = $request->award_name;
            $award = new Award;
            $award->name = $awardName;
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
}
