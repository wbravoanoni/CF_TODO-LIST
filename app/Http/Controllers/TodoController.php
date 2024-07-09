<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class TodoController extends Controller{

    public function index(){
        $todos = session()->get('todos', []);
        return view('index', compact('todos'));
    }

    public function add(Request $request){
        $todos = session()->get('todos', []);
        $todos[] = $request->todo;
        session()->put('todos', $todos);
        return redirect('/');
    }

    public function delete($index){
        $todos = session()->get('todos', []);
        unset($todos[$index]);
        session()->put('todos', array_values($todos));
        // Reset keys after deletion
        return redirect('/');
    }
    
}