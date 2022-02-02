<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Credential;
use App\Category;
use Illuminate\Support\Facades\DB;

class CredentialController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $credential = Credential::Paginate(10);       
        return view('admin.credential.index',compact('credential'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.credential.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     
        $validated = $request->validate([

            'title' =>'required|max:255',
            'url'=>'required|url',
            'username'=>'required',
            'password'=>'required',
            'category_id'=>'required',
            'value'=>'unique:meta',
        ]);

        $credential = new Credential;
        $credential->title = $request->input('title');
        $credential->description = $request->input('description');
        $credential->url = $request->input('url');
        $credential->username = $request->input('username');
        $credential->password = $request->input('password');
        $credential->category_id = $request->input('category_id');
        $credential->save();

        if(is_array($request->key) && count(array_filter( $request->key))>0)
        {
            $keyString = str_replace(' ', '_',$request->key);
            $metadata = array_combine($keyString, $request->value);
            $credential->syncMeta(array_unique($metadata));
            // dd($cred);
        }
                     
        return redirect(route('credential.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $credential = Credential::find($id);
        $cred = $credential->getAllMeta();
        return view('admin.credential.show',compact('credential','cred'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $credential = Credential::find($id);
        $categories = Category::all();
        $cred = $credential->getAllMeta();
        // dd($cred);
        return view('admin.credential.edit',compact('credential','categories','cred'));    
    }

    public function update(Request $request, Credential $credential)
    {      
        $validated = $request->validate([

            'title' =>'required|max:255',
            'url'=>'url',
            'username'=>'required',
            'password'=>'required|',
            'category_id'=>'required',
        ]);
       
       // $user = User::find($id);
        $credential->title = $request->input('title');
        $credential->description = $request->input('description');
        $credential->url = $request->input('url');
        $credential->username = $request->input('username');
        $credential->password = $request->input('password');
        $credential->category_id = $request->input('category_id');
        $credential->update();
        $credential->purgeMeta();
        if(is_array($request->key) && count(array_filter( $request->key))>0)
        {
            $keyString = str_replace(' ', '_',$request->key);
            $metadata = array_combine($keyString,$request->value);
            $credential->syncMeta(array_unique($metadata));
        }

        return redirect(route('credential.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $credential = Credential::find($id);
        $credential->destroy($id);
        return redirect()->back();
    }

}
