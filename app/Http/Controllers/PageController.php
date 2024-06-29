<?php

namespace App\Http\Controllers;

use App\Models\PageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PageController extends Controller
{
    public function Page()
    {
        $data['getRecord']=PageModel::getRecord();
    return view('Backend.pages.list',$data);

    }
    public function add_page()
    {
        /*               الكويري متع العرض تلقاها في المودل BlogModel         */

    return view('Backend.pages.add');

    }
    public function insert_page(Request $request)
    {

       $save=new PageModel;
       $save->slug=trim($request->slug);
       $save->title=trim($request->title);
       $save->description=trim($request->description);
       $save->meta_title=trim($request->meta_title);
       $save->meta_keywords=trim($request->meta_keywords);

       $save->meta_description=trim($request->meta_description);



    $save->save();

       return redirect('panel/page/list')->with('success',"Page succesfuly created");

    }
    public function edit_page($id)
    {
        $data['getRecord']=PageModel::getSingle($id);

        return view('Backend.pages.edit', $data);
    }

    public function update_page($id,  Request $request)
    {


       $save=PageModel::getSingle($id);
       $save->slug=trim($request->slug);
       $save->title=trim($request->title);
       $save->description=trim($request->description);
       $save->meta_title=trim($request->meta_title);
       $save->meta_keywords=trim($request->meta_keywords);

       $save->meta_description=trim($request->meta_description);



    $save->save();


       return redirect('panel/page/list')->with('success',"Blog succesfuly Updated");

    }
}
