<?php
namespace App\Http\Controllers;

use App\Models\Sessions;
use Illuminate\Http\Request;

class SessionsController extends Controller{

 public function index()
    {   
        $sessions = Sessions::all();

        return view('sessions.index',compact('sessions'));
    }



 public function create()
    {   
        $sessions = Sessions::all();

        return view('sessions.create',compact('sessions'));
    }

  public function store(Request $request, Sessions $sessions)
    {
      
        
        $isSaved = $sessions->save();
    }

     public function show(Sessions $sessions, $id)
    {
        $sessions= $sessions->find($id);
         return view('sessions.show',compact('sessions'));

    }


    public function edit(Sessions $sessions, $id)
    {
        //
        $sessions= $sessions->find($id);
       return view('sessions.edit',compact('sessions'));

    }


    public function update(Request $request, $id)
    {
        
       $sessions = new Sessions;
        $isUpdated = $sessions ->where("id",$id)->update(array());
        if ($isUpdated) {
        }
    }


    
    public function destroy(Sessions $sessions, $id)
    {
        //
        $isDeleted = $sessions->where("id", $id)->delete();
        if ($isDeleted) {
        }
    }
}

