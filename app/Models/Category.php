<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'categories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'key',
        'color',
        'icon',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function providers(): BelongsToMany
    {
        return $this->belongsToMany(User::class,
            'category_user',
            'category_id',
            'provider_id');
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function scopeByKey($query, $key)
    {
        return $query->where('key', $key);
    }
}
