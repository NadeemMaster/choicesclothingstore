<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $table = 'settings';

    protected $fillable = [
        'app_name',
        'logo',
        'logo_mini',
        'customer_login_image',
        'admin_login_image',
        'favicon',
        'contact_us_title',
        'contact_us_msg',
        'google_map',
        'about_us',
        'about_image',
        'privacy_title',
        'privacy_policy',
        'privacy_image',
        'facebook',
        'twitter',
        'youtube',
        'instagram',
        'whatsapp'
    ];
}
