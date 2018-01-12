<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notebook;
use Illuminate\Support\Facades\Auth;

class NotebooksController extends Controller
{
    public function index(){
    	//$notebooks = Notebook::all();
    	$user = Auth::user();
        $notebooks = $user->notebooks;
    	return view('notebooks.index',compact('notebooks'));
    }

    public function create(){
    	return view('notebooks.create');
    }

    public function store(Request $request){
    	$dataInput = $request->all();
        $user = Auth::user();
        $user->notebooks()->create($dataInput);

    	return redirect('/notebooks');
    }
    public function edit($id){
    	//$notebook = Notebook::where('id',$id)->first();  /// first() means getting only the first data
        $user = Auth::user();
        $notebook = $user->notebooks()->find($id);
        //$notebook = $user->notebooks()->where('id',$id)->first($id);
    	return view('notebooks.edit')->with('notebook',$notebook);
    }
    public function update(Request $request, $id){
    	//$notebook = Notebook::where('id',$id)->first();
    	//$notebook->update($request->all());
        $user = Auth::user();
        $notebook = $user->notebooks()->find($id);
        $notebook->update($request->all());
    	return redirect('/notebooks');
    }
    public function destroy($id){
    	//$notebook = Notebook::where('id',$id)->first();
        $user = Auth::user();
        $notebook = $user->notebooks()->find($id);
    	$notebook->delete();
    	return redirect('/notebooks');
    }
}
