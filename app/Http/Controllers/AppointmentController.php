<?php
namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller{

 public function index()
    {   
        $appointment = Appointment::all();

        return view('appointment.index',compact('appointment'));
    }



 public function create()
    {   
        $appointment = Appointment::all();

        return view('appointment.create',compact('appointment'));
    }

  public function store(Request $request, Appointment $appointment)
    {
      
         $appointment->address=$request->address;
 $appointment->phone=$request->phone;
 $appointment->email=$request->email;
 $appointment->gfd=$request->gfd;

        $isSaved = $appointment->save();
    }

     public function show(Appointment $appointment, $id)
    {
        $appointment= $appointment->find($id);
         return view('appointment.show',compact('appointment'));

    }


    public function edit(Appointment $appointment, $id)
    {
        //
        $appointment= $appointment->find($id);
       return view('appointment.edit',compact('appointment'));

    }


    public function update(Request $request, $id)
    {
        
       $appointment = new Appointment;
        $isUpdated = $appointment ->where("id",$id)->update(array('address'=>$request->address,'phone'=>$request->phone,'email'=>$request->email,'gfd'=>$request->gfd,));
        if ($isUpdated) {
        }
    }


    
    public function destroy(Appointment $appointment, $id)
    {
        //
        $isDeleted = $appointment->where("id", $id)->delete();
        if ($isDeleted) {
        }
    }
}

