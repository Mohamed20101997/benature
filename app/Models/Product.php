<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use Translatable;

    protected $with = ['translations'];
    protected $translatedAttributes = ['name', 'description'];
    protected $appends = ['image_path', 'is_favored'];
    protected $fillable = [
        'photo',
        'price',
        'special_price',
        'special_price_type',
        'special_price_start',
        'special_price_end',
        'code',
        'category_id',
        'qty',
        'in_stock',
        'weight',
        'length',
        'width',
        'height',
        'slug',
        'is_active',
        'filter',
        'material_id',
        'brand_id',
        'country_id',
        'category_id',
        'is_popular',
    ];

    protected $casts = [
        'in_stock' => 'boolean',
        'is_active' => 'boolean',
        'is_popular' => 'boolean',
    ];


    protected $date = [
        'special_price_start',
        'special_price_end',
        'start_date',
        'end_date',
        'deleted_at',
    ];


    /////////////////////// functions  ////////////////
    public function getActive()
    {
        return $this->is_active == 1 ? 'مفعل' : 'غير مفعل';
    }

    public function _getActive($attr)
    {
        return $this->$attr == 1 ? 'متاح' : 'غير متاح';
    }

    //////////// relations //////////////////////

    public function brand()
    {
        return $this->belongsTo(Brand::class)->withDefault();
    }

    public function material()
    {
        return $this->belongsTo(Material::class)->withDefault();
    }

    public function category()
    {

        return $this->belongsTo(Category::class, 'category_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'product_users');
    }


    //////////// scope //////////////////////

    public function scopeActive($q)
    {

        return $q->where('is_active', 1);
    }

    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->whereTranslationLike('name', '%' . $search . '%')
                ->orWhereTranslationLike('description', '%' . $search . '%')
                ->orWhere('price', 'like', "%$search%")
                ->orWhere('special_price', 'like', "%$search%");
        });

    } //end of scope when search

    public function getImagePathAttribute()
    {

        return asset('assets/images/products/' . $this->photo);

    } // end of getImagePathAttribute

    public function getIsFavoredAttribute()
    {
        if (auth()->user()) {
            return (bool)$this->users()->where('user_id', auth()->user()->id)->count();

        } // end of if

        return false;

    } // end of getIsFavoredAttribute


    public function scopeWhenFavorite($query, $favorite)
    {

        return $query->when($favorite, function ($q) {

            return $q->whereHas('users', function ($qu) {

                return $qu->where('user_id', auth()->user()->id);
            });

        });

    }


    public function hasStock($quantity)
    {
        return $this->qty >= $quantity;
    }

    public function outOfStock()
    {
        return $this->qty === 0;
    }

    public function inStock()
    {
        return $this->qty >= 1;
    }


    public function getTotal($converted = true)
    {
        if ($this->special_price_type == 1) {

            $total = $this->special_price;

        } else {

            $total = $this->price;

        }
        return $total;

    }

}
