<?php

namespace App\Http\Controllers\sumLove;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\letter;
use App\Models\ratio;
use App\Models\PinnedPages;
use App\Models\sitting;
use App\Models\adds;

class sumLoveController extends Controller
{
    public function  pindPagesData($id){
        $DataSittings=sitting::where("id",1)->first();
        $adds= adds::where("id",1)->first();
        $getAllPinnedPages = PinnedPages::limit(4)->get();
        return view('SumLoveWeb.pindPage',compact(['DataSittings','adds','getAllPinnedPages']))->with('id',$id);
    }
    
 
}
