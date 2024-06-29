<?php

namespace App\Http\Controllers;

use App\Models\BlogModel;
use App\Models\CategoryModel;
use App\Models\BlogCommentModel;
use App\Models\PageModel;
use App\Models\BlogCommentReplyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class HomeController extends Controller
{
    public function home()
    {
        $getPage=PageModel::getSlug('home');
        /*  اكلود هذا درناه لما يرص عالهوم يطلعله بلوج في التايتل الفوقي   */
        $data['meta_title']   = !empty($getPage) ? $getPage->meta_title : '';
        $data['meta_description']   =!empty($getPage) ? $getPage->meta_description : '';
        $data['meta_keywords']   = !empty($getPage) ? $getPage->meta_keywords : '';
        return view('home', $data);
    }
    public function about()
    {
        $getPage=PageModel::getSlug('about');
          /*  اكلود هذا درناه لما يرص عالهوم يطلعله بلوج في التايتل الفو
          قي   */
          $data['meta_title']   = !empty($getPage) ? $getPage->meta_title : '';
          $data['meta_description']   =!empty($getPage) ? $getPage->meta_description : '';
          $data['meta_keywords']   = !empty($getPage) ? $getPage->meta_keywords : '';
        return view('about', $data);
    }
    public function teams()
    {
        $getPage=PageModel::getSlug('teams');
         /*  اكلود هذا درناه لما يرص عالهوم يطلعله بلوج في التايتل الفوقي   */
         $data['meta_title']   = !empty($getPage) ? $getPage->meta_title : '';
         $data['meta_description']   =!empty($getPage) ? $getPage->meta_description : '';
         $data['meta_keywords']   = !empty($getPage) ? $getPage->meta_keywords : '';
        return view ('teams', $data);
    }
    public function gallery()
    {
        $getPage=PageModel::getSlug('gallery');
         /*  اكلود هذا درناه لما يرص عالهوم يطلعله بلوج في التايتل الفوقي   */
         $data['meta_title']   = !empty($getPage) ? $getPage->meta_title : '';
         $data['meta_description']   =!empty($getPage) ? $getPage->meta_description : '';
         $data['meta_keywords']   = !empty($getPage) ? $getPage->meta_keywords : '';
        return view('gallery' , $data);
    }

    public function blog()
    {
        $getPage=PageModel::getSlug('blog');
        /*  اكلود هذا درناه لما يرص عالهوم يطلعله بلوج في التايتل الفوقي   */
        $data['meta_title']   = !empty($getPage) ? $getPage->meta_title : '';
        $data['meta_description']   =!empty($getPage) ? $getPage->meta_description : '';
        $data['meta_keywords']   = !empty($getPage) ? $getPage->meta_keywords : '';
        $data['getRecord']= BlogModel::getRecordFront();

        return view('blog', $data);
    }
    public function contact()
    {
        $getPage=PageModel::getSlug('contact');
         /*  اكلود هذا درناه لما يرص عالهوم يطلعله بلوج في التايتل الفوقي   */
         $data['meta_title']   = !empty($getPage) ? $getPage->meta_title : '';
         $data['meta_description']   =!empty($getPage) ? $getPage->meta_description : '';
         $data['meta_keywords']   = !empty($getPage) ? $getPage->meta_keywords : '';
        return view('contact' , $data);
    }
public function blogdetail($slug)
{
    $getCategory= CategoryModel::getSlug($slug);
    if(!empty($getCategory))
    {
        $data['meta_title']   = $getCategory->meta_title;
        $data['meta_description']   =$getCategory->meta_description;
        $data['meta_keywords']   =$getCategory->meta_keywords;
        $data['header_title']=$getCategory->title;
        $data['getRecord']= BlogModel::getRecordFrontCategory($getCategory->id);

        return view('blog', $data);
    }
    else
    {
        $getRecord= BlogModel::getRecordSlug($slug);

        if(!empty($getRecord))
        {
            // $getCategory=CategoryModel::getSlug($slug);
            $data['getCategory']=CategoryModel::getCategory();
            $data['getRecentPost']= BlogModel::getRecentPost();
            /*               الكود اللي لوطا نبيه يعرضلي الكاتيجوري الموجودات ماعدا الكاتيجوري الموجودة اساسا    */
            $data['getRelatedPost']= BlogModel::getRelatedPost($getRecord->category_id, $getRecord->id);
            $data['getRecord']=$getRecord;


            $data['meta_title']   = $getRecord->title;
            $data['meta_description']   =$getRecord->meta_description;
            $data['meta_keywords']   =$getRecord->meta_keywords;
        return view('blog_detail', $data);
        }
       else
       {
        abort(404);
       }
    }

}
public function BlogCommentSubmit(Request $request)
{
   $save= new BlogCommentModel;
   $save->user_id=Auth::user()->id;
   $save->blog_id=$request->blog_id;
   $save->Comment=$request->Comment;
   $save->save();
   return redirect()->back()->with('success',"Your comment succesfuly");

}
public function BlogCommentReplySubmit(Request $request)
{
   $save= new BlogCommentReplyModel;
   $save->user_id=Auth::user()->id;
   $save->comment_id=$request->comment_id;
   $save->Comment =$request->Comment;
   $save->save();
   return redirect()->back()->with('success',"Your comment Reply succesfuly");

}
}
