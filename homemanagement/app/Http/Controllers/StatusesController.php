<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

use App\Models\Status;

class StatusesController extends Controller
{
    public function index()
    {
        $statuses = Status::all();
        return view('statuses.index', compact('statuses'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:50|unique:statuses',
        ]);

        $user = Auth::user();
        $user_id = $user['id'];

        $status = new Status();

        $status->title = $request['title'];
        $status->slug = Str::slug($request['title']);
        $status->user_id = $user_id;


        $status->save();
        return redirect(route('statuses.index'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title' => ['required', 'max:50', 'unique:statuses,title,' . $id],
        ]);

        $user = Auth::user();
        $user_id = $user['id'];

        $status = Status::findOrFail($id);

        $status->title = $request['title'];
        $status->slug = Str::slug($request['title']);
        $status->user_id = $user_id;

        $status->save();
        return redirect(route('statuses.index'));
    }



    public function destroy(string $id)
    {
        $status = Status::findOrFail($id);
        $status->delete();
        return redirect()->back();
    }
}
