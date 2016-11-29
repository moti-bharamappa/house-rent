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

    public static function search($term, $start = 0, $end = 5)
    {
        $term = '%'.$term.'%';
        return (array)DB::table('ads')
        ->where('location', 'like', $term)
        ->orwhere('rent', 'like', $term)
        ->orwhere('address', 'like', $term)
        ->orwhere('no-of-beds', 'like', $term)
        ->skip($start)
        ->take($end)
        ->get()
        ->toArray();
    }

    public static function count($term)
    {
        $term = '%'.$term.'%';
        return DB::table('ads')
        ->where('location', 'like', $term)
        ->orwhere('rent', 'like', $term)
        ->orwhere('address', 'like', $term)
        ->orwhere('no-of-beds', 'like', $term)
        ->count();
    }
}
