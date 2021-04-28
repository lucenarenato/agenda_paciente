<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';

    protected $fillable = [
        'nome',
        'sexo',
        'data_nascimento',
        'telefone',
        'endereco',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class, 'id_paciente', 'id');
    }
}
