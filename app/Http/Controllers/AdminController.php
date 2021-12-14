<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Admin;
class AdminController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }

    public function ChangePassword()
    {
        return view('admin.auth.passwordchange');
    }

    public function Update_pass(Request $request)
    {
      $password=Auth::user()->password;
      $oldpass=$request->oldpass;
      $newpass=$request->password;
      $confirm=$request->password_confirmation;
      if (Hash::check($oldpass,$password)) {
           if ($newpass === $confirm) {
                      $user=Admin::find(Auth::id());
                      $user->password=Hash::make($request->password);
                      $user->save();
                      Auth::logout();  
                      $notification=array(
                        'messege'=>'パスワードの変更が完了しました。新しいパスワードでログインしてください。',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('admin.login')->with($notification); 
                 }else{
                     $notification=array(
                        'messege'=>'新しいパスワードと確認用パスワードが一致しません。',
                        'alert-type'=>'error'
                         );
                       return Redirect()->back()->with($notification);
                 }     
      }else{
        $notification=array(
                'messege'=>'旧パスワードが一致しません',
                'alert-type'=>'error'
                 );
               return Redirect()->back()->with($notification);
      }
    }

    public function logout()
    {
        Auth::logout();
            $notification=array(
                'messege'=>'正常にログアウトしました',
                'alert-type'=>'success'
                 );
             return Redirect()->route('admin.login')->with($notification);
    }

}
