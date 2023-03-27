<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Wildside\Userstamps\Userstamps;

class FiscalYear extends Model
{
    use HasFactory, Userstamps, HasSlug;

    protected $guarded = ['id'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('fiscal_year')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function activeFiscalYear()
    {
        return $this->hasMeny(ActiveFiscalYear::class, 'fiscal_year_id');
    }

    public function project()
    {
        return $this->hasMany(Project::class, 'fiscal_year_id');
    }

    public function financial()
    {
        return $this->hasMany(Financial::class, 'fiscal_year_id');
    }

    public function acheivement()
    {
        return $this->hasMany(Acheivement::class, 'fiscal_year_id');
    }

    public function budget(){
        return $this->hasMany(Budget::class,'fiscal_year_id');
    }

    public function expenditure(){
        return $this->hasMany(Expenditure::class,'fiscal_year_id');
    }
    public function indicator(){
        return $this->hasMany(Indicator::class,'fiscal_year_id');
    }
}
