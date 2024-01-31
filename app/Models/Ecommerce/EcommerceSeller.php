<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EcommerceSeller extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'gender',
        'bio',
        'mobile',
        'email',
        'address',
        'description',
        'youtube_iframe',
        'header_content',
        'meta_title',
        'meta_description',
        'facebook_meta_title',
        'facebook_meta_description',
        'twitter_meta_title',
        'twitter_meta_description',
        'icon',
        'icon_alt_text',
        'thumb',
        'thumb_alt_text',
        'cover',
        'cover_alt_text',
        'og_image',
        'og_img_alt_text',
        'is_index',
        'is_follow',
        'is_featured',
        'status',
        'comment',
    ];
}
