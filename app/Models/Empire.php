<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empire extends Model
{
    use HasFactory;

    protected $fillable = [
      'name', // Add 'name' here
      'architecture',
      'continent',
      'focus',
      'unique_units',
      'unique_technologies',
      'unique_buildings',
      'release_id',
    ];

    public function release()
    {
        return $this->belongsTo(Release::class);
    }
}
