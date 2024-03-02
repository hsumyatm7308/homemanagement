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
            'name' => 'required|max:50|unique:relatives',

        ]);

        $user = Auth::user();
        $user_id = $user['id'];

        $relative = new Relative();

        $relative->name = $request['name'];
        $relative->slug = Str::slug($request['name']);
        $relative->user_id = $user_id;


        $relative->save();
        return redirect(route('relatives.index'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => ['required', 'max:50', 'unique:relatives,name,' . $id],
        ]);

        $user = Auth::user();
        $user_id = $user['id'];

        $relative = relative::findOrFail($id);

        $relative->name = $request['name'];
        $relative->slug = Str::slug($request['name']);

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
