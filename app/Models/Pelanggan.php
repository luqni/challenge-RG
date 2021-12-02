<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    public $table = "pelanggan";
    protected $fillable = [
        'user_id',
        'user_name'.
        'email',
        'contact_person',
        'contact_number',
        'delivery_address',
        'order_status',
        'package_name',
        'package_serial',
        'package_tag',
        'gift',
        'status',
    ];

}
