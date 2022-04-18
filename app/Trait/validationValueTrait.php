<?php

namespace App\Trait;
use App\Models\ratio;
trait validationValueTrait
{
    
    public function ValidationValue($minValueRatio,$maxValueRatio,$id)
    {
        if($id)
        {
            $ratios=ratio::where('id','!=',$id)->get();
            $ratiosNumber=ratio::count();
            $ratiosNumber= $ratiosNumber-1;
        }
        else{
            $ratios=ratio::get();
            $ratiosNumber=ratio::count();
        }
        $counterError=0;
      
      
        foreach($ratios as $ratio )
        {
            
            $maxValueRatioData =$ratio->maxValueRatio;
            $minValueRatioData =$ratio->minValueRatio;
            if($minValueRatio < $maxValueRatioData && $minValueRatio > $minValueRatioData || $maxValueRatio> $minValueRatioData &&  $maxValueRatio< $maxValueRatioData)
            {
                $counterError++;
            }
          
        }
        if($counterError!=0)
        {
            $validationValue="";
        }
      else{
        $validationValue="yes";
      }
      return $validationValue;
    
}
}