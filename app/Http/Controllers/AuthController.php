<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PageModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Mail\RegisterMail;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function login()
    {


        $getPage=PageModel::getSlug('login');
        /*  اكلود هذا درناه لما يرص عالهوم يطلعله بلوج في التايتل الفوقي   */
        $data['meta_title']   = !empty($getPage) ? $getPage->meta_title : '';
        $data['meta_description']   =!empty($getPage) ? $getPage->meta_description : '';
        $data['meta_keywords']   = !empty($getPage) ? $getPage->meta_keywords : '';
        return view('auth.login', $data);
    }

    public function register()
    {
        $getPage=PageModel::getSlug('register');
        /*  اكلود هذا درناه لما يرص عالهوم يطلعله بلوج في التايتل الفوقي   */
        $data['meta_title']   = !empty($getPage) ? $getPage->meta_title : '';
        $data['meta_description']   =!empty($getPage) ? $getPage->meta_description : '';
        $data['meta_keywords']   = !empty($getPage) ? $getPage->meta_keywords : '';
        return view('auth.register', $data);
    }
    public function forgotpassword()
    {
        return view('auth.forgotpassword');
    }
    public function forgot_password (Request $request)
    {
        $user =user::where('email','=', $request->email)->first();
        if(!empty($user))
        {
            $user->remember_token=Str::random(40);
            $user->save();

     Mail::to($user->email)->send(new ForgotPasswordMail($user));
     return redirect()->Back()->with('success',"please chek your email and reset your password");

        }
        else
        {
            return redirect()->Back()->with('error',"email not found in this system");
        }
    }
    public function reset($token)
    {
        $user = User::where('remember_token', '=', $token)->first();
        if(!empty($user))
        {
            $getPage=PageModel::getSlug('reset');
            /*  اكلود هذا درناه لما يرص عالهوم يطلعله بلوج في التايتل الفوقي   */
            $data['meta_title']   = !empty($getPage) ? $getPage->meta_title : '';
            $data['meta_description']   =!empty($getPage) ? $getPage->meta_description : '';
            $data['meta_keywords']   = !empty($getPage) ? $getPage->meta_keywords : '';
            $data['user']= $user;
            return view('auth.reset', $data);

        }
        else
        {
            abort(404);
        }
    }
  public function post_reset($token, Request $request)
  {

    $user = User::where('remember_token', '=', $token)->first();
    if(!empty($user))
    {
       if($request->password == $request->cpassword)
       {
        $user->password=Hash::make($request->password);
        if(!empty($user->email_verified_at))
        $user->email_verified_at=date('Y-m-d H:i:s');
        $user->remember_token=Str::random(40);
            $user->save();
        return redirect('login')->with('success',"تم تغيير كلمة المرور بنجاح");

       }
       else{
        return redirect()->Back()->with('error',"كلمة المرور غير مطابقة");

       }

    }
    else
    {
        abort(404);
    }
  }

    public function create_user(Request $request)
    {
        request()->validate([
        'name'=> 'required',
        'email'=> 'required|email|unique:users',
        'password'=> 'required'

        ]);
     $save= new User;
     $save->name=trim($request->name);
     $save->email=trim($request->email);
     $save->password= Hash::make($request->password);
     $save->remember_token=Str::random(40);
     $save->save();
     Mail::to($save->email)->send(new RegisterMail($save));
     return redirect('login')->with('success',"تمت العملية بنجاح ");
    }
    public function verify ($token)
    {
      $user = User::where('remember_token', '=', $token)->first();
      if(!empty($user))
      {
       $user->email_verified_at = date('Y-m-d H:i:s');
       $user->remember_token=Str::random(40);

       $user->save();

     return redirect('login')->with('success',"  your account successufily verifyied ");


      }
      else{

           abort(404);
      }
    }
    public function auth_login (Request $request)
    {

        $remember = !empty($request->remember)? true : false;
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],$remember))
        {
            if(Auth::user()->is_delete==1)
            {
                return redirect()->Back()->with('error',"your admin is deleted");

            }
           else if(!empty(Auth::user()->email_verified_at))
            {
              return redirect('panel/dashboard');
            }

            else
            {
          //agian email
          $user_id=Auth::user()->id;
          Auth::logout();

          $save=  User::getSingle($user_id);
          $save->remember_token=Str::random(40);
          $save->save();

          Mail::to($save->email)->send(new RegisterMail($save));

          return redirect()->back()->with('success',"  please first you can verify your email addres ");
            }

        }
        else{
            return redirect()->Back()->with('error',"please enter current email and passwword");
        }
    }
public function logout()
{
Auth::logout();
return redirect('login');
}
}
