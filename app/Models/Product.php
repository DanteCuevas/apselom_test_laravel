<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'status',
        'quantity',
        'code'
    ];

    public function scopeName($query, $value)
    {
        if ($value)
            return $query->where('name', 'LIKE', '%'.$value.'');
    }

    public function scopeId($query, $value)
    {
        return $query->when($value, function ($query) use ($value) {
            $query->where('id', $value);
        });
    }

    public function getStatusFormatAttribute ()
    {
        return $this->status ? 'Disponible' : 'No Disponible';
    }

    public function getStatusFormatSaleAttribute ()
    {
        return $this->status ? 'On' : 'Off';
    }

    public function setCodeAttribute ($value)
    {
        $this->attributes['code'] = str_pad($value, 6, "0", STR_PAD_LEFT);
    }

}
