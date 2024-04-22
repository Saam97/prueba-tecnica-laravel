<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard.index', [
            'titulo' => 'Panel Adminitracion'
        ]);
    }

    public function indexUsuario(){
        return view('usuario.dashboard.index', [
            'titulo' => 'Usuario Panel de Administracion'
        ]);
    }
}
