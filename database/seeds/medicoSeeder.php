<?php

use Illuminate\Database\Seeder;
use App\Medico;
use Illuminate\Support\Facades\DB;

class medicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = Medico::all()->count();

        if ($count == 0) {
            
            $medico = [
                [
                    'id' => 1,
                    'nome' => 'Dr.Fulano',
                    'crm' => '01010101-0/BR',
                    'especialidade' => 'Pediatria',
                    'telefone' => '62 99999-9999',
                ]

            ];          

            Log::info(json_encode($medico));
            $this->command->info("Carregando ".count($medico)." ...");
            foreach ($medico as $value) {
                try {
                    DB::table('pacientes')->insert($value);

                    $this->command->info("OK\t".$value['nome']);
                } catch (PDOException $error) {
                    if (intval($error->getCode()) === 23505) {
                        DB::table('medicos')->where('id', $value["id"])
                            ->update([
                                'nome' => $value['nome'],
                                'crm' => $value['crm'],
                                'especialidade' => $value['especialidade'],
                                'telefone' => $value['telefone']
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
