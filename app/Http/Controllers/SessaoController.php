<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessaoController extends Controller
{
    public function criar()
    {
        session()->put('usuario_id', '123');
    }

    public function ler()
    {
        return response()->json(['usuario_id' => session()->get('usuario_id')]);
    }

    public function verifica()
    {
        if (session()->has('usuario_id')) {
            return response('Existe!');
        } else {
            return response('Não existe!');
        }
    }

    public function remove()
    {
        session()->forget('usuario_id');
    }
}

