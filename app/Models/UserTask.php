<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTask extends Model
{
    protected $table ='tasks_users_relation';

    public $timestamps = true;
}
