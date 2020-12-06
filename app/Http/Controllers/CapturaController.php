<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artigos;
use Illuminate\Support\Facades\Auth;

class CapturaController extends Controller
{   
    //Exibir as informacoes do historico
    public function historico() {
        return Artigos::all();
    }
    
    //Crawler
    //pegar o termo => Entrada de informacao
    //Acessar o site
    //Pesquisar no site o criterio
    //Pegar o retorno de informacoes
    //Salvar no banco
    //Deu certo ou nao?
    public function captura(Request $request) {
        //valida o termo de busca
        $request->validate([
            'form-captura-input' => 'required',
        ]);



        $html = $this->capturaCURL($request->input('form-captura-input'));
        return $this->tratar($html);
    }

    //Tratamento da informacao
    private function tratar($html) {
        preg_match_all('/<div\sid="pixad-listing"\sclass="list">(.*)\s<ul\sclass="pagination">/s', $html, $cards);

        //return ($posts);

        //$cards = [];
        $card = [];
        foreach($cards[0] as $card) {
            //Filtras informacoes do veiculo
            preg_match('/<div\sclass="card__img">\s(.+?<a\shref){1}.+?>/s', $card, $link);
            preg_match_all('/<span\sclass="card-list__title">\s(.+?<\/span>){2}/s', $card, $ano);
            preg_match('/<span\sclass="card-list__title">\s(.+?<\/span>){2}/s', $card, $combustivel);
            preg_match('/<span\sclass="card-list__title">\s(.+?<\/span>){2}/s', $card, $portas);
            preg_match('/<span\sclass="card-list__title">\s(.+?<\/span>){2}/s', $card, $quilometragem);
            preg_match('/<span\sclass="card-list__title">\s(.+?<\/span>){2}/s', $card, $cambio);
            preg_match('/<span\sclass="card-list__title">\s(.+?<\/span>){2}/s', $card, $cor);

            return ($card);
            
        }
        
        $array = [
            'id' => '1',
            'user_id' => '1',
            'nome_veiculo' => 'gol',
            'link' => 'www',
            'ano' => '2000',
            'combustivel' => 'gas',
            'portas' => '4',
            'quilometragem' => '200',
            'cambio' => 'aut',
            'cor' => 'branco',
        ];

    }

    private function capturaCURL($criterio){
        $curl = curl_init('https://www.questmultimarcas.com.br/estoque?termo=' . $criterio);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $html = curl_exec($curl);

        curl_close($curl);

        return $html;
    }

    
}
