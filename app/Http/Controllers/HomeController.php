<?php

namespace App\Http\Controllers;

use App\Repositorios\DocenteRepo;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;


class HomeController extends Controller
{
    private $docente_repo = null;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DocenteRepo $docente_repo)
    {
        // $this->middleware('auth');
        $this->docente_repo = $docente_repo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'header'    => 'Componente HOME con render de Inertia',

        ];
        $MostrarMenu = true;

        if (!$this->docente_repo->hasUserDocente()) {

            flash('Es necesario registrar su informacion Personal para visualizar las opciones del Menu')
                ->error()
                ->important();
            $MostrarMenu = false;
        }

        view()->share('MostrarMenu', $MostrarMenu); //variable $MostrarMenu compartida en las vista

        return Inertia::render('Home/Index', $data); //render de Inertia para visualizar componente Vuejs
    }
}
