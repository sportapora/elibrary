<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(BookReview::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function scopeSearch(Builder $query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $k) {
            return $query->where('judul', 'like', '%' . $k . '%')
                ->orWhere('penerbit', 'like', '%' . $k . '%')
                ->orWhere('penulis', 'like', '%' . $k . '%')
                ->orWhere('tahunTerbit', 'like', '%' . $k . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $c) {
            $query->whereHas('category', function ($query) use ($c) {
                return $query->where('id', '=', $c);
            });
        });
    }
}
