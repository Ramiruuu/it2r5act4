<?php

namespace App\Http\Controllers;

use App\Models\User; 
use App\Traits\ApiResponser; 
use Illuminate\Http\Request;
use DB; 

class UserController extends Controller {
    use ApiResponser;

    private $request;

    public function __construct(Request $request){
        $this->request = $request;
    }

    public function getUsers(){
        // eloquent style
        // $users = User::all();

        // sql string as parameter
        $users = DB::connection('mysql')
            ->select("Select * from users");

        return response()->json($users, 200);
    }

    public function index()
    {
        $users = User::all();

        return $this->successResponse($users);
    }

    public function add(Request $request) {
        $rules = [
            'username' => 'required|max:20',
            'password' => 'required|max:20',
            'gender' => 'required|in:Male,Female',
        ];
    
        $this->validate($request, $rules);
    
        $user = User::create($request->all());
        return $this->successResponse($user, Response::HTTP_CREATED);
    }
}