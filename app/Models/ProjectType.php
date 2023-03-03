<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class ProjectType extends Model
{
    use HasFactory, Userstamps;

    protected $guarded = ['id'];

    public function project(){
        return $this->hasMany(Project::class,'project_type_id');
    }
}
