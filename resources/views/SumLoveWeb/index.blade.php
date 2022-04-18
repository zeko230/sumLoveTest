
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>


@isset($adds){!! $adds->atHead  !!} @endisset
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
            </div></div>
    
        
        
    
    <div class="col-6 col-md-9 d-flex justify-content-end align-items-center ">
     
    </div></div>

    @isset($adds){!! $adds->atTop !!} @endisset
    @if ($errors->any())
    <div class=" d-flex justify-content-center">
    <div class="error">
    <div class="container">
    <div class="alert row" style="background-color:#ff6150 ">
        <ul >
            @foreach ($errors->all() as $error)
                <li  style="color:white ;font-family: Arabic;" class=>{{ $error }}</li>
            @endforeach
        </ul>
    </div></div></div></div>
@endif
    <div class="d-flex justify-content-center">

    <form action="{{ route('setAndShowResults') }}" method="post" class="form ">
        @csrf
    <div class="container mb-5">
        <div class="row mb-5 p-5 ">
       
            <div class="col-12 mb-4 d-flex justify-content-center">
                <h3 class="titleForm text-center rounded"> نسبة الحب</h3>
            </div>       
<div class="col-12 mb-3">
    <label for="form-control"  class="form-label styleLabel" >الاسم الاول</label>
   
<input type="text" name="FirstName" class="form-control">
</div>
<div class="col-12 mb-4 ">
    <label for="form-control" class="form-label styleLabel" >الاسم الثاني</label>
    <input type="text" name="SecondName"  id="form-control" class="form-control">
    </div>
    <div class="col-12 mb-3 d-flex justify-content-center ">
        
        <button  type="submit" style="background-color: #ff6150; color:#fff;" class=" btn  ">حساب</button>
        </div>
</div>


  </div></form></div>
  @if(session()->has('nameRatio'))
  <div class="d-flex justify-content-center">
<div class="result">
  <div class="container mb-5">
    <div class="row mb-5 p-5 ">
        <div class="col-12 mb-4 ">
<h4 class="titleResult  rounded">النتيجة :</h4>
<h4 class="resultRatio ">{{ session('nameRatio') }}</h4>
</div>
</div></div></div></div>
    @endif

<footer >
        <div class="row background pt-4">
            
            @isset($getAllPinnedPages)
            @foreach($getAllPinnedPages as $getAllPinnedPage)
            <a href="{{ route('pindPagesData',['id'=>$getAllPinnedPage->id]) }}" class="col-3 d-flex  justify-content-center align-items-center constantPages">{{ $getAllPinnedPage->page_name }}</a>
            @endforeach
            
            @endisset
            
  
            <div class="col socialMedia d-flex justify-content-center">
            <a target="_blank" href="">
                <svg  xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                width="30" height="30"
                viewBox="0 0 172 172"
                style=" fill:#000000;"><g  fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path  d="M0,172v-172h172v172z" fill="none"></path><g><path  d="M86,17.91667c-37.60139,0 -68.08333,30.48195 -68.08333,68.08333c0,37.60139 30.48195,68.08333 68.08333,68.08333c37.60139,0 68.08333,-30.48195 68.08333,-68.08333c0,-37.60139 -30.48195,-68.08333 -68.08333,-68.08333z" fill="#9aa1a1"></path><path  d="M95.21633,104.04567h17.61925l2.76633,-17.89875h-20.38917v-9.7825c0,-7.43542 2.4295,-14.02875 9.38475,-14.02875h11.17642v-15.61975c-1.96367,-0.26517 -6.11675,-0.84567 -13.96425,-0.84567c-16.38658,0 -25.9935,8.65375 -25.9935,28.36925v11.90742h-16.84525v17.89875h16.84525v49.19558c3.33608,0.50167 6.71517,0.84208 10.18383,0.84208c3.13542,0 6.19558,-0.28667 9.21633,-0.69517z" fill="#ffffff"></path></g></g></svg></a>
       
       
       <a target="_blank" href=" @isset($DataSittings){{ $DataSittings->socialMidiaYoutube }} @endisset " ><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
        width="30" height="30"
        viewBox="0 0 172 172"
        style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><path d="M86,14.33333c-39.58041,0 -71.66667,32.08626 -71.66667,71.66667c0,39.58041 32.08626,71.66667 71.66667,71.66667c39.58041,0 71.66667,-32.08626 71.66667,-71.66667c0,-39.58041 -32.08626,-71.66667 -71.66667,-71.66667z" fill="#9aa1a1"></path><path d="M50.16667,68.08333h14.33333v53.75h-14.33333zM57.29033,60.91667h-0.07883c-4.2785,0 -7.04483,-3.18917 -7.04483,-7.17025c0,-4.06708 2.85233,-7.16308 7.20608,-7.16308c4.36092,0 7.04483,3.096 7.12725,7.16308c0,3.98108 -2.76633,7.17025 -7.20967,7.17025zM125.41667,87.79167c0,-10.88617 -8.82217,-19.70833 -19.70833,-19.70833c-6.67217,0 -12.55958,3.32533 -16.125,8.39933v-8.39933h-14.33333v53.75h14.33333v-28.66667c0,-5.93758 4.81242,-10.75 10.75,-10.75c5.93758,0 10.75,4.81242 10.75,10.75v28.66667h14.33333c0,0 0,-32.53308 0,-34.04167z" fill="#ffffff"></path></g></g></svg></a>
           <a  href="@isset($DataSittings){{ $DataSittings->socialMidiaYoutube }} @endisset"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
            width="30" height="30"
            viewBox="0 0 172 172"
            style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9aa1a1"><path d="M86,22.93333c-23.99973,0 -55.14974,6.01328 -55.14974,6.01328l-0.07839,0.08958c-10.93074,1.74816 -19.30521,11.14085 -19.30521,22.5638v34.4v0.0112v34.3888v0.0112c0.02203,11.26967 8.22905,20.85323 19.3612,22.60859l0.0224,0.0336c0,0 31.15001,6.02448 55.14974,6.02448c23.99973,0 55.14974,-6.02448 55.14974,-6.02448l0.0112,-0.0112c11.14496,-1.75176 19.36049,-11.34921 19.37239,-22.63099v-0.0112v-34.3888v-0.0112v-34.4c-0.01654,-11.27391 -8.22487,-20.86376 -19.3612,-22.61979l-0.02239,-0.03359c0,0 -31.15001,-6.01328 -55.14974,-6.01328zM68.8,59.61771l45.86667,26.38229l-45.86667,26.38229z"></path></g></g></svg></a>
           
            <a target="_blank" href="@isset($DataSittings){{ $DataSittings->socialMidiaInstagram }} @endisset"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
            width="30" height="30"
            viewBox="0 0 172 172"
            style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9aa1a1"><path d="M57.33333,21.5c-19.78717,0 -35.83333,16.04617 -35.83333,35.83333v57.33333c0,19.78717 16.04617,35.83333 35.83333,35.83333h57.33333c19.78717,0 35.83333,-16.04617 35.83333,-35.83333v-57.33333c0,-19.78717 -16.04617,-35.83333 -35.83333,-35.83333zM129,35.83333c3.956,0 7.16667,3.21067 7.16667,7.16667c0,3.956 -3.21067,7.16667 -7.16667,7.16667c-3.956,0 -7.16667,-3.21067 -7.16667,-7.16667c0,-3.956 3.21067,-7.16667 7.16667,-7.16667zM86,50.16667c19.78717,0 35.83333,16.04617 35.83333,35.83333c0,19.78717 -16.04617,35.83333 -35.83333,35.83333c-19.78717,0 -35.83333,-16.04617 -35.83333,-35.83333c0,-19.78717 16.04617,-35.83333 35.83333,-35.83333zM86,64.5c-11.87412,0 -21.5,9.62588 -21.5,21.5c0,11.87412 9.62588,21.5 21.5,21.5c11.87412,0 21.5,-9.62588 21.5,-21.5c0,-11.87412 -9.62588,-21.5 -21.5,-21.5z"></path></g></g></svg></a>
           
           <a href="@isset($DataSittings){{ $DataSittings->socialMidiaTelegram }} @endisset"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
            width="30" height="30"
            viewBox="0 0 172 172"
            style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><path d="M86,14.33333c-39.58041,0 -71.66667,32.08626 -71.66667,71.66667c0,39.58041 32.08626,71.66667 71.66667,71.66667c39.58041,0 71.66667,-32.08626 71.66667,-71.66667c0,-39.58041 -32.08626,-71.66667 -71.66667,-71.66667z" fill="#9aa1a1"></path><path d="M121.65417,53.75l-13.42317,68.53483c0,0 -0.57692,3.13183 -4.46125,3.13183c-2.064,0 -3.12825,-0.98183 -3.12825,-0.98183l-29.07517,-24.12658l-14.22583,-7.17025l-18.25708,-4.85542c0,0 -3.25008,-0.93883 -3.25008,-3.62633c0,-2.23958 3.34325,-3.30742 3.34325,-3.30742l76.38233,-30.34367c-0.00358,-0.00358 2.33275,-0.84208 4.03483,-0.8385c1.04633,0 2.23958,0.44792 2.23958,1.79167c0,0.89583 -0.17917,1.79167 -0.17917,1.79167z" fill="#ffffff"></path><path d="M82.41667,109.30958l-12.2765,12.09017c0,0 -0.53392,0.41208 -1.247,0.43c-0.24725,0.00717 -0.51242,-0.03225 -0.78475,-0.15408l3.45433,-21.37458z" fill="#b0bec5"></path><path d="M107.13092,65.20233c-0.60558,-0.78833 -1.72358,-0.93167 -2.51192,-0.33325l-47.28567,28.29758c0,0 7.5465,21.113 8.69675,24.768c1.15383,3.65858 2.07833,3.74458 2.07833,3.74458l3.45433,-21.37458l35.23133,-32.594c0.78833,-0.59842 0.93525,-1.72 0.33683,-2.50833z" fill="#cfd8dc"></path></g></g></svg></a>
           
        </div>
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
.error{
    width:40rem;
   
}
.socialMedia{
    margin-top: 5rem;
}
svg:hover{
fill: #ff6150;
}
    @media only screen and (max-width: 500px) {
       
  
    .fonts{
        font-size: 13px;
        font-weight: 400;
    }
    .logo{
        height: 2rem;
    }
}

</style>