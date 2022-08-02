<?php

namespace App\Http\Controllers;

use App\Models\Paise;
use Illuminate\Http\Request;

class PaisesController extends Controller
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
            $paises = Paise::where('nome', 'LIKE', "%$q%")->paginate(7)->withQueryString();
        }
        else
        {
            $paises = Paise::paginate(7);
        }
        return view('paises.index', ['paises' => $paises, 'q' => $q]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paises.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Paise::create($request->all());
        return redirect(route('paises.index'));
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
        //buscar o país para editar
        $pais = Paise::where('id', '=', $id)->first();
        
        if(!empty($pais))
        {
            //renderizar a view mandando esse pais
            return view('paises.edit', ['pais' => $pais]);
        }
        return redirect(route('paises.index'));
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
            'nome' => $request->nome
        ];
        Paise::where('id', '=', $id)->update($data);
        return redirect(route('paises.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Paise::where('id', '=', $id)->delete();
        return redirect(route('paises.index'));
    }
}
