<?php

namespace App\Http\Controllers\sumLove;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\letter;
use App\Models\ratio;
use App\Models\PinnedPages;
use App\Models\sitting;
use App\Models\adds;
use Illuminate\Support\Facades\Validator;


class controlController extends Controller
{
  
    public function setAndShowResults(Request $request){
    
    
$validation=$request->validate([
  'FirstName'=>"required",
  "SecondName"=>"required"
],
[
  'FirstName.required'=>" الاسم الاول مطلوب",
  'SecondName.required'=>" الاسم الثاني مطلوب",
]
);



if($validation)
{


        $getAllPinnedPages = PinnedPages::all();
       
        

$valueFirstName=0;
$valueSecondName=0;
          
 
for ($counter=0; $counter <mb_strlen($request->FirstName); $counter++) { 
   
     

       $letterValue=letter::select('value')->where('letter', mb_substr($request->FirstName, $counter, 1))->first();
       if( $letterValue)
       {
        $valueFirstName+=$letterValue->value;
       }
     
   
     else 
     {
     return  abort('404');
     }

}

for ($counter=0; $counter <mb_strlen($request->SecondName) ; $counter++) { 
  

  $letterValue=letter::select('value')->where('letter', mb_substr($request->SecondName, $counter, 1))->first();
   if($letterValue)
   { $valueSecondName+=$letterValue->value;}

else 
{
  return  abort('404');
}
   
}



if($valueFirstName>$valueSecondName)
{
    $value=$valueFirstName-$valueSecondName;
}
else if($valueFirstName<$valueSecondName)
{
    $value=$valueSecondName-$valueFirstName;
   
}
else if($valueFirstName==$valueSecondName)
{
    $value=0;
    
}


$RatioResult=ratio::select('nameRatio','namePicture')->where('minValueRatio','<',$value)->where('maxValueRatio','>',$value)->first();
 


if($RatioResult)
{
  return view('SumLoveWeb.resultLove',compact('getAllPinnedPages'))->with(['nameRatio'=>$RatioResult->nameRatio,'namePicture'=>$RatioResult->namePicture]);

}
else{
  return abort('404');
}
}


   }
}
