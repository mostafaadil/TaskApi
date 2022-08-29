<?php

namespace App\Http\Controllers\Api;

use App\Creationl\Bulider\AppointmentHolder;
use  App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Creationl\Bulider\JsonResponseBulider;
use Carbon\Carbon;
use DateTime;

class AppointmentController extends Controller
{

   public function index(Request $request)
   {

      $appointment = Appointment::all();
      if (!$appointment->isEmpty()) {
         return response(["data" => $appointment, "success" => true], 200);
      } else {
         return response(["message" => "No data found", "success" => false], 400);
      }
   }


   public function getAppointmentByDate($date)
   {

      $time = new DateTime($date);
      $officialDateValue = $time->format('Y-m-d');
      $appointment = Appointment::where('date', $officialDateValue)->get();

      if (!$appointment->isEmpty()) {
         return response(["data" => $appointment, "success" => true], 200);
      } else {
         return response(["message" => "No data found", "success" => false], 400);
      }
   }

   public function store(Request $request, Appointment $appointment)
   {

      $apiKey = "b45076d6b7c34c3cb22b413750498829";
      $ip = $request->ip();
      $location = $this->get_geolocation($apiKey, $ip);
      $decodedLocation = json_decode($location, true);
      // return  $decodedLocation;
      $inputs = $request->all();

      //  $date = Carbon::parse($inputs['date']);
      $appointmentHolder = new AppointmentHolder($decodedLocation, $inputs['date']);
      $appointmentHolder->checkLocation();
      $appointmentHolder->getTimeFromDate();
      $configs = $appointmentHolder->getConfigData();
      // return $configs;
      if ($configs["zip_code"] == false) {
         $appointmentTaken = $appointment->where('start', $configs["time"]["start"])->get();
         // return $appointmentTaken;
         if ($appointmentTaken->isEmpty()) {
            $appointment->address = ""; // $configs["zip_code"]; //$inputs['address']; //the zip postal code 
            $appointment->phone = $inputs['phone'];
            $appointment->name = $inputs['name'];
            $appointment->surname = $inputs['surname'];
            $appointment->email = $inputs['email'];
            $appointment->date =  $configs["time"]["date"];
            $appointment->start = $configs["time"]["start"];
            $appointment->ends = $configs["time"]["end"];
            $isSaved = $appointment->save();
            if ($isSaved) {
               return response(["data" => $appointment, "success" => true], 200);
            } else {
               return response(["message" => "failed to save data", "success" => false], 400);
            }
         } else {
            return response(["message" => "appointment time is not available", "success" => false], 400);
         }
      } else {
         return response(["message" => "service is not available in your location ", "success" => false], 403);
      }
   }


   public function show(Appointment $appointment, $id)
   {
      //
      $resulte = $appointment->find($id);
   }


   public function edit(Appointment $appointment, $id)
   {
      //
      $resulte = $appointment->find($id);
   }


   public function update(Request $request, $id)
   {

      $appointment = new Appointment;

      $inputs = $request->all();
      $isUpdated = $appointment->where("id", $id)->update($inputs);
      if ($isUpdated > 0) {
         return response(["data" => $inputs, "success" => true], 200);
      } else {
         return response(["message" => "failed to save data", "success" => false], 400);
      }
   }



   public function destroy(Appointment $appointment, $id)
   {
      //
      $isDeleted = $appointment->where("id", $id)->delete();
      if ($isDeleted > 0) {
         return response(["data" => $appointment, "success" => true], 200);
      } else {
         return response(["message" => "failed to save data", "success" => false], 400);
      }
   }

   function get_geolocation($apiKey, $ip, $lang = "en", $fields = "*", $excludes = "")
   {
      $url = "https://api.ipgeolocation.io/ipgeo?apiKey=" . $apiKey . "&ip=" . $ip . "&lang=" . $lang . "&fields=" . $fields . "&excludes=" . $excludes;
      $cURL = curl_init();

      curl_setopt($cURL, CURLOPT_URL, $url);
      curl_setopt($cURL, CURLOPT_HTTPGET, true);
      curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
         'Content-Type: application/json',
         'Accept: application/json',
         'User-Agent: ' . $_SERVER['HTTP_USER_AGENT']
      ));

      return curl_exec($cURL);
   }
}
