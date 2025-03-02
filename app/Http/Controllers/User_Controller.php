<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\User;

class UserController extends Controller 
{     
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Return the list of users
     * @return Illuminate\Http\Response
     */
    public function getUsers()
    {         
        $users = User::all();
        return response()->json($users, 200);
    }

    public function index()
    {
        $users = User::all();
        return $this->successResponse($users);
    }
}
