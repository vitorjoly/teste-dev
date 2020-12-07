<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artigos;
use Illuminate\Support\Facades\Auth;
use App\Crawler\Quest;


class CapturaController extends Controller
{   
    //Exibir as informacoes do historico
    public function historico() {
        return view('historico', [
            'artigos' => Artigos::orderBy('id', 'desc')->paginate(5)
        ]);
    }
    
    
    public function captura(Request $request) {
        //valida o termo de busca
        $request->validate([
            'form-captura-input' => 'required',
        ]);

        
        $quest = new Quest();

        $artigos = $quest->executa(Auth::id(), $request->input('form-captura-input'));
        
        Artigos::insert($artigos);

        return redirect()->route('historico');
    }

    public function deletar(Artigos $artigo) {
        $artigo->delete();
        return redirect()->route('historico');
    }
}