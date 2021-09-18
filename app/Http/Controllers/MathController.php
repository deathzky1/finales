<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;


class MathController extends Controller
{
    

    public function list(Request $request){

      $token = "f0pDFtX9H26kYaPDWGu8lydxyoZVzqRN";
      $value1 = $request->input("q");
      $value2 = $request->input("language");

      if(is_null($request)){
        $data = Http::get("http://dataservice.accuweather.com/locations/v1/cities/ipaddress?apikey=$token&q=192.168.100.127")->json();
        return view("welcome", ['data'=>$data]);
      }

      
      $data = Http::get("http://dataservice.accuweather.com/locations/v1/cities/ipaddress?apikey=$token&q=$value1")->json();
      
      return view("welcome", ['data'=>$data]);
    }
}
