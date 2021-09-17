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
    
    public function create()
    {
        return "Exibindo Form de Cadastro de Produto";
    }

    public function store()
    {
        return "Enviando as Informações do Produto para o Banco";
    }

    public function edit($id)
    {
        return "Exbindo Form de Edição do Produto {$id}";
    }

    public function update($id)
    {
        return "Atualzando Informações no Banco do Produto {$id}";
    }

    public function destroy($id)
    {
        return "Deletendo o Produto de id {$id}";
    }
}
