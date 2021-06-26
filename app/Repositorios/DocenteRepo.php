<?php

namespace App\Repositorios;

use App\User;
use Exception;
use App\Models\Docente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\RequestCreateDocente;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class DocenteRepo
{
    private $URL_PHOTO_DOCENTE = 'photos/docentes/';

    protected $docente = null;
    protected $docentes = [];

    public function getDocentes()
    {

        if (Auth::user()->type === 'supervisor') {
            $this->docentes = Docente::with('user')->with('centrotrabajo')->get();
            //$this->docentes = Docente::all();
        } else { //else Director
            $this->docentes = Docente::with('user')
                ->with('centrotrabajo')
                ->whereCentrotrabajo_id(Auth::user()->docente->centrotrabajo_id)->get();
        }
        return $this->docentes;
    }

    public function getDocente($docente_id)
    {
        //return Docente::whereId($docente_id)->with('user')->with('centrotrabajo')->get();
        return Docente::find($docente_id);
    }


    /**
     * store
     *
     * @param  mixed $data
     * @return void
     */
    public function store(RequestCreateDocente $data)
    {
        //$photo_up = request()->file('photo');
        try {

            DB::transaction(function () use ($data) {
                $puesto = \App\Models\Role::where('id', $data['type'])->first()->name;
                $photo_name = $this->savePhoto($data);
                $user = User::create([
                    'name' => $data['nombre'],
                    'email' => $data['email'],
                    'type' => $puesto,
                    'photo_name' => $photo_name,
                    'password' => bcrypt('12345678')
                ]);
                $rol = \App\Models\Role::where('id', $data['type'])->get();
                $user->attachRole($rol[0]);
                $newdocente = $user->docente()->create([
                    'centrotrabajo_id' => $data['centrotrabajo_id'],
                    'rfc'              => $data['rfc'],
                    'curp'             => $data['curp'],
                    'nombre'           => $data['nombre'],
                    'appaterno'        => $data['appaterno'],
                    'apmaterno'        => $data['apmaterno'],
                    'domicilio'        => $data['domicilio'],
                    'localidad'        => $data['localidad'],
                    'municipio'        => $data['municipio'],
                    'estado'           => $data['estado'],
                    'telefono'         => $data['telefono'],
                    'celular'          => $data['celular']
                ]);
                $this->docente = $newdocente;
            });
        } catch (Exception $error) {

            return [
                'errors' => [
                    'message' => $error->getMessage(),
                    'code' => $error->getCode(),
                ],
                'success' => false
            ];
        }

        return  [
            'data' => $this->docente,
            'success' => true
        ];
    }

    public function update($data)
    {
        try {

            DB::transaction(function () use ($data) {
                $docente_modificado = Docente::find($data->id);
                $DocenteField = Schema::getColumnListing('docentes');
                foreach ($DocenteField as $field) {
                    if (isset($data[$field])) {
                        if ($docente_modificado[$field] !== $data[$field]) {

                            $docente_modificado[$field] = $data[$field];
                        }
                    } else {
                        if (isset($data['user'])) {
                            if ($docente_modificado->user->email !== $data['user']['email']) {
                                $docente_modificado->user->email = $data['user']['email'];
                                $docente_modificado->user->save();
                            }
                        }
                    }
                }

                $docente_modificado->save();
                $this->docente = $docente_modificado;
            });
        } catch (QueryException $qEx) {
            return [
                'errors' => [
                    'message' => $qEx->getMessage(),
                    'sql_exception_code' => $qEx->getCode(),
                    'code' => 404
                ],
                'success' => false
            ];
        } catch (ModelNotFoundException $mEx) {
            return [
                'errors' => [
                    'message' => $mEx->getMessage(),
                    'sql_exception_code' => $mEx->getCode(),
                    'code' => 404
                ],
                'success' => false
            ];
        } catch (Exception $error) {
            return [
                'errors' => [
                    'message' => $error->getMessage(),
                    'sql_exception_code' => '',
                    'code' => $error->getCode(),
                ],
                'success' => false
            ];
        }

        return  [
            'data' => $this->docente,
            'success' => true
        ];
    }

    public function remove($docente_id)
    {

        try {
            DB::transaction(function () use ($docente_id) {
                $docente = Docente::find($docente_id);
                $docente->user->delete();
                $docente->delete();
            });
        } catch (QueryException $qEx) {
            return [
                'errors' => [
                    'message' => $qEx->getMessage(),
                    'sql_exception_code' => $qEx->getCode(),
                ],
                'success' => false
            ];
        } catch (\Exception $e) {
            return [
                'errors' => [
                    'message' => $e->getMessage(),
                    'exception_code' => $e->getCode(),
                ],
                'success' => false
            ];
        }
        return [
            'data' => '',
            'success' => true,
        ];
    }

    /**
     * hasUserDocente
     *
     * @return void
     */
    public static function hasUserDocente()
    {
        $user = User::find(Auth::id());
        return $user->docente != null ? true : false;
    }

    public function savePhoto($request)
    {
        $photoName = 'photo-user.png';

        if ($request->photo != null) {

            $photoName = $request['curp'] . '.jpg';
            $photo = Image::make($request->photo)->encode('jpg', 85);
            $photo->resize(640, 480, function ($constraint) {
                $constraint->upsize();
            });
            Storage::put($this->URL_PHOTO_DOCENTE . $photoName, $photo->stream());
        }
        return $photoName;
    }
}
