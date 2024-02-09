<?php

namespace App\Http\Controllers;

use App\Models\Dailycost;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    public function index()
    {
        $trashes = Dailycost::onlyTrashed()->paginate(10);
        // dd($trashes);
        return view('trashes.index', compact('trashes'));

    }




    public function destroy(string $id)
    {
        $trash = Dailycost::onlyTrashed()->findOrFail($id);
        $trash->forceDelete();
        return redirect()->back();
    }

}
