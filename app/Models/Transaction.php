<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transactions';

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
     * transactionDetail
     *
     * @return void
     */
    public function transactionDetail()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    /**
     * total
     *
     * @return void
     */
    public function total()
    {
        $total = 0;

        foreach ($this->transactionDetail as $td) {
            $priceProduct = $td->price_product;
            $priceSticker = $td->price_sticker;
            $qty = $td->qty;

            $total += $priceProduct + ($priceSticker * $qty);
        }

        return $total;
    }
}
