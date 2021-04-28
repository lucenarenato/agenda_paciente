<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Str;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = User::all()->count();

        if ($count == 0) {
            static $password;
            $user = User::create([
                'name' => 'Renato',
                //'last_name' => 'Lucena',
                'email' => 'cpdrenato@gmail.com',                
                //'password' => bcrypt(Str::random(15)),
                'password' => $password ?: $password = bcrypt('secret'),
                //'role_id' => 5,
                //'permission' => 1
            ]);

        } else {
            echo "Qtde: " . $count . " Records Inside Database!";
        }
    }
}
