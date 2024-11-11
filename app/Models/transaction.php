<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    //

    protected $table = 'transactions';
    protected $fillable = ['category_id', 'name', 'date_transaction', 'amount', 'notes', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function scopeIncomes($query)
    {
        return $query->whereHas('category', function ($query) {
            $query->where('is_expense', false);
        });
    }

    public function scopeExpenses($query)
    {
        return $query->whereHas('category', function ($query) {
            $query->where('is_expense', true);
        });
    }
}
