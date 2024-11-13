<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'carts';

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
     * image
     *
     * @return void
     */
    public function image()
    {
        $image = asset('assets/no-image.png');

        if (Storage::exists($this->image)) {
            $image = asset(Storage::url($this->image));
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
