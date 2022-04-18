<?php

namespace App\Http\Controllers\sumLove;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\letter;
use App\Models\ratio;
use App\Trait\validationValueTrait;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class setGetDataDashbordController extends Controller
{
    use validationValueTrait;
public function showLetters(){
    $letters=letter::get();
return view('dash-board.showLetters',compact('letters'));
}
public function deleteLetter($id){
letter::find($id)->delete();
return redirect()->route('showLetters');
}
public function updateLetter($id){
    
    $letter=letter::where('id',$id)->first();
    return view('dash-board.setLetter',compact('letter'));
}
public function setLetter(){
return view('dash-board.setletter');
}
public function setLetterIntoDatabase(Request $request){
    
    if($request->id)
    {
        
        $validation= $request->validate([
            'letter'=>"required|max:1|unique:letters,letter,".$request->id,
            'value'=>"required|numeric|unique:letters,value,".$request->id,
        ],
                [
                    'letter.required'=>'الحرف مطلوب', 'value.required'=>'  قيمة الحرف مطلوبة ','letter.max'=>'  عدد الحروف يجب الا يتعدى الحرف الواحد ',
                    'value.numeric'=>'القيمة يجب أن تكون عدد ','letter.unique'=>'الحرف موجود سابقاً ','value.unique'=>'القيمة موجودة سابقاً ',
                ]
            );
    }
    else{
        $validation= $request->validate([
            'letter'=>"required|max:1|unique:letters,letter",
            'value'=>"required|numeric|unique:letters,value",
                ],[
                    'letter.required'=>'الحرف مطلوب', 'value.required'=>'  قيمة الحرف مطلوبة ','letter.max'=>'  عدد الحروف يجب الا يتعدى الحرف الواحد ',
                    'value.numeric'=>'القيمة يجب أن تكون عدد ','letter.unique'=>'الحرف موجود سابقاً ','value.unique'=>'القيمة موجودة سابقاً ',
                ]);
    }
   
            if($validation)
            {
              letter::updateOrCreate(
                 ['id'=>$request->id] ,[
        'letter'=>$request->letter,
        'value'=>$request->value,
                ]);
               
              
               return redirect()->route('showLetters');
            
        }
          
           
           }
           public function setRatio(){
               return view('dash-board.setRatio');
           }
           public function showRatios()
        {
            $ratios=ratio::get();
            return view('dash-board.showRatio',compact('ratios')); 
        }
        
           public function  setRatioIntoDatabase(Request $request)
           {
         

                                
                               if($request->id)
                               {
                                $validation=$request->validate([
                                    'nameRatio'=>"required|max:100|unique:ratio,nameRatio,".$request->id,
                                    'minValue'=>"required|numeric|unique:ratio,minValueRatio,".$request->id,
                                    'maxValue'=>"required|numeric|unique:ratio,maxValueRatio,".$request->id,
                                    'pictureForShow'=> "required" 
                           
                                ],['nameRatio.required'=>'اسم النسبة مطلوب ',
                                'nameRatio.max'=>'يجب الا يحتوي اسم النسبة على أكثر من 100 حرفاً',
                                'nameRatio.unique'=>'اسم النسبة موجود سابقاً ',
                                'minValue.required'=>'الحد الادنى للنسبة مطلوب  ',
                                'minValue.numeric'=>'الحد الادنى للنسبة يجب أن يكون رقم  ',
                                'minValue.unique'=>'الحد الادنى للنسبة موجود سابقاً  ',
                                'maxValue.required'=>'الحد الاعلى للنسبة مطلوب  ',
                                'maxValue.numeric'=>'الحد الاعلى للنسبة يجب أن يكون رقم  ',
                                'maxValue.unique'=>'الحد الاعلى للنسبة موجود سابقاً  ',
                                'pictureForShow.required'=>'الصورة مطلوبة   ',]);
                            //   Rule::unique('nameRatio')->ignore($request->id)] , Rule::unique('minValueRatio')->ignore($request->id)]
                                        
                                        $minValue=$request->minValue;
                                        $maxValue=$request->maxValue;
                                       $idd= ratio::find($request->id);
                                       
                                            $validationValue=$this->ValidationValue($minValue,$maxValue,$request->id);
                                    }
                                      
                                       else{
                                        $validation= $request->validate([
                                            'nameRatio'=>"required|max:100|unique:ratio,nameRatio",
                                                'minValue'=>"required|numeric|unique:ratio,minValueRatio",
                                                    'maxValue'=>"required|numeric|unique:ratio,maxValueRatio",  
                                                    'pictureForShow'=> "required",                                  
                                                        ],
                                                    ['nameRatio.required'=>'اسم النسبة مطلوب ',
                                                    'nameRatio.max'=>'يجب الا يحتوي اسم النسبة على أكثر من 100 حرفاً',
                                                    'nameRatio.unique'=>'اسم النسبة موجود سابقاً ',
                                                    'minValue.required'=>'الحد الادنى للنسبة مطلوب  ',
                                                    'minValue.numeric'=>'الحد الادنى للنسبة يجب أن يكون رقم  ',
                                                    'minValue.unique'=>'الحد الادنى للنسبة موجود سابقاً  ',
                                                    'maxValue.required'=>'الحد الاعلى للنسبة مطلوب  ',
                                                    'maxValue.numeric'=>'الحد الاعلى للنسبة يجب أن يكون رقم  ',
                                                    'maxValue.unique'=>'الحد الاعلى للنسبة موجود سابقاً  ',
                                                    'pictureForShow.required'=>'الصورة مطلوبة   ',
                                                    ]);
                                                        $minValue=$request->minValue;
                                                        $maxValue=$request->maxValue;
                                                        $validationValue=$this->ValidationValue($minValue,$maxValue,$request->id);
                                       }
                                      
                           
           
                    if($validation&&$validationValue=="yes")
                    {
                      ratio::updateOrCreate(
                         ['id'=>$request->id] ,[
                'nameRatio'=>$request->nameRatio,
                'minValueRatio'=>$request->minValue,
                'maxValueRatio'=>$request->maxValue,
                'namePicture'=> $request->pictureForShow->getClientOriginalName(),
                        ]);
                       if($request->hasFile('pictureForShow'))
                       {
                           $name=$request->pictureForShow->getClientOriginalName();
                       $path=$request->pictureForShow->move(public_path('imageForRatio'),$name);
                       return redirect()->route('showRatio');
                       }
                }
                else {
                    return redirect()->route('setRatio')->with('message','القيمة بين الحد الادنى والحد الاعلى مستخدمة سابقاً');
                }
              
           }
           public function updateRatio($id){
            $ratios=ratio::where('id',$id)->first();
            
            return view('dash-board.setRatio',compact('ratios'));
           }
           public function  deleteRatio($id){
            ratio::find($id)->delete();
            return redirect()->route('showRatio');
           }
}