<?php

namespace App\Http\Controllers\sumLove;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\letter;
use App\Models\ratio;
use App\Models\PinnedPages;
use App\Models\sitting;
use App\Models\adds;

class controlController extends Controller
{
    public function setAndShowResults(Request $request){
    
        $getAllPinnedPages = PinnedPages::all();
       
        
$numberLetterFirstName=strlen($request->FirstName);
$numberLetterSecondName=strlen($request->SecondName);

$valueFirstName=0;
$valueSecondName=0;
for ($counter=0; $counter <$numberLetterFirstName; $counter++) { 

    $letterValue=letter::select('value')->where('letter',$request->FirstName[$counter])->first();



         $valueFirstName+=$letterValue->value;
    
}

 for ($counter=0; $counter <$numberLetterSecondName ; $counter++) { 
  

     $letterValue=letter::select('value')->where('letter',$request->SecondName[$counter])->first();
   
  $valueSecondName+=$letterValue->value;

   
 }


 if($valueFirstName>$valueSecondName)
 {
     $value=$valueFirstName-$valueSecondName;
}
 else if($valueFirstName<$valueSecondName) {
     $value=$valueSecondName-$valueFirstName;
   
}
else if($valueFirstName==$valueSecondName)
 {
     $value=0;
    
 }

 if($value!=0)
 {$RatioResult=ratio::select('nameRatio','namePicture')->where('minValueRatio','<',$value)->where('maxValueRatio','>',$value)->first();
 
 }
 else{
     $nameRatio="معتدلة";
     return view('SumLoveWeb.resultLove',compact('getAllPinnedPages'))->with('nameRatio',$nameRatio);
 }

     return view('SumLoveWeb.resultLove',compact('getAllPinnedPages'))->with(['nameRatio'=>$RatioResult->nameRatio,'namePicture'=>$RatioResult->namePicture]);




   }
}
