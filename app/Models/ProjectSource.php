<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class ProjectSource extends Model
{
    use HasFactory, Userstamps;

    protected $guarded = ['id'];
    
    public function budget(){
        return $this->hasMany(Budget::class,'budget_source_id');
    }
}
