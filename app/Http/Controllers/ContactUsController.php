<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;
use App\Models\User;


class ContactUsController extends Controller
{
    public function contactus()
    {
        $data['getContact']=ContactModel::getcontact();
        return view('Contact.list',$data);
    }
    public function ContactCommentSubmit(Request $request)
    {  // التحقق من استقبال البيانات
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string'
        ]);

        // يمكنك استخدام dd() للتحقق من البيانات المستلمة
        // dd($request->all());


        $save = new ContactModel();
        $save->name = $request->name;
        $save->email = $request->email;
        $save->subject = $request->subject;
        $save->message = $request->message;
        $save->save();

        return redirect()->back()->with('success', "Your comment was successfully submitted!");
    }
    public function delete_contactus($id)
    {
        $save= ContactModel::getSingle($id);
        $save->delete();
        return redirect()->back()->with('success',"تم حذف البيانات بنجاح");
    }


}
