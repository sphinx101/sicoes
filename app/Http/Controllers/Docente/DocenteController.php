<?php

namespace App\Http\Controllers\Docente;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Repositorios\DocenteRepo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\DocenteResource;
use App\Repositorios\CentrotrabajoRepo;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\RequestCreateDocente;

class DocenteController extends Controller
{
    private $centrotrabajo_repo;
    private $docente_repo;

    public function __construct(DocenteRepo $docente_repo, CentrotrabajoRepo $ctr)
    {
        $this->centrotrabajo_repo = $ctr;
        $this->docente_repo = $docente_repo;
        view()->share('MostrarMenu', true); //variable $MostrarMenu compartida en las vista
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ccts = $this->centrotrabajo_repo->mapCCT();
        $roles = \App\Models\Role::whereIn('name', ['director', 'docente'])->get();

        $props = [
            'ccts' => $ccts,
            'roles' => $roles
        ];
        return Inertia::render('Docente/Registro/Index.vue', $props);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCreateDocente $request)
    {

        //$request['user_id'] = Auth::user()->id;
        //return Redirect::route('home');
        //return Inertia::location('/home');
        $rs = $this->docente_repo->store($request);

        if ($rs['success']) {
            return response()->json(new DocenteResource($rs['data']), 201);
        } else {
            return response()->json($rs['errors'], $rs['errors']['code']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
