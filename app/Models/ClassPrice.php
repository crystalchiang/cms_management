<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassPrice extends Model
{
    use HasFactory;

    /**
     * 與模型關聯的資料表。
     *
     * @var string
     */
    protected $table = 'class_price';
}
