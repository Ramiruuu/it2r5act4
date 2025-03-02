<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller {
    private $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function getUsers() {
        $users = User::all();
        return $this->response($users, 200);
        
        // users = DB::connection('mysql')
        // ->select("Select * from tbluser where userid <= 3");

        // return response()->json($users, 200);
        // return response()->json(['data' => $users, 'site' => 1], 200);
        // return response()->json(['data' => $users], 200);
        // return $this->successResponse($users);  
    }
}
