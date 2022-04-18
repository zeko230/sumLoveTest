<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>


@isset($adds){!! $adds->atHead  !!} @endisset
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@isset($DataSittings){{ $DataSittings->Description }} @endisset">
    <meta name="keywords" content="@isset($DataSittings){{ $DataSittings->keywords }} @endisset">
    <link rel="stylesheet" href="{{ asset('css/styleLove.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>    @isset($DataSittings){{ $DataSittings->nameWebsite }} @endisset
    </title>
</head>


<body style="background-color: #EDF0EF;">
    
    <div class="row background mb-5" >
        <div class="col-6 col-md-3 d-flex  justify-content-start  justify-content-sm-end align-items-center  " style=" height: 4.5rem;">
            <a class="fs-1 logo white me-2 me-sm-0 logoMain" href="{{ route('HomeLove') }}">نسبة الحب</a>   
        </div>
        </div>
        
        
    
    <div class="col-6 col-md-9 d-flex justify-content-end align-items-center ">
     
    </div></div>
     @isset($adds){!! $adds->atTop !!} @endisset



  @isset($nameRatio)
  <div class="d-flex justify-content-center">
<div class="result">
  <div class="container mb-5">
    <div class="row mb-5 p-0 p-sm-5 ">
        <img class=" col-12 mb-4  imgResult " src="{{ asset("imageForRatio/".$namePicture."") }}"  >
        <hr>
        <div class="col-12 mb-4 ">
            
<h4 class="titleResult  rounded">النتيجة :</h4>
<h4 class="resultRatio ">{{$nameRatio }}</h4>
</div>
</div></div></div></div>
    @endisset

    <div class="d-flex justify-content-center">
        <div class="redirect">
          <div class="container mb-5">
            <div class="row mb-5   ">
                <div class="col-12 d-flex justify-content-center align-items-center mt-4  ">
<a href="{{ route('HomeLove') }}" class="btn redirectButton" >اضغط لإجراء اختبار أخر</a>
                </div>
            </div></div></div></div>
  
            <footer class="footerPindPage" >
                <div class="row background pt-4">
                    @isset($getAllPinnedPages)
                    @foreach($getAllPinnedPages as $getAllPinnedPage)
                    <a href="{{ route('pindPagesData',['id'=>$getAllPinnedPage->id]) }}" class="col-3 fonts d-flex  justify-content-center align-items-center constantPages">{{ $getAllPinnedPage->page_name }}</a>
                    @endforeach
                    
                    @endisset
                </div>
            </footer>
    @isset($adds){!! $adds->otherSite !!} @endisset
</body>
</html>
<style>
@font-face {
    font-family: Arabic;
    src: url("{{ asset('fonts/Monadi.ttf') }}");
}
.constantPages{
    text-decoration: none;
    color: #fff;
    background-color: #ff6150;
    font-family: Arabic;
}
.constantPages:hover{
    background-color: #fff;
    color:#ff6150;
}
.redirectButton{
    
color:#fff;
background-color: #ff6150;
    width: 12rem;
    
    font-size: 15px;
    font-family: Arabic;

    }
.imgResult{
   height: auto;
    object-fit: contain;
}
.resultImg{
    width:40rem;
    background-color: #fff;
   height: 20rem;
    
}
.redirect{
    height: 6rem;
    background-color: #fff;
    width:40rem;
}
.logoMain{
    text-decoration: none;
    color: #fff;
    background-color: #ff6150;
    
}
.logoMain:hover{
    background-color: #ff6150;
    color:#fff;
}
.logo{
        height: 3rem;
    }


@media only screen and (max-width: 500px) {
    .redirectButton{
        width: 9rem;
    }
    .contentPindPage{
        font-size: 12px;
    }
    .fonts{
        font-size: 13px;
        font-weight: 400;
    }
    .logo{
        height: 2rem;
    }
}
</style>