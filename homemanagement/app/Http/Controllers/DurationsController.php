<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

use App\Models\Duration;
use App\Models\Status;

class DurationsController extends Controller
{

    public function index()
    {
        $durations = Duration::all();
        return view('durations.index', compact('durations'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:50|unique:durations',
        ]);

        $user = Auth::user();
        $user_id = $user['id'];

        $duration = new Duration();

        $duration->title = $request['title'];
        $duration->slug = Str::slug($request['title']);
        $duration->user_id = $user_id;


        $duration->save();
        return redirect(route('durations.index'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title' => ['required', 'max:50', 'unique:durations,title,' . $id],
        ]);

        $user = Auth::user();
        $user_id = $user['id'];

        $duration = Duration::findOrFail($id);

        $duration->title = $request['title'];
        $duration->slug = Str::slug($request['title']);

        $duration->user_id = $user_id;

        $duration->save();
        return redirect(route('durations.index'));
    }



    public function destroy(string $id)
    {
        $duration = Duration::findOrFail($id);
        $duration->delete();
        return redirect()->back();
    }



}
