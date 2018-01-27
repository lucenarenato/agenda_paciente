<?php

namespace App\Http\Controllers;

use App\Agendamento;
use App\Paciente;
use App\Medico;
use Illuminate\Http\Request;

class AgendamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agendamentos = Agendamento::all();
        return view('agendamentos.lista')->with('agendamentos', $agendamentos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $method = 'post';
        $agendamento = new Agendamento();
        $pacientes = Paciente::all();
        $medicos = Medico::all();

        return view('agendamentos.form')->with('pacientes', $pacientes)
                                        ->with('medicos', $medicos)
                                        ->with('method', $method)
                                        ->with('agendamento', $agendamento);
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
            'descricao' => 'required|min:5',
            'datahora' => 'required',
            'paciente_id' => 'required',
            'medico_id' => 'required', 
            'legenda' => 'required',            
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $agendamento = new Agendamento();
            $agendamento->descricao = $request->input('descricao');
            $agendamento->datahora = $request->input('datahora');
            $agendamento->id_paciente = $request->input('paciente_id');
            $agendamento->id_medico = $request->input('medico_id');
            $agendamento->legenda = $request->input('legenda');
            $agendamento->save();

            return redirect()->route('agendamentos.index');
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
        $agendamento = Agendamento::find($id);
        $pacientes = Paciente::all();
        $medicos = Medico::all();        
        return view('agendamentos.form')->with('method', $method)
                                        ->with('agendamento', $agendamento)
                                        ->with('pacientes', $pacientes)
                                        ->with('medicos', $medicos);
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
            'descricao' => 'required|min:5',
            'datahora' => 'required',
            'paciente_id' => 'required',
            'medico_id' => 'required', 
            'legenda' => 'required',           
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $agendamento = Agendamento::find($id);
            $agendamento->descricao = $request->input('descricao');
            $agendamento->datahora = $request->input('datahora');
            $agendamento->id_paciente = $request->input('paciente_id');
            $agendamento->id_medico = $request->input('medico_id');
            $agendamento->legenda = $request->input('legenda');
            $agendamento->save();

            return redirect()->route('agendamentos.index');
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
        $agendamento = Agendamento::find($id);
        
        $agendamento->delete();

        return redirect()->route('agendamentos.index');
    }
}
