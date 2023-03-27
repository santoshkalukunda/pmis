<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Wildside\Userstamps\Userstamps;

class Project extends Model
{
    use HasFactory, Userstamps, HasSlug;

    protected $guarded = ['id'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    protected $attributes = [
        'fiscal_year_id' => 'default_value',
    ];

    public function save(array $options = [])
    {
        if (empty($this->fiscal_year_id)) {
            $this->fiscal_year_id = Session::get('active_fiscal_year');
        }

        return parent::save($options);
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function projectType(){
        return $this->belongsTo(ProjectType::class);
    }

    public function office(){
        return $this->belongsTo(Office::class);
    }

    public function fiscalYear(){
        return $this->belongsTo(FiscalYear::class);
    }


    public function financial(){
        return $this->hasMany(Financial::class,'project_id');
    }

    public function acheivement(){
        return $this->hasMany(Acheivement::class,'project_id');
    }

    public function indicator(){
        return $this->hasMany(Indicator::class,'project_id');
    }

    public function photo(){
        return $this->hasMany(Photo::class,'project_id');
    }

    public function budget(){
        return $this->hasMany(Budget::class,'project_id');
    }

    public function expenditure(){
        return $this->hasMany(Expenditure::class,'project_id');
    }
}
