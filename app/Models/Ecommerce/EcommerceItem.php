<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EcommerceItem extends Model
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
        'category_name',
        'subcategory_name',
        'sub_subcategory_name',
        'sku',
        'sale_price',
        'regular_price',
        'commission',
        'bootstrap_v',
        'released',
        'updated',
        'version',
        'seller_name',
        'seller_email',
        'short_description',
        'long_description',
        'change_log',
        'image',
        'img_alt_text',
        'file',
        'icon',
        'icon_alt_text',
        'thumb',
        'thumb_alt_text',
        'cover',
        'cover_alt_text',
        'og_image',
        'og_img_alt_text',
        'youtube_iframe',
        'header_content',
        'meta_title',
        'meta_description',
        'facebook_meta_title',
        'facebook_meta_description',
        'twitter_meta_title',
        'twitter_meta_description',
        'live_preview_link',
        'admin_link',
        'downloadable_link',
        'order_type',
        'is_featured',
        'is_index',
        'is_follow',
        'status',
        'comment',
    ];

    public function category()
    {
        return $this->belongsTo(EcommerceCategory::class, 'category_name', 'category_name');
    }

    public function subcategory()
    {
        return $this->belongsTo(EcommerceSubcategory::class, 'subcategory_name', 'subcategory_name');
    }

    public function subSubcategory()
    {
        return $this->belongsTo(EcommerceSubSubcategory::class, 'sub_subcategory_name', 'sub_subcategory_name');
    }

}
