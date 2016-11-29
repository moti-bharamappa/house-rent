<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdPhoto extends Model
{
    protected $table = 'ad_photos';

    protected $fillable = ['path'];

    public $timestamps = false;
    
    public function ad()
    {
        return $this->belongsTo('App\Ads');
    }
}
