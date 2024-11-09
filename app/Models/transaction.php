<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    //

    protected $table = 'transactions';
    protected $fillable = ['category_id', 'name', 'date', 'amount', 'notes', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
