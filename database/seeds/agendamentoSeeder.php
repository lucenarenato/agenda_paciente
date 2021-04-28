<?php

use Illuminate\Database\Seeder;
use App\Agendamento;
use App\Paciente;
use App\Medico;
//use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class agendamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = Agendamento::all()->count();

        if ($count == 0) {
            // $dt = Carbon::now();
            // $dateNow = $dt->toDateTimeString();

            $agendamento = [
                [
                    'id' => 1,
                    'id_paciente' => 1,
                    'id_medico' => 1,
                    'descricao' => 'teste agendamento',                
                    'datahora' => '2021-04-28 17:18:59',
                    'legenda' => 'teste agendamento legenda'      
                ]

            ];          


            $this->command->info("Carregando ".count($agendamento)." ...");
            foreach ($agendamento as $value) {
                try {
                    DB::table('agendamentos')->insert($value);

                    $this->command->info("OK\t".$value['descricao']);
                } catch (PDOException $error) {
                    if (intval($error->getCode()) === 23505) {
                        DB::table('agendamentos')->where('id', $value["id"])
                            ->update([
                                
                                'id_paciente' => $value['id_paciente'],
                                'id_medico' => $value['id_medico'],
                                'descricao' => $value['descricao'],
                                'datahora' => $value['datahora'],
                                'legenda' => $value['legenda']
                            ]);
                    }

                    $this->command->info("RE\t". $value["descricao"]);
                } catch (Exception $error) {
                    $this->command->info($error->getMessage());
                }
            }

            $this->command->info("Pronto.");

            
            Log::info(json_encode($agendamento));

        } else {
            echo "Qtde: " . $count . " Records Inside Database!";
        }
    }
}

