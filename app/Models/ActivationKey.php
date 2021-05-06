<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivationKey extends Model
{
    protected $key;
    protected $activationDate;
    protected $user_id;
}
