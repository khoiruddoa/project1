<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NasabahController extends Controller
{
    public function index()
    {
        return view('dashboard.posts.index', [
            'users' => User::where('id','1')]);
    }
}
