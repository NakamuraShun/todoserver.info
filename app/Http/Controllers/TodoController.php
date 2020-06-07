<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    //index
    public function index(Request $request){
        $user_id = Auth::id();
        $user = Auth::user();
        $sort = $request->sort;
        $todos = DB::table('todos')
        ->where('user_id' , $user_id )
        ->get();
        $param = ['sort'=>$sort,'user'=>$user,'todos'=>$todos];
        
        if(Auth::check()){
            return view('todos/index',$param); 
        }else{
            return redirect('login');
        };
    }
    
    //create
    public function create(Request $request){
        $user_id = Auth::id();
        $data = ['body'=>$request->body,'user_id'=>$user_id];
        DB::table('todos')
        ->insert($data);
        return redirect('/');
    }
    
    //show
    public function show(Request $request ,$id){
        $todo = DB::table('todos')
        ->where('id',$id)
        ->first();
        return view('todos/show',['todo'=>$todo]);
    }
    
    //edit
    public function edit(Request $request ,$id){
        $todo = DB::table('todos')
        ->where('id',$id)
        ->first();
        return view('todos/edit',['todo'=>$todo]);
    }
    
    //update
    public function update(Request $request){
        $data = ['body'=>$request->body];
        $todo = DB::table('todos')
        ->where('id',$request->id)
        ->update($data);
        return redirect('/');
    }
    
    //delete
    public function delete(Request $request ,$id){
        DB::table('todos')
        ->where('id',$id)
        ->delete();
        return redirect('/');
    }
    
    //search
    public function search(Request $request){
        $searchWord = $request->search_string;
        $user_id = Auth::id();
        $todos = DB::table('todos')
        ->where('user_id', '=', $user_id)
        ->where('body','like','%' . $searchWord .'%')
        ->get();
        $param = ['todos'=>$todos,'searchWord'=>$searchWord];
        return view('todos/index',$param);
    }
}