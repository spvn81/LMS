<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;


use Illuminate\Database\Eloquent\Model;


class plan extends Model implements HasMedia
{
    use HasFactory, HasUploader, InteractsWithMedia;
}
