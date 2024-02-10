<?php

namespace App\Http\Controllers;

use App\Models\Dailycost;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    public function index()
    {
        $trashes = Dailycost::onlyTrashed()->paginate(20);
        // dd($trashes);
        return view('trashes.index', compact('trashes'));

    }




    public function destroy(string $id)
    {
        $trash = Dailycost::onlyTrashed()->findOrFail($id);
        $trash->forceDelete();
        return redirect()->back();
    }

    public function restore(string $id)
    {
        $trash = Dailycost::onlyTrashed()->findOrFail($id);
        $trash->restore();

        session()->flash('success', 'Restore Successfully');
        return redirect()->back();
    }

    public function destoryall()
    {
        $trash = Dailycost::onlyTrashed()->get();
        foreach ($trash as $item) {
            $item->forceDelete();
        }
        return redirect()->back();
    }

}
