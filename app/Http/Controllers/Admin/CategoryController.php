<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $category = Category::all();
        return view('category.category', ['category' => $category]);
    }



    public function insertCategory(Request $req)
    {
        $dataValidate = $req->validate([
            'title' => 'required|alpha'
        ]);

        if ($dataValidate) {
            $slug = Str::of($req->title)->substr(0, 2);

            $cat = new Category;
            $cat->title = $req->title;
            $cat->slug = $slug;
            $cat->status = 'active';
            $cat->save();

            flash('Category Added')->success()->important();
            return redirect('/home/category');
        }
    }

    public function getUpdateCategory(Request $req)
    {
        $category = Category::find($req->id);
        return view('category.updateCategory', ['category' => $category]);
    }

    public function updateCategory(Request $req)
    {
        $slug = Str::of($req->title)->substr(0, 2);
        $cat =  Category::find($req->id);

        $cat->title = $req->title;
        $cat->slug = $slug;
        $cat->update();
        flash('Category Updated !')->success()->important();
        return redirect('/home/category');
    }

    public function categoryDelete(Request $req)
    {
        $cat = Category::find($req->id);

        $cat->delete();

        flash('Category Deleted !')->warning()->important();
        return redirect('/home/category');
    }
}
