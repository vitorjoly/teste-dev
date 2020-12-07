<?php

namespace App\Crawler;

class Quest {
    public function executa($userId, $criterio){
        $html=$this->capturaCURL($criterio);
    
        return $this->tratar($userId, $html);
    }


    private function capturaCURL($criterio){
        $curl = curl_init('https://www.questmultimarcas.com.br/estoque?termo=' . $criterio);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $html = curl_exec($curl);

        curl_close($curl);

        return $html;
    }

    //Tratamento da informacao
    private function tratar($userId, $html) {
        preg_match_all('/<article\sclass="card\sclearfix"\sid="[^>]+?>(.+?<\/article>)\s/s', $html, $cards);
        
        $cardList = [];
        foreach($cards[0] as $card) {
            //Filtras informacoes do veiculo
            preg_match('/<div\sclass="card__img"[^<]+?<a\shref="(.+?)">/s', $card, $link);
            preg_match('/<h2\sclass="card__title\sui-title-inner"><a\shref="[^<]+?>(.+?)</s', $card, $modeloCarro);
            preg_match('/<span\sclass="card-list__title">\s(.+?[^<]+?)<\/span>.+?<span\sclass="card-list__info">\s(.+?[^<])</s', $card, $ano);
            preg_match('/(Combustível:)\s<\/span[^<]+?<span\sclass="[^<]+?>(.+?)<\/span>/s', $card, $combustivel);
            preg_match('/(Portas:)\s<\/span[^<]+?<span\sclass="[^<]+?>(.+?)<\/span>/s', $card, $portas);
            preg_match('/(Quilometragem:)\s<\/span[^<]+?<span\sclass="[^<]+?>(.+?)<\/span>/s', $card, $quilometragem);
            preg_match('/(Câmbio:)\s<\/span[^<]+?<span\sclass="[^<]+?>(.+?)<\/span>/s', $card, $cambio);
            preg_match('/(Cor:)\s<\/span[^<]+?<span\sclass="[^<]+?>(.+?)<\/span>/s', $card, $cor);

            $aux = [
                'user_id' => $userId,
                'nome_veiculo' => array_pop($modeloCarro),
                'link' => array_pop($link),
                'ano' => trim(array_pop($ano)),
                'combustivel' => trim(array_pop($combustivel)),
                'portas' => trim(array_pop($portas)),
                'quilometragem' => trim(array_pop($quilometragem)),
                'cambio' => trim(array_pop($cambio)),
                'cor' => trim(array_pop($cor)),
            ];

            $cardList[] = $aux;

        }
        
        return $cardList;

    }
    
}