<?php

namespace Domain\Product\Models;

use Domain\Catalog\Events\CreatedPropertyEvent;
use Domain\Product\Collections\PropertyCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Support\Traits\Models\SetPosition;

class Property extends Model
{
    use HasFactory, SetPosition;

    protected $fillable = ['title'];

    public static function boot(): void
    {
        parent::boot();

        static::creating(fn(Property $model) => event(new CreatedPropertyEvent($model)),
        );
    }
    public function newCollection(array $models = []): PropertyCollection
    {
        return new PropertyCollection($models);
    }
}
