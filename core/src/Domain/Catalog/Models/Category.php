<?php

namespace Domain\Catalog\Models;

use Domain\Catalog\Collections\CategoryCollection;
use Domain\Catalog\Events\CreatedCategoryEvent;
use Domain\Catalog\QueryBuilders\CategoryQueryBuilder;
use Domain\Product\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Support\Traits\Models\SetPosition;

/**
 * @method static Category|CategoryQueryBuilder query()
 */
class Category extends Model
{
    use HasFactory, SetPosition;

    protected $fillable = [
        'slug',
        'title',
        'meta_keywords',
        'meta_description',
        'on_home_page',
        'sorting',
        'position',
        'image',
    ];

    public static function boot(): void
    {
        parent::boot();

        static::creating(fn(Category $model) => event(new CreatedCategoryEvent($model)),
        );
    }

    public function newCollection(array $models = []): CategoryCollection
    {
        return new CategoryCollection($models);
    }

    public function newEloquentBuilder($query): CategoryQueryBuilder
    {
        return new CategoryQueryBuilder($query);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
