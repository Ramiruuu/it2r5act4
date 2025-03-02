<?php

namespace App\Http\Controllers;

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
    }
}
