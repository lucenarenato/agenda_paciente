<?php

use Illuminate\Database\Seeder;
use App\Paciente;
use Illuminate\Support\Facades\DB;


class pacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = Paciente::all()->count();

        if ($count == 0) {

            
            // $paciente = Paciente::created([
            //     'nome' => 'Fulano',
            //     'sexo' => 'M',
            //     //'data_nascimento' => \Carbon::createFromDate('Y-m-d')->format('Y-m-d'), 
            //     'telefone' => '62 99999-9999',
            //     'endereco' => 'endereco fulano',
            //     // 'created_at' => Carbon\Carbon::now()->toFormattedDateString(),
            //     // 'updated_at' => Carbon\Carbon::now()->toFormattedDateString(),            
            // ]);

            $paciente = [
                [
                    'id' => 1,
                    'nome'=> 'Fulano',
                    'sexo' => 'M',
                    'telefone' => '62 99999-9999',
                    'endereco' => 'endereco fulano',
                    // 'created_at' => Carbon\Carbon::now()->toFormattedDateString(),
                    // 'updated_at' => Carbon\Carbon::now()->toFormattedDateString()
                ]

            ];          

            Log::info(json_encode($paciente));
            $this->command->info("Carregando ".count($paciente)." ...");
            foreach ($paciente as $value) {
                try {
                    DB::table('pacientes')->insert($value);

                    $this->command->info("OK\t".$value['nome']);
                } catch (PDOException $error) {
                    if (intval($error->getCode()) === 23505) {
                        DB::table('pacientes')->where('id', $value["id"])
                            ->update([
                                'nome' => $value['nome'],
                                'sexo' => $value['sexo'],
                                'telefone' => $value['telefone'],
                                //'updated_at' => Carbon\Carbon::now()->toFormattedDateString()
                            ]);
                    }

                    $this->command->info("RE\t". $value["nome"]);
                } catch (Exception $error) {
                    $this->command->info($error->getMessage());
                }
            }

            $this->command->info("Pronto.");
            

        } else {
            echo "Qtde: " . $count . " Records Inside Database!";
        }
    }
}
