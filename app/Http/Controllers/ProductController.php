<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products(){
        $busca = request('search');
        return view('produtos', ['busca' => $busca]);
    }

    public function productsCount($id = null){
        return view('produto',['id'=>$id]);
    }
}
