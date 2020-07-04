<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Track;
class TrackController extends Controller
{

    public function index()
    {
        $tracks = Track::orderBy('id','desc')->paginate(20);
        return view('admin.tracks.index', compact('tracks'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name'=> 'required|min:3|max:50',
        ];
        $this->validate($request, $rules);
        if (Track::create($request->all())) {
            return redirect('/admin/tracks')->withStatus('Track Successfully Created .');
        }else{
            return redirect('/admin/tracks')->withStatus('Something Worng, Try Again.');
        }
    }

    public function show(Track $track)
    {
        return view('admin.tracks.show', compact('track'));
    }

    public function edit(Track $track)
    {
        return view('admin.tracks.edit', compact('track'));
    }

    public function update(Request $request, Track $track)
    {
        $rules = [
            'name'=> 'required|min:3|max:50',
        ];
        $this->validate($request, $rules);
        
        if($request->has('name')){
            $track->name = $request->name;
        }
        if($track->isDirty()){
            $track->save();
            return redirect('/admin/tracks')->withStatus('Track Successfully Updated .');
        }else{
            return redirect('/admin/tracks/'.$track->id.'/edit')->withStatus('Nothing Changed .');
        }
    }

    public function destroy(Track $track)
    {
        $track->delete();
        return redirect('/admin/tracks')->withStatus('Track Successfully Deleted . ');
    }
}
