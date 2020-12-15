<?php

use Illuminate\Database\Seeder;
use App\Models\Signup;
use Illuminate\Support\Facades\DB;

class SignupStatutSummitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $signups = DB::connection("mysql_payement")->table("_signup")->get();

        foreach ($signups as $key => $value) {
            $signup = Signup::firstOrCreate([
                "fullname" => $value->Fullname,
                "email" => $value->Email,
                "phone" => $value->Phone,
                "company" => $value->Company,
                "paystatus" => $value->_paystatut,
                "ticked_id" => $value->TicketID,
                "tchrono" => $value->Tchrono,
            ]);
            $signup->signup_status_summit()->create();
        }
    }
}
