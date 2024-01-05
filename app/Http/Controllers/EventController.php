<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $nome = "Kauã";
        $idade = 19;
        $profissao = "Programador";

        $arr = [1,2,3,4,5];

        $nomes = ["Kauã","Wallacy","Matuê","Roberto"];

        return view('welcome', 
        [
            'nome'=>$nome,
            'idade'=>$idade,
            'profissao'=>$profissao,
            'arr'=>$arr,
            "nomes"=>$nomes
        ]);
    }

    public function create(){
        return view('events.create');
    }
}
