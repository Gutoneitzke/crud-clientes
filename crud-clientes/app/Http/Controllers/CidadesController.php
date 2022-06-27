<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Estado;
use Illuminate\Http\Request;

class CidadesController extends Controller
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
            $cidades = Cidade::where('nome', 'LIKE', "%$q%")->paginate(7)->withQueryString();
        }
        else
        {
            $cidades = Cidade::paginate(7);
        }
        return view('cidades.index', ['cidades' => $cidades, 'q' => $q]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = Estado::all();
        return view('cidades.create', ['estados' => $estados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cidade::create($request->all());
        return redirect(route('cidades.index'));
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
        //buscar a cidade para editar
        $cidade = Cidade::where('id', '=', $id)->first();
        $estados = Estado::all();
        
        if(!empty($cidade))
        {
            //renderizar a view mandando essa cidade
            return view('cidades.edit', ['estados' => $estados, 'cidade' => $cidade]);
        }
        return redirect(route('cidades.index'));
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
            'estado_id' => $request->estado_id,
        ];
        Cidade::where('id', '=', $id)->update($data);
        return redirect(route('cidades.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cidade::where('id', '=', $id)->delete();
        return redirect(route('cidades.index'));
    }
}
