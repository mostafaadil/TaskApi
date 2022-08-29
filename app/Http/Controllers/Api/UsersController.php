<?php

namespace App\Http\Controllers\Api;

use  App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Creationl\Bulider\JsonResponseBulider;
use App\Creationl\Bulider\UniqueKeysGenerator;
use App\Models\Sessions;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

   private $jsonResponseBulider;


   public function index(Request $request)
   {

      $users = Users::all();
      if (!$users->isEmpty()) {
         return response(["data" => $users, "success" => true], 200);
      } else {
         return response(["message" => "No data found", "success" => false], 400);
      }
   }

   public function login(Request $request)
   {
      $inputs = $request->all();
      $user = Users::where(array('email' => $inputs['email'], "password" => $inputs['password']))->get();
      if ($user != null) {

         $sessions = new  Sessions();
         $sessions->user_id = $user[0]->id;
         $sessions->token = UniqueKeysGenerator::generateUniqueKey(500);
         $isSaved = $sessions->save();
         if ($isSaved) {
            $user[0]['token'] = $sessions->token;
            return response(["data" => $user[0], "success" => true], 200);
         } else if (!$isSaved) {
            return response(["message" => "login filed", "success" => false], 400);
         }
      } else {
         return response(["message" => "login filed", "success" => false], 400);
      }
   }


   public function store(Request $request, Users $users)
   {

      $inputs = $request->all();
      $isInUse = Users::where("email", $inputs['email'])->get();
      if ($isInUse->isEmpty()) {
         $users->name = $inputs['name'];
         $users->email = $inputs['email'];
         $users->password = Hash::make($inputs['password']);
         $isSaved = $users->save();
         if ($isSaved) {
            return response(["data" => $users, "success" => true], 200);
         } else {
            return response(["message" => "failed to save data", "success" => false], 400);
         }
      } else {
         return response(["message" => "failed to save data, email is already in use ", "success" => false], 400);
      }
   }


   public function logOut(Request $request)
   {
      $logInRemoved = Sessions::where("token", $request->bearerToken())->delete();

      if ($logInRemoved) {
         return response(["success" => true, "message" => "logout successfully"], 200);
      } else {
         return response(["message" => "failed to logout", "success" => false], 400);
      }
   }


   public function show(Users $users, $id)
   {
      //
      $resulte = $users->find($id);
   }


   public function edit(Users $users, $id)
   {
      //
      $resulte = $users->find($id);
   }


   public function update(Request $request, $id)
   {

      $users = new Users;
      $inputs = $request->all();
      $isUpdated = $users->where("id", $id)->update($inputs);
      if ($isUpdated > 0) {
         return response(["data" => $inputs, "success" => true], 200);
      } else {
         return response(["message" => "failed to save data", "success" => false], 400);
      }
   }



   public function destroy(Users $users, $id)
   {
      //
      $isDeleted = $users->where("id", $id)->delete();

      if ($isDeleted > 0) {
         return response(["data" => $users, "success" => true], 200);
      } else {
         return response(["message" => "failed to save data", "success" => false], 400);
      }
   }
}
