<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'producttypes';
    protected $primaryKey = 'type_id';

    public $timestamps = false;
}
