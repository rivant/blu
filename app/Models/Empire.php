<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empire extends Model
{
    use HasFactory;

    public function release()
    {
        return $this->belongsTo(Release::class);
    }
}
