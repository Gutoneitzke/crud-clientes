<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Paise;
use Illuminate\Http\Request;

class EstadosController extends Controller
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
            $estados = Estado::where('nome', 'LIKE', "%$q%")->paginate(7)->withQueryString();
        }
        else
        {
            $estados = Estado::paginate(7);
        }
        return view('estados.index', ['estados' => $estados, 'q' => $q]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = Paise::all();
        return view('estados.create', ['paises' => $paises]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Estado::create($request->all());
        return redirect(route('estados.index'));
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
        //buscar o estado para editar
        $estado = Estado::where('id', '=', $id)->first();
        $paises = Paise::all();
        
        if(!empty($estado))
        {
            //renderizar a view mandando esse estado
            return view('estados.edit', ['estado' => $estado, 'paises' => $paises]);
        }
        return redirect(route('estados.index'));
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
            'pais_id' => $request->pais_id,
        ];
        Estado::where('id', '=', $id)->update($data);
        return redirect(route('estados.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Estado::where('id', '=', $id)->delete();
        return redirect(route('estados.index'));
    }
}
