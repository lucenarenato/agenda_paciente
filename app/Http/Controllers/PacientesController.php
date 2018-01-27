<?php

namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Http\Request;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return view('pacientes.lista')->with('pacientes', $pacientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $method = 'post';
        $paciente = new Paciente();
        return view('pacientes.form')->with('method', $method)
                                     ->with('paciente', $paciente);
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
            'data_nascimento' => 'required',
            'telefone' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $paciente = new Paciente();
            $paciente->nome = $request->input('nome');
            $paciente->sexo = $request->input('sexo');
            $paciente->data_nascimento = $request->input('data_nascimento');
            $paciente->telefone = $request->input('telefone');
            $paciente->endereco = $request->input('endereco');

            $paciente->save();

            return redirect()->route('pacientes.index');
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
        $paciente = Paciente::find($id);
        return view('pacientes.form')->with('method', $method)
        ->with('paciente', $paciente);
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
            'nome' => 'required|min:6',
            'data_nascimento' => 'required',
            'telefone' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $paciente = Paciente::find($id);
            $paciente->nome = $request->input('nome');
            $paciente->sexo = $request->input('sexo');
            $paciente->data_nascimento = $request->input('data_nascimento');
            $paciente->telefone = $request->input('telefone');
            $paciente->endereco = $request->input('endereco');

            $paciente->save();

            return redirect()->route('pacientes.index');
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
        $paciente = Paciente::find($id);

        $paciente->delete();

        return redirect()->route('pacientes.index');
    }
}
