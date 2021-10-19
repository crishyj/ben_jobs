<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;

class Proposal extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
