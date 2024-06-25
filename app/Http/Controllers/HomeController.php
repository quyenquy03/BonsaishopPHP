<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use DB;

class HomeController extends Controller
{
   public function index() {
      $BestSellerProduct = DB::table('products as p')
         ->join('categories as c', 'c.CategoryID', '=', 'p.CategoryID')
         ->Where('IsBestSeller', 1)->limit(8)->get();
      $HotProduct = DB::table('products as p')
         ->join('categories as c', 'c.CategoryID', '=', 'p.CategoryID')
         ->Where('p.IsActive', 1)
         ->orderBy('ProductViewCount', 'desc')
         ->limit(8)->get();
      $HotBlog = DB::table('blogs')->Where('IsActive', 1)->limit(6)->get();
      return view('Client.Home')->with(compact('BestSellerProduct', 'HotProduct', 'HotBlog'));
   }
   public function ChooseLocation(Request $request) {
      $id = $request->id;
      $action = $request->action;
      $data = "";
      if($action == "province")
      {
         $listDistricts = DB::table('districts')->Where('ProvinceID', $id)->get();
         if($listDistricts)
         {
            foreach ($listDistricts as $key => $value) {
               $data = $data."<option value='$value->DistrictID'>$value->DistrictName</option>";
            }
         }
      }
      if($action == "district")
      {
         $listCommune = DB::table('commune')->Where('DistrictID', $id)->get();
         if ($listCommune)
         {
            foreach ($listCommune as $key => $value)
            {
               $data = $data."<option value='$value->CommuneID'>$value->CommuneName</option>";
            }
         }
      }
      return array(
         "status" => 0,
         "message" => "success",
         "content" => $data
      );
   }
   public function Contact() {
      return view('Client.Contact');
   }
   public function SendContact() {
      toastr()->success('Gửi thông tin liên hệ thành công');
      return Redirect::to('/');
   }
   public function Introduce() {
      return view('Client.Introduce');
   }
}
