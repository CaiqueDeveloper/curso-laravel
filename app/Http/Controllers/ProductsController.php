<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        return " Listagem de Produtos !";
    }

    public function show($id)
    {
        return "O ID do produto é: {$id}";
    }
}
