<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

use App\Models\Category;
use App\Models\Status;

class CategoriesController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        $statuses = Status::whereIn('id', [1, 2])->get();
        return view('categories.index', compact('categories', 'statuses'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:50|unique:categories',

            'status_id' => 'required|in:1,2'
        ]);

        $user = Auth::user();
        $user_id = $user['id'];

        $category = new Category();

        $category->title = $request['title'];
        $category->slug = Str::slug($request['title']);
        $category->status_id = $request['status_id'];
        $category->user_id = $user_id;


        $category->save();
        return redirect(route('categories.index'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title' => ['required', 'max:50', 'unique:categories,title,' . $id],
            'status_id' => ['required', 'in:1,2']
        ]);

        $user = Auth::user();
        $user_id = $user['id'];

        $category = Category::findOrFail($id);

        $category->title = $request['title'];
        $category->slug = Str::slug($request['title']);
        $category->status_id = $request['status_id'];

        $category->user_id = $user_id;

        $category->save();
        return redirect(route('categories.index'));
    }



    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back();
    }


    public function categorystatus(Request $request)
    {
        $category = Category::findOrFail($request['id']);
        $category->status_id = $request['status_id'];
        $category->save();

        return response()->json(['success', 'Status Change Successfully']);
    }
}
