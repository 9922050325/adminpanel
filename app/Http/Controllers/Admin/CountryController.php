<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Country;

use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function getInsertCountry()
    {
        $country = Country::all();
        return view('country.insertCountry', ['country' => $country]);
    }

    public function insertCountry(Request $req)
    {

        $ValidationData = $req->validate([
            "title" => "alpha",
        ]);

        if ($ValidationData) {
            $slug = Str::of($req->title)->substr(0, 2);
            $country = new Country;

            $country->title = $req->title;
            $country->slug = $slug;
            $country->status = 'active';
            $country->save();

            flash('Data inserted Successfully')->success()->important();
            return redirect('/home/country');
        }
        else {
            flash('Please Insert valid Input')->success()->important();
            return redirect('/home/country');
        }
    }

    public function getUpdateCountry(Request $req)
    {
        $country = Country::find($req->id);
        return view('country.updateCountry', ['country' => $country]);
    }

    public function updateCountry(Request $req)
    {
        $slug = Str::of($req->title)->substr(0, 2);
        $country =  Country::find($req->id);
        $country->title = $req->title;
        $country->slug = $slug;
        $country->update();

        flash('Country Updated !')->success()->important();
        return redirect('/home/country');
    }

    public function countryDelete(Request $req)
    {
        $country = Country::find($req->id);

        $country->delete();

        flash('Country Deleted SuccessFull')->warning()->important();

        return redirect('/home/country');
    }
}
