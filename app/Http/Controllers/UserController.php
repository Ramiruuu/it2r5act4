<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller; // ✅ Add this

class UserController extends Controller { // ✅ Ensure correct class name
    private $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function getUsers() {
        $users = User::all();
        return response()->json($users, 200); // ✅ Fix response
    }
}
