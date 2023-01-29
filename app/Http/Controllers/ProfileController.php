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
use Illuminate\Support\Facades\Hash;

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
                'fname' => ['required',  'string', 'regex:/^[\pL\s]+$/u', 'max:15', 'min:3'],
                'lname' => ['required',  'string', 'regex:/^[\pL\s]+$/u', 'max:15', 'min:3'],
                'phonenumber' => ['required', 'unique:users,phone_number,'. $id , 'max:25'],
            ]);


            if ($validate->fails()){
                return response()->json(['status'=>0,'error'=>$validate->errors()->toArray()]);
            }else{
                $update = User::where('id',$id)->update([
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

    public function showPasswordSetting(){
        return view('auth.passwords.change_password');
    }

    public function changePassword(Request $req){
        if(Auth::check()){
            $validate = Validator::make($req->all(), [
                'oldpassword' => ['required'],
                'password' => ['required','min:8', 'confirmed'],
            ]);

            if ($validate->fails()){
                return response()->json(['status'=>0,'error'=>$validate->errors()->toArray()]);
            }else{
                
                $old_password = $req->oldpassword;
                $new_password = $req->password;
                $id = Auth::id();
                $user_pwd = User::where('id', $id)->value('password');
            
                if(Hash::check($old_password,$user_pwd)){
                    $user = User::where('id', $id)->first();
                    $user->password = Hash::make($new_password);
                    $user->save();
                    return response()->json(['status'=>2]);                    
                }else{
                    return response()->json(['status'=>1]);
                };

            }

        }else{
            return ('return to landing page');
        } 
    }

    public function bankDetails(){
        if(Auth::check()){
            $id = Auth::id();
            $userAccount = Bankdetail::where('user_id',$id)->get();
            $banks=Bank::get();
            if($userAccount->isEmpty()){
                $return = 0;
            }else{
                $return = 1;
            }
            return view('section_add_account_details',compact('banks','userAccount','return'));
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

            $bank_exist = Bankdetail::where('user_id' , $id)->where('bank_name' , $req->bankname)->where('acc_name', $req->accname)
            ->where('acc_number' , $req->accnumber)->first();

            if ($validate->fails()){
                return response()->json(['status'=>0,'error'=>$validate->errors()->toArray()]);
            }else{
                if($bank_exist !== null){
                    return response()->json(['status'=>1,'msg'=>'Bank details already exist !']);
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
            $crosscheck_userid = Bankdetail::where('id',$bank_account_id)->value('user_id');

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
                if($id == $crosscheck_userid){

                    $update = DB::table('bankdetails')->where('id',  $bank_account_id)
                                ->update([
                                    'bank_name' => $req->bankname,
                                    'acc_name' => $req->accname,
                                    'acc_number' => $req->accnumber
                                    ]);

                        if($update){
                            return $this->bankDetails();
                        }else{
                            return response()->json(['status'=>1,'msg'=>'No changes made, record has matching details.']);
                        }
                }else{
                    return redirect()->route('login');
                }
            }
        }else{
            return ('return to landing page');
        } 
    }

    public function showNotification(){
        if(Auth::check()){
            $id = Auth::id();
            $user = User::where('id',$id)->get();
            return view('show_notification',compact('user',));
        }else{
            return ('home page');
        }
    }

    public function showPrivacy(){
        if(Auth::check()){
            $id = Auth::id();
            $user = User::where('id',$id)->get();
            return view('show_privacy',compact('user',));
        }else{
            return ('home page');
        }
    }

    
}

