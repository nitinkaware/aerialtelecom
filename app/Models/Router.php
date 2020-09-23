<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Router extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public $incrementing = true;

    protected $primaryKey = 'sap_id';

    protected $keyType = 'string';
}
