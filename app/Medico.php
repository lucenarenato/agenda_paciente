<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $table = 'medicos';

    protected $fillable = [
        'nome', 'crm', 'especialidade', 'telefone'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class, 'id_medico', 'id');
    }
}
