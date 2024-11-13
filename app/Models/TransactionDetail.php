<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionDetail extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transaction_details';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['image_url'];

    /**
     * getImageUrlAttribute
     *
     * @return void
     */
    protected function getImageUrlAttribute()
    {
        return $this->image($this->attributes['image']);
    }

    /**
     * image
     *
     * @return void
     */
    public function image($fileName = null)
    {
        $image = asset('assets/no-image.png');
        $file = isset($fileName) ? $fileName : $this->image;

        if (Storage::exists($file)) {
            $image = asset(Storage::url($file));
        }

        return $image;
    }

    /**
     * product
     *
     * @return void
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * sticker
     *
     * @return void
     */
    public function sticker()
    {
        return $this->belongsTo(Sticker::class);
    }
}
