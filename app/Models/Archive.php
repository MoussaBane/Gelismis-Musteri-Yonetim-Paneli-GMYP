<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'id',
        'user_id',
        'user_name',
        'user_email',
        'customer_id',
        'customer_name',
        'customer_lastname',
        'customer_email',
        'customer_telephone',
        'customer_about',
        'action'
    ];

    protected $table = 'customer_archives';
}
