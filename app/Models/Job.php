<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proposal;

class Job extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function proposals(){
        return $this->hasMany(Proposal::class);
    }
}
