<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class prefferController extends Controller
{
    public function prefferApi()
    {
        try {
            $res = [
                "Language"=>[],
                "Country" =>[],
                "Category" =>[]
            ];

            $resLanguage = DB::select('select * from languages');

            foreach($resLanguage as $lang)
            {
                $res["Language"][]=[
                    "title"=>$lang->title,
                    "id"=>$lang->id,

                ];
            }

            $resCountry = DB::select('select * from countries');
            foreach($resCountry as $country)
            {
                $res["Country"][]=[
                    "title"=>$country->title,
                    "id"=>$country->id
                ];
            }

            $resCategory = DB::select('select * from categories');
            foreach($resCategory as $category)
            {
                $res["Category"][]=[
                    "title"=>$category->title,
                    "id"=>$category->id,
                ];
            }

            return response()->json([$res,200]);

        } catch (Exception $e) {
            return response()->json(["error" =>$e->getMessage()],401);
        }
    }
}
