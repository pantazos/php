<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'services';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'key',
        'description',
        'icon',
        'duration',
        'price',
        'category_id',
        'commission_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function commission()
    {
        return $this->belongsTo(Commission::class, 'commission_id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function scopeByKey($query, $key)
    {
        return $query->where('key', $key);
    }

    public function getBookingsCountAttribute()
    {
        return $this->bookings->count();
    }

    public function getReviewsCountAttribute()
    {
        return $this->reviews->count();
    }

    public function getAverageRatingAttribute()
    {
        if (!$this->rating) return '0';

        $average = $this->reviews->avg('rating');
        return substr($average, 0, 3);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
