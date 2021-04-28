<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //\Artisan::call('db:seed', array('--class' => 'DatabaseSeeder', '--force' => true));

        //Model::unguard();
        $this->call(userSeeder::class);
        $this->call(pacienteSeeder::class);
        $this->call(medicoSeeder::class);
        $this->call(agendamentoSeeder::class);
    }
}
