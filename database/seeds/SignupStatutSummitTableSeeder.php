<?php

use Illuminate\Database\Seeder;
use App\Models\Signup;

class SignupStatutSummitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $signups = Signup::all();
        foreach ($signups as $key => $signup) {
            $signup->signup_status_summit()->create();
        }
    }
}
