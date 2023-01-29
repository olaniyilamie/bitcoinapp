<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Bankdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    //

    public function userProfile(){
        if(Auth::check()){
            $id = Auth::id();
            $user = User::where('id',$id)->get();
            return view('section_profile',compact('user',));
        }else{
            return ('processing');
        }
    }

    public function ajaxRefreshProfile(){
        if(Auth::check()){
            $id = Auth::id();
            $user = User::where('id',$id)->get();
            return view('ajax_profile_section',compact('user',));
        }else{
            return ('processing');
        }
    }

    public function editProfile(){
        if(Auth::check()){
            $id = Auth::id();
            $user = User::where('id',$id)->get();
            return view('section_edit_profile',compact('user'));
        }else{
            return ('processing');
        }
    }

    public function updateProfile(Request $req){
        if(Auth::check()){
            $id = Auth::id();
            $req->old('fname');    
            $req->old('lname');             
            $req->old('phonenumber');
            
            $validate = Validator::make($req->all(), [
                'fname' => ['required', 'string', 'max:20', 'min:3'],
                'lname' => ['required', 'string', 'max:20', 'min:3'],
                'phonenumber' => ['required', 'unique:users,phone_number,'. $id , 'max:25'],
            ]);


            if ($validate->fails()){
                return response()->json(['status'=>0,'error'=>$validate->errors()->toArray()]);
            }else{
                $update=User::where('id',$id)->update([
                        'l_name' => $req['lname'],
                        'f_name' => $req['fname'],
                        'phone_number' => $req['phonenumber'],
                    ]); 

                    if($update){
                        return response()->json(['status'=>1,'msg'=>'Profile Updated Successfully']);
                    }
            }
        }else{
            return ('return to landing page');
        }       
    }

    public function showPasswordSetting(Request $req){
        $token = $req->header('x-csrf-token');
        return view('auth.passwords.change_password',compact('token'));
    }

    public function bankDetails(){
        if(Auth::check()){
            $id = Auth::id();
            $userAccount = Bankdetail::where('user_id',$id)->get();
            $banks=Bank::get();
            return view('section_add_account_details',compact('banks','userAccount'));
        }else{
            return ('back to home page');
        }
    }

    public function saveUserBankDetail(Request $req){
        if(Auth::check()){
            $id = Auth::id();
            $req->old('bankname');    
            $req->old('accname');             
            $req->old('accnumber');
            
            $validate = Validator::make($req->all(), [
                'bankname' => ['required', 'string'],
                'accname' => ['required', 'string', 'regex:/^[\pL\s]+$/u', 'max:30', 'min:6'],
                'accnumber' => ['required', 'numeric', 'digits:10'],
            ]);


            if ($validate->fails()){
                return response()->json(['status'=>0,'error'=>$validate->errors()->toArray()]);
            }else{
                $bank = new Bankdetail();
                
                $bank->user_id = $id;
                $bank->bank_name = $req->bankname;
                $bank->acc_name = $req->accname;
                $bank->acc_number = $req->accnumber;
                $saved=$bank->save();


                    if($saved){
                        return $this->bankDetails();
                    }
            }
        }else{
            return ('return to landing page');
        } 
    }

    public function deleteUserBankDetail(Request $req){
        if(Auth::check()){
            $id = Auth::id();
            $bank_account_id = $req->bankaccount_id;
            $bank = Bankdetail::where('user_id', $id)->find($bank_account_id);
            $deleted = $bank->delete();

            if($deleted){
                return $this->bankDetails();
            }

        }else{
            return ('return to landing page');
        } 
    }
    
    public function editUserBankDetail(Request $req){
        if(Auth::check()){
            $id = Auth::id();
            $bank_account_id = $req->bankaccount_id;
            $bank = Bankdetail::where('user_id', $id)->find($bank_account_id);
            $deleted = $bank->delete();

            if($deleted){
                return $this->bankDetails();
            }

        }else{
            return ('return to landing page');
        } 
    }
    
}

