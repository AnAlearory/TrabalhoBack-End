<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\produto;
use App\Http\Resources\ProdutoResource;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProdutoResource::collection(Produto::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produto = new Produto;
        $produto->produto = $request->produto;
        $produto->marca = $request->marca;
        $produto->fabricante = $request->fabricante;        
        $produto->lote = $request->lote;
        $produto->preco = $request->preco;
        $produto->qtd_estoque = $request->qtd_estoque;
        $produto->save();
        return new ProdutoResource($produto);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::findOrFail($id);
        return new ProdutoResource($produto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);
        if($request->produto)
            $produto->produto = $request->produto;
        if($request->marca)
            $produto->marca = $request->marca;
        if($request->fabricante)
            $produto->fabricante = $request->fabricante;
        if($request->lote)
            $produto->lote = $request->lote;
        if($request->preco)
            $produto->preco = $request->preco;
        if($request->qtd_estoque)
            $produto->qtd_estoque = $request->qtd_estoque;
        $produto->save();
        return new ProdutoResource($produto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produto::destroy($id);
        return response()->json(['DELETADO']);
    }
}
