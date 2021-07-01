<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use App\Http\Requests\CompanyAwardRequest;
use App\Company;
use App\CompanyAward;
use File;

class CompanyController extends Controller
{
    public function index(){
        $companies = Company::paginate(10);
        return view('admin.company.index',compact('companies'));
    }

    public function create(){
        return view('admin.company.create');
    }

    public function store(CompanyRequest $request){
        try {
            
            $company = new Company;
            $company->name = $request->company_name;
            $company->email = $request->email;
            $company->phone = $request->contact_number;
            $company->address = $request->address;
            $company->save();
            return redirect()->route('companies')->withSuccess('Company has been created succesfully!');
        } catch (\Exception $ex) {
            return redirect()->back()->withError($ex->getMessage());
        }
    }

    public function assignAward(CompanyAwardRequest $request){

        try {
            $assignTo = new CompanyAward;
            $assignTo->company_id = $request->company;
            $assignTo->award_id = $request->award;
            $assignTo->assign_code = $this->getCode(80);
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

    public function fileDownload($assignCode){
            $data = '<div class="">
            <a href="'.$assignCode.'"><img src="'.url('/public/upload/logo/company-logo-default.svg').'"/></a>
            </div>';
            $file = time() .rand(). '_file.txt';
            $destinationPath=public_path()."/upload/";
            if (!is_dir($destinationPath)) {  mkdir($destinationPath,0777,true);  }
            File::put($destinationPath.$file,$data);
            return response()->download($destinationPath.$file);
          
    }
}
