<?php

namespace App\Http\Controllers;

use App\Models\User; 
use App\Traits\ApiResponser; 
use Illuminate\Http\Request;
use Illuminate\Http\Response; 
use Illuminate\Support\Facades\DB;

class UserController extends Controller {
    use ApiResponser;

    private $request;

    public function __construct(Request $request){
        $this->request = $request;
    }

    public function getUsers(){
        $users = DB::connection('mysql')->select("SELECT * FROM users");

        return response()->json($users, 200);
    }

    public function index()
    {
        $users = User::all();
        return $this->successResponse($users);
    }

    public function show($id) {
        $user = User::find($id);

        if (!$user) {
            return $this->errorResponse('User not found', Response::HTTP_NOT_FOUND);
        }

        return $this->successResponse($user);
    }

    public function add(Request $request) {
        $rules = [
            'username' => 'required|max:20',
            'password' => 'required|max:20',
            'gender' => 'required|in:Male,Female',
        ];
    
        // ✅ Lumen-compatible validation
        $validator = app('validator')->make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    
        $user = User::create($request->all());

        return $this->successResponse($user, Response::HTTP_CREATED);
    }
}
