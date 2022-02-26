<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\InteractsWithMedia;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;
use Spatie\MediaLibrary\HasMedia;


use Illuminate\Database\Eloquent\Model;

class videoCategory extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasUploader;
}
