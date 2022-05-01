<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class InvitationRequest extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['name', 'degree', 'job', 'occupation', 'institution', 'country', 'email', 'category', 'presentation', 'telephone'];

    public function firstMediaOnly()
    {
        return $this->morphOne(config('media-library.media_model'), 'model');
    }
}
