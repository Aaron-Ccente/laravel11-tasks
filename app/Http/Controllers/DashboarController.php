<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboarController extends Controller
{
    //
    public function index(){
        //usuario autentificado
        $user = Auth::user();
        //los tasks del usuario en la variable task
        $tasks = $user->tasks;
        //retornamos la vista dentro de la variable tasks
        return view('dashboard', compact('tasks'));
    }
}
