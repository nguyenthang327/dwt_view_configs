<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewConfig extends Model
{
    use HasFactory;

    protected $table = 'view_configs';

    public $timestamps = true;

    protected $guarded = [];

    public function viewConfigAttributes()
    {
        return $this->hasMany(viewConfigAttribute::class);
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'view_config_has_departments', '');
    }


    // public function viewConfigDepartments()
    // {
    //     return $this->belongsToMany(Department::class, 'view_config_department', 'view_config_id', 'department_id');
    // }
}
