<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
            $req->old('username');                
            $req->old('phonenumber');
            $req->old('email');
            
            $dbL_name=User::where('id',$id)->value('f_name');
            $dbF_name=User::where('id',$id)->value('l_name');
            $dbUsername=User::where('id',$id)->value('username');
            $dbEmail=User::where('id',$id)->value('email');
            $dbPhonenumber=User::where('id',$id)->value('phonenumber');
            
            $validate = Validator::make($req->all(), [
                'fname' => ['required', 'string', 'max:20', 'min:3'],
                'lname' => ['required', 'string', 'max:20', 'min:3'],
                'username' => ['required', 'string', 'unique:users,username', 'max:12'],
                'phonenumber' => ['required', 'unique:users,phone_number', 'max:25'],
                'email' => ['required', 'string', 'max:255', 'email', 'unique:users,email'],
            ]);


            if ($validate->fails()){
                return response()->json(['status'=>0,'error'=>$validate->errors()->toArray()]);
            }else{
                $update=User::where('id',$id)->update([
                        'lname' => $req['l_name'],
                        'fname' => $req['f_name'],
                        'username' => $req['username'],
                        'phonenumber' => $req['phone_number'],
                        'email' => $req['email'],
                    ]); 

                    if($update){
                        return response()->json(['status'=>1,'msg'=>'you have successfully update your data']);
                    }
            }
        }else{
            return ('processing');
        }
            
            die('here');
    
        
            
    }
    
}

