<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cliente;
use App\Http\Resources\ClienteResource;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return ClienteResource::collection(Cliente::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $cliente = new Cliente;
        $cliente->nome = $request->nome;
        $cliente->cpf = $request->cpf;
        $cliente->data_de_nascimento = $request->data_de_nascimento;        
        $cliente->telefone = $request->telefone;
        $cliente->bairro = $request->bairro;
        $cliente->produtos_id = $request->produtos_id;
        $cliente->save();
        return new ClienteResource($cliente);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $cliente = Cliente::findOrFail($id);
        return new ClienteResource($cliente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $cliente = Cliente::findOrFail($id);
        if($request->nome)
            $cliente->nome = $request->nome;
        if($request->cpf)
            $cliente->cpf = $request->cpf;
        if($request->data_de_nascimento)
            $cliente->data_de_nascimento = $request->data_de_nascimento;
        if($request->telefone)
            $cliente->telefone = $request->telefone;
        if($request->bairro)
            $cliente->bairro = $request->bairro;
        if($request->produtos_id)
            $cliente->produtos_id = $request->produtos_id;
        $cliente->save();
        return new ClienteResource($cliente);
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Cliente::destroy($id);
        return response()->json(['DELETADO']);
    }
}
