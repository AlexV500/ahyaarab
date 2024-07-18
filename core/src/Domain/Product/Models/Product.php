<?php

namespace Domain\Product\Models;

use App\Jobs\ProductJsonProperties;
use Domain\Catalog\Collections\CategoryCollection;
use Domain\Catalog\Events\CreatedProductEvent;
use Domain\Catalog\Models\Category;
use Domain\Product\Collections\PropertyCollection;
use Domain\Product\QueryBuilders\ProductQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;
use Support\Casts\PriceCast;
use Support\Traits\Models\HasThumbnail;
use Support\Traits\Models\SetPosition;

/**
 * @property int $id
 * @property string $slug
 * @property int $price
 * @property string $thumbnail
 * @property bool $on_home_page
 * @property int $sorting
 * @property string $text
 * @property array $json_properties
 * @property CategoryCollection|Category[] $categories
 * @property PropertyCollection|Property[] $properties
 *
 * @method static Product|ProductQueryBuilder query()
 */
class Product extends Model
{
    use HasFactory;
//    use HasThumbnail;
//    use Searchable;
    use SetPosition;
    protected $guarded = false;
//    protected $fillable = [
//        'title',
//        'slug',
//        'price',
//        'thumbnail',
//        'on_home_page',
//        'sorting',
//        'text',
//        'json_properties'
//    ];

    protected $casts = [
        'price' => PriceCast::class,
    ];

//    protected static function boot()
//    {
//        parent::boot();
//
//        static::saved(function (Product $product) {
//            ProductJsonProperties::dispatch($product)
//                ->delay(now()->addSeconds(10));
//        });
//    }

//    protected function thumbnailDir(): string
//    {
//        return 'products';
//    }

    public static function boot(): void
    {
        parent::boot();

        static::creating(fn(Product $model) => event(new CreatedProductEvent($model)),
        );
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Property::class)
            ->withPivot('value');
    }

    public function getImagePath() : string
    {
        return get_catalog_image_path('product');
    }

//    public function newEloquentBuilder($query): ProductQueryBuilder
//    {
//        return new ProductQueryBuilder($query);
//    }


}
