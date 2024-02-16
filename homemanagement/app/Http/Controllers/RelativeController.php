<?php

namespace App\Http\Controllers;

use App\Models\Relative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RelativeController extends Controller
{

    public function index()
    {
        $relatives = Relative::all();
        return view('relatives.index', compact('relatives'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:50|unique:relatives',

        ]);

        $user = Auth::user();
        $user_id = $user['id'];

        $relative = new Relative();

        $relative->title = $request['title'];
        $relative->slug = Str::slug($request['title']);
        $relative->user_id = $user_id;


        $relative->save();
        return redirect(route('relatives.index'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title' => ['required', 'max:50', 'unique:relatives,title,' . $id],
        ]);

        $user = Auth::user();
        $user_id = $user['id'];

        $relative = relative::findOrFail($id);

        $relative->title = $request['title'];
        $relative->slug = Str::slug($request['title']);

        $relative->user_id = $user_id;

        $relative->save();
        return redirect(route('relatives.index'));
    }



    public function destroy(string $id)
    {
        $relative = relative::findOrFail($id);
        $relative->delete();
        return redirect()->back();
    }



}
