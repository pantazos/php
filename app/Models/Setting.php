<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'settings';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'key',
        'description',
        'value',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function scopeByKey($query, $key)
    {
        return $query->where('key', $key);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
