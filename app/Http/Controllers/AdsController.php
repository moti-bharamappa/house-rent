<?php

namespace App\Http\Controllers;

use App\Ads;
use App\AdPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Routing\redirectTo;

class AdsController extends Controller
{
    public function post()
    {
        return view('ads.index');
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $user = Auth::user();
        $ad = $user->ads()->create($data);
        $file = $request->file('images');
        if ($file) {
            $name = time() . $file->getClientOriginalName();
            $file->move('ads/images', $name);
            $ad->photos()->create(['path' => "ads/images/{$name}"]);
        }
        return redirect('/home');
    }

    public function update($id)
    {
        $data = Ads::find($id);
        return view('ads.index', ['data' => $data ]);
    }

    public function delete($id)
    {
        $ad = Ads::find($id);
        $ad->delete();
        return redirect('/home');
    }

    public function save(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        $ad = Ads::find($id);
        $ad->update($data);
        $file = $request->file('images');
        if ($file) {
            $name = time() . $file->getClientOriginalName();
            $file->move('ads/images', $name);
            $ad->photos()->create(['path' => "ads/images/{$name}"]);
        }
        return redirect('/home');
    }
}
