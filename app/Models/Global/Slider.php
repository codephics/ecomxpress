<?php

namespace App\Models\Global;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'heading',
        'subheading',
        'detail',
        'image',
        'image_alt_text',
        'button_text_1',
        'button_text_2',
        'button_link_1',
        'button_link_2',
        'status',
        'comment',
    ];
}
