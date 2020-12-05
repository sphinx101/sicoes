<?php

namespace App\Http\Requests;

use App\Models\Docente;
use Illuminate\Foundation\Http\FormRequest;

class RequestCreateDocente extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return Docente::$rules;
    }
}
