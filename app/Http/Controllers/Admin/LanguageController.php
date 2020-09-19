<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Language;

class LanguageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $language = Language::all();
        return view('language.language',['language'=>$language]);
    }



    public function store(Request $req)
    {
        $dataValidator = $req->validate([
            'title' => "alpha|required",
        ]);
        if($dataValidator)
        {

            $slug = Str::of($req->title)->substr(0, 2);
        $language = new Language;

        $language->title = $req->title;
        $language->slug = $slug;
        $language->status = 'active';
        $language->save();

        flash('Language Inserted Success !')->success()->important();
        return redirect('/home/language');
        }



    }

    public function getLanguageUpdate(Request $req)
    {
        $lang = Language::find($req->id);
        return view('language.updateLanguage',['lang'=>$lang]);

    }

    public function languageUpdate(Request $req)
    {
        $slug = Str::of($req->title)->substr(0, 2);;
        $lang = Language::find($req->id);
        $lang->title = $req->title;
        $lang->slug = $slug;
        $lang->update();

        flash('Language Update Success !')->success()->important();
        return redirect('/home/language');
    }
    public function languageDelete(Request $req)
    {
        $lang = Language::find($req->id);
        $deleteQuery = $lang->delete();

        flash('Language Deleted !')->warning()->important();
        return  redirect('/home/language');
    }

}
