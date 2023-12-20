<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewConfigAttribute extends Model
{
    use HasFactory;
    protected $table = 'view_config_attributes';

    public $timestamps = true;

    protected $guarded = [];
}
