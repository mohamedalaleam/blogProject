<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\User;
use Illuminate\Support\Str;



class CategoryController extends Controller
{
    public function category()
    {
        $data['getRecord']=CategoryModel::getRecord();
        return view('Backend.Category.list',$data);
    }
    public function  add_category ()
    {
        return view('Backend.Category.add');

    }

    public function insert_category (Request $request)
    {

        $save= new CategoryModel;
        $save->name=trim($request->name);
        $save->slug=trim(Str::slug($request->name));
        $save->title=trim($request->title);
        $save->meta_title=trim($request->meta_title);
        $save->meta_description=trim($request->meta_description);
        $save->meta_keywords=trim($request->meta_keywords);

        $save->status=trim($request->status);
        $save->is_menu=trim($request->is_menu);
        $save->save();
        return redirect('panel/category/list')->with('success',"Category succesfuly created");

    }
    public function  edit_category ($id)
    {
        $data['getRecord']= CategoryModel::getSingle($id);
        return view('Backend.Category.edit', $data);
    }
    public function update_category ($id, Request $request)
{

    $save=  CategoryModel::getSingle($id);
    $save->name=trim($request->name);
    $save->slug=trim(Str::slug($request->name));
    $save->title=trim($request->title);
    $save->meta_title=trim($request->meta_title);
    $save->meta_description=trim($request->meta_description);
    $save->meta_keywords=trim($request->meta_keywords);

    $save->status=trim($request->status);
    $save->is_menu=trim($request->is_menu);

    $save->save();
    return redirect('panel/category/list')->with('success',"Category succesfuly updated");
}
public function delete_category($id)
{
    $save=  CategoryModel::getSingle($id);
    $save->is_delete=1;
    $save->save();
    return redirect()->back()->with('success',"Category successfuly deleted");
}
}
