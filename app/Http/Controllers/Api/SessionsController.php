<?php

namespace App\Http\Controllers\Api;

use  App\Http\Controllers\Controller;
use App\Models\Sessions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Creationl\Bulider\JsonResponseBulider;



class SessionsController extends Controller
{


   public function index(Request $request)
   {

      $sessions = Sessions::all();
      if (!$sessions->isEmpty()) {
         return response(["data" => $sessions, "success" => true], 200);
      } else {
         return response(["message" => "No data found", "success" => false], 400);
      }
   }


   public function getsessions($id)
   {
      $sessions = Sessions::find($id);


      if (!$sessions->isEmpty()) {
         return response(["data" => $sessions, "success" => true], 200);
      } else {
         return response(["message" => "No data found", "success" => false], 400);
      }
   }


   public function store(Request $request, Sessions $sessions)
   {

      $inputs = $request->all();
      $sessions->id = $inputs['id'];
      $sessions->user_id = $inputs['user_id'];
      $sessions->token = $inputs['token'];
      $sessions->created_at = $inputs['created_at'];
      $sessions->updated_at = $inputs['updated_at'];

      $isSaved = $sessions->save();
      if ($isSaved) {
         return response(["data" => $sessions, "success" => true], 200);
      } else {
         return response(["message" => "failed to save data", "success" => false], 400);
      }
   }


   public function show(Sessions $sessions, $id)
   {
      //
      $resulte = $sessions->find($id);
   }


   public function edit(Sessions $sessions, $id)
   {
      //
      $resulte = $sessions->find($id);
   }


   public function update(Request $request, $id)
   {

      $sessions = new Sessions;
      $isUpdated = $sessions->where("id", $id)->update(array('id' => $request->id, 'user_id' => $request->user_id, 'token' => $request->token, 'created_at' => $request->created_at, 'updated_at' => $request->updated_at,));

      if ($isUpdated > 0) {
         return response(["data" => $sessions, "success" => true], 200);
      } else {
         return response(["message" => "failed to save data", "success" => false], 400);
      }
   }



   public function destroy(Sessions $sessions, $id)
   {
      //
      $isDeleted = $sessions->where("id", $id)->delete();

      if ($isDeleted > 0) {
         return response(["data" => $sessions, "success" => true], 200);
      } else {
         return response(["message" => "failed to save data", "success" => false], 400);
      }
   }
}
