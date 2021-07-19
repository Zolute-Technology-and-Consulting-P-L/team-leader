<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use App\Http\Requests\CompanyAwardRequest;
use App\Company;
use App\CompanyAward;
use App\Entity;
use App\Award;
use File;

class CompanyController extends Controller
{
    public function index(){
        $companies = Company::orderBy('id','desc')->get();
        return view('admin.company.index',compact('companies'));
    }

    public function create(){
        $entities = Entity::all();
        return view('admin.company.create',compact('entities'));
    }

    public function store(CompanyRequest $request){
        try {
            
            $company = new Company;
            $company->name = $request->company_name;
            $company->email = $request->email;
            $company->phone = $request->contact_number;
            $company->address = $request->address;
            $company->website = $request->website;
            $company->entity_id = $request->entity;
            $company->save();
            return redirect()->route('companies')->withSuccess('Company has been created succesfully!');
        } catch (\Exception $ex) {
            return redirect()->back()->withError($ex->getMessage());
        }
    }

    public function assignAward(CompanyAwardRequest $request){

        try {
            $assignTo = new CompanyAward;
            $assignTo->entity_id = $request->entity;
            $assignTo->company_id = $request->company;
            $assignTo->award_id = $request->award;
            $assignTo->assign_code = $this->getCode(80);
            $assignTo->start_date = date('Y-m-d');
            $assignTo->end_date = date('Y-m-d',strtotime($request->end_date));
            $assignTo->save();
            return redirect()->route('dashboard')->withSuccess('Assigned Successfull!');
        } catch (\Exception $ex) {
            return redirect()->back()->withError($ex->getMessage());
        }

    }

    private function crypto_rand_secure($min, $max){
        $range = $max - $min;
        if ($range < 1) return $min; // not so random...
        $log = ceil(log($range, 2));
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd > $range);
        return $min + $rnd;
    }

    private function getCode($length){
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); // edited

        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[$this->crypto_rand_secure(0, $max-1)];
        }

        return $token;
    }

    public function assignChangeStatus(Request $request){
        try {
            CompanyAward::where('id',$request->assign_id)->update(['status'=>$request->value]);
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

    public function changeStatus(Request $request){
        try {
            Company::where('id',$request->company_id)->update(['status'=>$request->value]);
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

    public function fileDownload($id){
            $assignAward = CompanyAward::find($id);
            $award = Award::find($assignAward->award_id);
            $data = '<div class="">
            <a target="_blank" href="'.route("assignLogoAuthentication",$assignAward->assign_code).'"><img src="'.$award->award_logo.'"/></a>
            </div>';
            $file = $assignAward->company->name.'-'.time(). '.txt';
            $destinationPath=public_path()."/upload/";
            if (!is_dir($destinationPath)) {  mkdir($destinationPath,0777,true);  }
            File::put($destinationPath.$file,$data);
            return response()->download($destinationPath.$file);
          
    }

    public function logoAuthtencation($assignCode=null){
        if($assignCode == null){
           return redirect()->back();
        }
        $currentDate = date('Y-m-d');
        if($assignAward =  CompanyAward::where('assign_code',$assignCode)->where('end_date','>=', $currentDate)->first()){
            return view('admin.redirect_success',compact('assignAward'));
        }else if($assignAward =  CompanyAward::where('assign_code',$assignCode)->first()){
            $entityId = $assignAward->entity_id;
            $entityD = Entity::find($entityId);
            return redirect($entityD->failed_page);
        }else{
            $data['color'] = "#ff0000";
            $data['title'] = "Logo is not Veryfied";
            return view('admin.website_veryfied',$data);
        }
    }

    public function testPage(){
        $data['color'] = "#ff0000";
        $data['title'] = "Logo is not Veryfied";
        return view('admin.website_veryfied',$data);
    }

    public function edit($id){
        $compInfo = Company::find(base64_decode($id));
        $entities = Entity::all();
        return view('admin.company.edit',compact('compInfo','entities'));
    }

    public function update(CompanyRequest $request){
        try {
            
            $company = Company::where('id',$request->id)->first();
            $company->name = $request->company_name;
            $company->email = $request->email;
            $company->phone = $request->contact_number;
            $company->address = $request->address;
            $company->website = $request->website;
            $company->entity_id = $request->entity;
            $company->save();
            return redirect()->route('companies')->withSuccess('Company has been updated succesfully!');
        } catch (\Exception $ex) {
            return redirect()->back()->withError($ex->getMessage());
        }
    }
}
