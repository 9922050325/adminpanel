<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    public function index()
    {
        $banner = DB::select('select * from banners where user_id = :id', ['id' => Auth::user()->id]);
        return view('banner.banner', ['banner' => $banner]);
    }

    public function apiIndex()
    {
    }

    public function store(Request $req)
    {
        try {
            $validate = $req->validate([
                "banner_image" => 'required|mimes:png,jpg,jpeg'
            ]);
            $banner = new Banner;
            $banner->user_id = Auth::user()->id;

            $bannerImghas = $req->hasFile('banner_image');

            if ($bannerImghas) {
                $img_path = $req->banner_image->store('images/banner', 'public');
                $banner->img_url = $img_path;
            } else {
                flash('please select image')->warning()->important();
                return redirect()->back();
            }
            $banner->start_date = $req->start_date;
            $banner->end_date = $req->end_date;
            $banner->status = 'active';
            $banner->save();

            flash('Insertd')->success()->important();

            return redirect('/home/banner');
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 200);
        }
    }

    public function deactivate(Request $req)
    {
        try {

            $banner = Banner::find($req->id);
            $banner->status = 'inactive';
            $banner->update();

            flash('Deactivated  !')->important();
            return redirect('/home/banner');
        } catch (Exception $e) {
            return response()->json([$e->getMessage(), 200]);
        }
    }


}
