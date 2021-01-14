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
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\RequestCreateDocente;
use App\Http\Resources\DocenteResourceCollection;
use App\Models\Docente;

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
        return Inertia::render('Docente/Listado/Index.vue');
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
        //return response()->json(request()->file('photo'));
        /*$this->validate($request, [
            'photo' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);*/
        //$photo_up=request()->file('photo');

        $rs = $this->docente_repo->store($request);

        if ($rs['success']) {
            return response()->json(new DocenteResource($rs['data']), 201);
        } else {
            return response()->json($rs['errors'], 500);
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
        if (request()->ajax()) {
            $rs = $this->docente_repo->remove($id);
            if (!$rs['success']) {
                return response()->json($rs['errors'], 500);
            }
            return response()->json('');
        }
        abort(500);
    }

    //************************** METODOS AUXILIARES ********************************************* */
    public function getDocentes(Request $request)
    {

        if ($request->ajax()) {
            $docentes = $this->docente_repo->getDocentes();
            return response()->json(new DocenteResourceCollection($docentes));

            /*$docentes = $this->docente_repo->getDocentes();

            return DataTables::of($docentes)
                ->addColumn('nombre_completo', function (Docente $docente) {
                    return $docente->nombre_completo;
                })
                ->addColumn('acciones', function ($docente) {
                    $btn = '<a href="docentes/' . $docente->id .
                        '" class="btn btn-success btn-sm" role="button"><i class="fas fa-eye" aria-hidden="true"></i></a>';
                    $btn = $btn . '<a href="#" @click.prevent="editData()" class="btn btn-warning btn-sm" role="button"
                                  ><i class="fas fa-edit" aria-hidden="true"></i></a>';
                    return $btn;
                })
                ->rawColumns(['acciones'])
                ->make(true);*/
        }
        abort(404);
    }
}
