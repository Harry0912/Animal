<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'news';
    protected $primaryKey = 'news_id';

    public $timestamps = false;
}
