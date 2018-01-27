<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    //

    public function medico()
    {
        return $this->belongsTo(Medico::class, 'id_medico');
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }
    
}
