<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SignupStatutSummit extends Model
{
    //
    protected $fillable = [
        "presence",
        "sigup_id"
    ];

    public function signup()
    {
        return $this->belongsTo("App\Models\Signup", "sigup_id");
    }
}
