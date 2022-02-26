<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use \Rinvex\Subscriptions\Traits\HasPlanSubscriptions;
use Illuminate\Database\Eloquent\Model;

class subscribers extends Model
{
    use HasFactory,HasPlanSubscriptions;
}
