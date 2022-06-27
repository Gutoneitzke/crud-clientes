<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->query('q', null);
        if($q)
        {
            $clientes = Cliente::where('nome', 'LIKE', "%$q%")->paginate(7)->withQueryString();
        }
        else
        {
            $clientes = Cliente::paginate(7);
        }
        return view('clientes.index', ['clientes' => $clientes, 'q' => $q]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cidades = Cidade::all();
        return view('clientes.create', ['cidades' => $cidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cliente::create($request->all());
        return redirect(route('clientes.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //buscar o cliente para editar
        $cliente = Cliente::where('id', '=', $id)->first();
        $cidades = Cidade::all();
        
        if(!empty($cliente))
        {
            //renderizar a view mandando esse cliente
            return view('clientes.edit', ['cliente' => $cliente, 'cidades' => $cidades]);
        }
        return redirect(route('clientes.index'));
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
        $data = [
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'sexo' => $request->sexo,
            'cidade_id' => $request->cidade_id,
        ];
        Cliente::where('id', '=', $id)->update($data);
        return redirect(route('clientes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cliente::where('id', '=', $id)->delete();
        return redirect(route('clientes.index'));
    }
}
