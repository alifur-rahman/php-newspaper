<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class meta_setting_table_model extends Model
{
    public $table = "meta_setting";
    public $primaryKey = "id";
    public $incrementing = false;
    public $keyType = 'int';
    public $timestamps =false;
}
