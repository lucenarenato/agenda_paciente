<?php

namespace App\Http\Controllers;

use App\Medico;
use Illuminate\Http\Request;

class MedicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = Medico::all();
        return view('medicos.lista')->with('medicos', $medicos);
    }

    // API
    public function listaMedicos(){
        $medicos = Medico::all();
        return response()->json($medicos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $method = 'post';
        $medico = new Medico();
        return view('medicos.form')->with('method', $method)
                                     ->with('medico', $medico);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'nome' => 'required|min:3',
            'crm' => 'required',
            'especialidade' => 'required',
            'telefone' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $medico = new Medico();
            $medico->nome = $request->input('nome');
            $medico->crm = $request->input('crm');
            $medico->especialidade = $request->input('especialidade');
            $medico->telefone = $request->input('telefone');
            $medico->save();

            return redirect()->route('medicos.index');
        }
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
        $method = 'put';
        $medico = Medico::find($id);
        return view('medicos.form')->with('method', $method)
        ->with('medico', $medico);
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
        $validator = \Validator::make($request->all(), [
            'nome' => 'required|min:3',
            'crm' => 'required',
            'especialidade' => 'required',
            'telefone' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $medico = Medico::find($id);
            $medico->nome = $request->input('nome');
            $medico->crm = $request->input('crm');
            $medico->especialidade = $request->input('especialidade');
            $medico->telefone = $request->input('telefone');
            $medico->save();

            return redirect()->route('medicos.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medico = Medico::find($id);
        
        $medico->delete();
        
        return redirect()->route('medicos.index');
    }
}
