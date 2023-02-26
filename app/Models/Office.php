<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Office extends Model
{
    use HasFactory, Userstamps, HasSlug;

    protected $guarded = ['id'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('english-name')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeActive($query, $active = true)
    {
        return $query->where('active', $active);
    }

    public function parentOffice()
    {
        return $this->belongsTo(Office::class, 'parent_id');
    }

    public function childOffices()
    {
        return $this->hasMany(Office::class, 'parent_id');
    }
}
