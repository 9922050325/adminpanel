<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

    public function index()
    {
        $blog =  DB::select('select * from blogs where user_id= :id',['id'=>Auth::user()->id]);



        //     try
        //     {
        //         $res = [
        //         ];


        //         $resBlog = DB::select('select * from blogs');

        //         foreach($resBlog as $blog)
        //         {
        //             $res[]=[
        //                     "id"=>$blog->id,
        //                     "title"=>$blog->title,
        //                     "heading"=>$blog->heading,
        //                     "content"=>$blog->content,

        //             ];
        //         }
        //         return response()->json([$res,200]);


        //     }catch (Exception $e) {
        //     return response()->json(["error" =>$e->getMessage()],401);
        // }

        return view('blog.blog', ["blog" => $blog]);
        // return response()->json([200]);
    }

    public function indexApi(Request $req)
    {



        try {
            $res = [];


            $resBlog = DB::select('select * from blogs');
            // $resBlog = DB::table('blogs')->where('user_id',DB::table('users')->get('id'));

            foreach ($resBlog as $blog) {
                $res[] = [
                    "id" => $blog->id,
                    "user_id"=>$blog->user_id,
                    "title" => $blog->title,
                    "heading" => $blog->heading,
                    "content" => $blog->content,
                    "blog_img" => $blog->image_url,
                    "blog_video" => $blog->video_url,

                ];
            }
            return response()->json([$res, 200]);
        } catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()], 401);
        }
        return response()->json([200]);
    }
    public function insertBlog()
    {
        return view('blog.insertBlog');
    }

    public function createBlog(Request $req)
    {

        try {
            $validate = $req->validate([
                'title' => 'required',
                'heading' => 'nullable',
                'content' => 'required',
                'blog_image' => 'nullable|mimes:jpeg,bmp,png|between:0,2000',
                'blog_video' => 'nullable|mimes:mp4|between:0,50000',

            ]);

            $blog = new Blog;
            $blog->user_id =  Auth::user()->id;
            $blog->title = $req->title;
            $blog->heading = $req->heading;
            $blog->content = $req->content;
            $reqHasImg = $req->hasFile('blog_image');
            if ($reqHasImg) {
                $blog_img_path = $req->blog_image->store('images/blog', 'public');
                $blog->image_url = $blog_img_path;
            } else {
                $blog->image_url = null;
            }

            if ($req->hasFile('blog_video')) {
                $blog_vdo_path = $req->blog_video->store('videos/blog', 'public');
                $blog->video_url = $blog_vdo_path;
            } else {
                $blog->video_url = null;
            }

            $blog->save();

            flash("Blog Added Successfully !")->success()->important();
            return redirect('home/blog');
        } catch (Exception $e) {
            return response()->json([$e, 500]);
        }
    }

    public function deleteBlog(Request $req)
    {
        $blog = Blog::find($req->id);
        Storage::delete('public/' . $blog->image_url);
        Storage::delete('public/' . $blog->video_url);

        $blog->delete();

        flash('Blog deleted !')->warning()->important();
        return redirect('/home/blog');
    }

    public function getBlogUpdate(Request $req)
    {
        $blog = Blog::find($req->id);
        return view('blog.updateBlog', ["blog" => $blog]);
    }

    public function blogUpdate(Request $req)
    {
        try {
            $blog = Blog::find($req->id);
            $blog->user_id =  Auth::user()->id;
            $blog->title = $req->title;
            $blog->heading = $req->heading;
            $blog->content = $req->content;

            $reqHasImg = $req->hasFile('blog_image');
            if ($reqHasImg) {
                Storage::delete('public/' . $blog->image_url);
                $blog_img_path = $req->blog_image->store('images/blog', 'public');
                $blog->image_url = $blog_img_path;
            } else {
                Storage::delete('public/' . $blog->image_url);
                $blog->image_url = null;
            }

            $reqHasVdo = $req->hasFile('blog_video');
            if ($reqHasVdo) {
                Storage::delete('public/' . $blog->video_url);
                $blog_vdo_path = $req->blog_video->store('videos/blog', 'public');
                $blog->video_url = $blog_vdo_path;
            } else {
                Storage::delete('public/' . $blog->video_url);
                $blog->video_url = null;
            }

            $blog->update();

            flash('Blog updated !')->success()->important();
            return redirect('/home/blog');
        } catch (Exception $e) {
            return response()->json([$e]);
        }
    }
}
