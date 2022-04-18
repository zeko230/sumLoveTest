<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sitting;
use DB;
class sittingController extends Controller
{
   public function setSittings(Request $request){
   $validation= $request->validate([
'nameWebsite'=>"max:30",
'Description'=>"max:256"
    ],
    [
   'nameWebsite.max'=>'عدد الحروف لا يجب أن يتجاوز 30 حرفا ',
   'Description.max'=>'عدد الحروف لا يجب أن يتجاوز 256 حرفا ',
     ] );
    if($validation)
    {
       $insertTODatabase= DB::table('sittings')->update([
'nameWebsite'=>$request->nameWebsite,
'linkWebsite'=>$request->linkWebsite,
'Description'=>$request->Description,
'socialMidiaFacebook'=>$request->socialMidiaFacebook,
'socialMidiaTelegram'=>$request->socialMidiaTelegram,
'socialMidiaInstagram'=>$request->socialMidiaInstagram,
'socialMidiaYoutube'=>$request->socialMidiaYoutube,
'Keywords'=>$request->Keywords,
        ]);
       
      
       return redirect()->back()->with('msg','تم الحفظ بنجاح');
    
}
  
   
   }
   public function getDataSittings(){
    $DataSittings=sitting::where("id",1)->first();
    
    return view('dash-board.sittings',compact('DataSittings'));
}
}
