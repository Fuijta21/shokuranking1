<?php

namespace App\Http\Controllers;
use App\shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        
        $query = shop::query();
        
        if(!empty($keyword)){
            $query->where('keyword','LIKE',$keyword);
        }
        
        $shops = $query->get();
        
        
        return view('index',compact('shops','keyword'));
    }
}
