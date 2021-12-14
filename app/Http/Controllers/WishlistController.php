<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class WishlistController extends Controller
{
   public function addWishlist($id){

    $userid = Auth::id();
    $check = DB::table('wishlists')->where('user_id',$userid)->where('product_id',$id)->first();

    $data = array(
    'user_id' => $userid,
    'product_id' => $id,

    );

			  if (Auth::Check()) {
             
             if ($check) {
              return \Response::json(['error' => 'すでにウィッシュリストにあります']);	 
             }else{
             	DB::table('wishlists')->insert($data);
          return \Response::json(['success' => 'ウィッシュリストに商品を追加しました']);
 
             }
             
			  	 
			  }else{
          return \Response::json(['error' => 'お客様のアカウントを作成してください']);      

			  } 

   }





}
