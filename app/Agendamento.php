<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $table = 'agendamentos';

    protected $fillable = [
        'id_paciente', 'id_medico', 'descricao', 'datahora', 'legenda'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function medico()
    {
        return $this->belongsTo(Medico::class, 'id_medico');
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }
    
}
