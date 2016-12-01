<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $fillable = ['location', 'address', 'rent', 'no-of-beds'];

    public $timestamps = false;

    public function photos()
    {
        return $this->hasMany('App\AdPhoto');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function search($term)
    {
        $term = '%'.$term.'%';
        return DB::table('ads')
        ->where('location', 'like', $term)
        ->orwhere('rent', 'like', $term)
        ->orwhere('address', 'like', $term)
        ->orwhere('no-of-beds', 'like', $term)
        ->paginate(2);
    }
}
