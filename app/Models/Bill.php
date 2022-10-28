<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'BillNumber',
        'amount',
        'total',
        'user_id',
    ];

    // each bill belongsTo user
    public function user ()
    {
        return $this->belongsTo('App\Models\User');
    }

    // Bill belongsToMany product 
    public function products ()
    {
        return $this->belongsToMany('App\Models\Product');
    }

}
