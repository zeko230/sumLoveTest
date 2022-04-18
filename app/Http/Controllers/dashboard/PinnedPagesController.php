<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\PinnedPages;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\sitting;

class PinnedPagesController extends Controller
{
    //  for secure
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $getAllPinnedPage = PinnedPages::all();
        $DataSittings=sitting::where("id",1)->first();
        return view('dash-board.AllpinnedPage' , compact(['getAllPinnedPage','DataSittings']));
    }


    public function create(){
        $DataSittings=sitting::where("id",1)->first();
        return view('dash-board.create',compact('DataSittings'));
    }

// |image|mimes:png,jpg,jpeg,svg,gif|max:2048|dimensions:min_width=256,min_height=300,max_width=720,max_height=920', /* required|image|mimes:png,jpg,jpeg,svg,gif|max:2048 */
    public function store(Request $request)
    {

        $validation=$request->validate([
            'page_name'     => 'required',
            'href'          => 'required|unique:pinned_pages,href',
            'keyword'       => 'required',
            'content'       => 'required',
            'photo'         => 'required|image|mimes:png,jpg,jpeg,svg,gif|max:2048|dimensions:min_width=256,min_height=420,max_width=720,max_height=920'
        ],
        [
            'page_name.required'=>'اسم الصفحة مطلوب','href.required'=>'رابط الصفحة مطلوب','keyword.required'=>'الكلمات المفتاحية مطلوبة لتحسين محركات البحث',
            'content.required'=>'محتوى الصفحة مطلوب','photo.required'=>'الصورة مطلوبة','href.unique'=>'رابط الصفحة موجود سابقا ',
            
                    ]
    );


      if($request->hasFile('photo')){
            $newImageName = time(). '.' . $request->photo->extension();
            $request->photo->move(public_path('uploading/') , $newImageName);
        }
        else {
            $newImageName ="لايوجد" ;
        }

        $mydata=PinnedPages::create([
            'page_name'  => $request->input('page_name'),
            'href'       => $request->input('href'),
            'slug'       => Str::slug($request->page_name),
            'keyword'    => $request->input('keyword'),
            'content'    => $request->input('content') ,
           'photo'      => $newImageName
            
        ]);
    
        return redirect()->route('createPage')
        ->with('success', 'added data');
    
    }





    public function edit(PinnedPages $pinnedPages , $id)
    {
        $findId = PinnedPages::find($id);
        return view('dash-board.editPage' , compact('findId'));
    }


    public function update(Request $request, PinnedPages $pinnedPages ,$id)
    {
        $findId = PinnedPages::find($id);
        $request->validate([
            'page_name'     => 'required',
            'href'          => 'required|unique:pinned_pages,href',
            'keyword'       => 'required',
            'content'       => 'required',
            'photo'         => 'required|image|mimes:png,jpg,jpeg,svg,gif|max:2048|dimensions:min_width=256,min_height=420,max_width=720,max_height=920'
        ],
        [
'page_name.required'=>'اسم الصفحة مطلوب','href.required'=>'رابط الصفحة مطلوب','keyword.required'=>'الكلمات المفتاحية مطلوبة لتحسين محركات البحث',
'content.required'=>'محتوى الصفحة مطلوب','photo.required'=>'الصورة مطلوبة','href.unique'=>'رابط الصفحة موجود سابقا ',

        ]

    );

        $pathImg = str_replace('\\' , '/' ,public_path('uploading/')).$findId->photo;
        if(File::exists($pathImg)){
            File::delete($pathImg);
        }
        $newImageName = time().'.'. $request->photo->extension();
        $request->photo->move(public_path('uploading/') , $newImageName);



            $findId->page_name = $request->page_name;
            $findId->href      = $request->href;
            $findId->keyword   = $request->keyword;
            $findId->content   = $request->content;
            $findId->photo     = $request->photo;
            $findId->update();

        return redirect()->route('createPage')
            ->with('success' , 'Successfully updated Data');
    }


    public function destroy(PinnedPages $pinnedPages , $id)
    {
        $findId = PinnedPages::find($id);
        $destination =  str_replace('\\' , '/' ,public_path('uploading/')).$findId->photo;
        if(File::exists($destination)){
            File::delete($destination);
            $findId->delete();
            return  redirect()->route('main.pages')
                ->with('success' , 'Successfully Deleted Data');
        }
        $findId->delete();
        return  redirect()->route('main.pages')
            ->with('success' , 'Successfully Deleted Data');
    }
}
