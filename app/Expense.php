<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    // format関数のための処理
    protected $dates = ['buy_date'];
}

