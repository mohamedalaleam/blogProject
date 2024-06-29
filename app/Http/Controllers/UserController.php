<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserController extends Controller
{
    public function user()
    {
        $data['getRecord']=USer::getRecordUser();
        return view('Backend.user.list',$data);
    }
    public function add_user(Request $request)
    {
     return view('Backend.user.add');
    }
    public function insert_user(Request $request)
    {

        request()->validate([
            'name'=> 'required',
            'email'=> 'required|email|unique:users',
            'password'=> 'required'

            ]);
        $save= new user;
        $save->name=trim($request->name);
        $save->email=trim($request->email);
        $save->password=(Hash::make($request->password));
        $save->status=trim($request->status);
        $save->save();
        return redirect('panel/user/list')->with('success',"user succesfuly created");

    }
    public function  edit_user ($id)
{
    $data['getRecord']= USer::getSingle($id);
    return view('Backend.user.edit', $data);
}
public function update_user ($id, Request $request)
{
    request()->validate([
        'name'=> 'required',
        'email'=> 'required|email|unique:users,email,'.$id


        ]);
    $save= User::getSingle($id);
    $save->name=trim($request->name);
    $save->email=trim($request->email);
    if(!empty($request->password))
    {
        $save->password=(Hash::make($request->password));

    }
    $save->status=trim($request->status);
    $save->save();
    return redirect('panel/user/list')->with('success',"user succesfuly updated");
}
public function delete_user($id)
{
    $save=User::getSingle($id);
    $save->is_delete=1;
    $save->save();
    return redirect()->back()->with('success',"user successfuly deleted");
}
public function reply_user($id)
{
    $save=User::getSingle($id);
    $save->is_delete=0;
    $save->save();
    return redirect()->back()->with('success',"user successfuly replayed");
}
public function ChangePassword()
{
    return view('Backend.user.change_password');
}
public function UpdatePassword(Request $request)
{
    /* اول شي نجيبو بيانات اليوزر قبل باش نعرفو مني اللي سجل دخوله */
    $user=User::getSingle(Auth::user()->id);
    /* اهني بيتحقق من كلمة المرور القديمة اللي دخلتها مع اللي موجود في الداتا بيز*/

if(Hash::check($request->old_password, $user->password))
{
if($request->new_password  == $request->confirm_password)
{
$user->password=Hash::make($request->new_password);
$user->save();
return redirect()->back()->with('success',"your password is changed");

}
else
{
    return redirect()->back()->with('error',"old password does not confirm");

}
}
else
{
    return redirect()->back()->with('error',"old password does not match");
}
}
public function AcountSetting()
{
    $data['getUser']= User::getSingle(Auth::user()->id);
    return view('Backend.profile.acount_setting', $data);

}
public function UpdateAcountSetting(Request $request)
{
    $getUser= User::getSingle(Auth::user()->id);
    $getUser->name=$request->name;
/*             ألاسم اللي فسط  الشرط هذا الاسم متع تحميل الصورة اللي فالصفحة نفسها    */
    if(!empty($request->file('profile_pic')))
    {
        if(!empty($getUser->profile_pic ) && file_exists('upload/profile/' .$getUser->profile_pic))
        {
         unlink('upload/profile/' .$getUser->profile_pic);

        }
        $ext=$request->file('profile_pic')->getClientOriginalExtension();
        $file=$request->file('profile_pic');
        $filename=Str::random(20).'.'.$ext;
        $file->move('upload/profile/',$filename);
        $getUser->profile_pic = $filename;
    }
    $getUser->save();
return redirect()->back()->with('success',"profile updated ");

}

}
