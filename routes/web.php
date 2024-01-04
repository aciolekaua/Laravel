<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
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
    ]
);
});

Route::get('/contact',function(){
    return view('contact');
});

Route::get('/produtos',function(){

    $busca = request('search');
    return view('produtos', ['busca' => $busca]);
});

Route::get('/produtos_teste/{id?}',function($id = null){
    return view('produto',['id'=>$id]);
});
