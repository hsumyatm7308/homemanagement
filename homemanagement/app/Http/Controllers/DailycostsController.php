<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dailycost;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\File;

class DailycostsController extends Controller
{
    //
    public function index(Request $request)
    {
        $data['dailycosts'] = Dailycost::orderBy('id', 'desc')->paginate(10);

        if ($request->has('filter')) {
            $filter = $request->input('filter');

            switch ($filter) {
                case "lastweek":
                    $start = Carbon::now()->startOfWeek()->subWeek();
                    $end = Carbon::now()->endOfWeek()->subWeek();
                    break;

                case "lastmonth":
                    $start = Carbon::now()->startOfMonth()->subMonth();
                    $end = Carbon::now()->endOfMonth()->subMonth();
                    break;

                case "last3months":
                    $start = Carbon::now()->startOfMonth()->subMonths(2);
                    $end = Carbon::now()->endOfMonth();
                    break;
                default:
                    $start = null;
                    $end = null;


            }

            if ($start && $end) {
                $data['dailycosts'] = Dailycost::whereBetween('created_at', [$start, $end])->orderBy('id', 'desc')->paginate(10);
            }
        }

        return view('dailycosts.index', $data);
    }


    public function create()
    {
        $data['dailycosts'] = Dailycost::orderBy('name', 'asc')->get();
        $data['categories'] = Category::all()->pluck('title', 'id');
        return view('dailycosts.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpg,jpeg,png|max:1024',
            'name' => 'required|min:1',
            'amount' => 'required',
            'remark' => 'nullable',
            'category_id' => 'required',
        ]);

        $user = Auth::user();
        $user_id = $user['id'];

        $dailycost = new Dailycost();


        $dailycost->name = $request['name'];
        $dailycost->amount = $request['amount'];
        $dailycost->remark = $request['remark'];
        $dailycost->category_id = $request['category_id'];
        $dailycost->amount = $request['amount'];
        $dailycost->user_id = $user_id;


        // for image 
        if (file_exists($request['image'])) {
            $file = $request['image'];
            $fname = $file->getClientOriginalName();
            $imagenewname = uniqid($user_id) . $dailycost['id'] . $fname;
            $file->move(public_path('assets/img/dailycosts/'), $imagenewname);

            $filepath = "assets/img/dailycosts/" . $imagenewname;
            $dailycost->image = $filepath;

        }


        $dailycost->save();

        session()->flash('success', 'New Post Created');
        return redirect(route('dailycosts.index'));
    }

    public function edit(string $id)
    {
        $dailycost = Dailycost::findOrFail($id);
        $categories = Category::all()->pluck("title", "id");
        return view('dailycosts.edit', ['dailycost' => $dailycost, "categories" => $categories]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpg,jpeg,png|max:1024',
            'name' => 'required|min:1',
            'amount' => 'required',
            'remark' => 'nullable',
            'category_id' => 'required',
        ]);

        $user = Auth::user();
        $user_id = $user['id'];

        $dailycost = Dailycost::findOrFail($id);


        $dailycost->name = $request['name'];
        $dailycost->amount = $request['amount'];
        $dailycost->remark = $request['remark'];
        $dailycost->category_id = $request['category_id'];
        $dailycost->amount = $request['amount'];
        $dailycost->user_id = $user_id;

        // remove old image 
        if ($request->hasFile('image')) {
            $path = $dailycost->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }


        // for image 
        if (file_exists($request['image'])) {
            $file = $request['image'];
            $fname = $file->getClientOriginalName();
            $imagenewname = uniqid($user_id) . $dailycost['id'] . $fname;
            $file->move(public_path('assets/img/dailycosts/'), $imagenewname);

            $filepath = "assets/img/dailycosts/" . $imagenewname;
            $dailycost->image = $filepath;

        }


        $dailycost->save();

        session()->flash('success', 'Updated Successfully');
        return redirect(route('dailycosts.index'));
    }

    public function show(string $id)
    {
        $dailycost = Dailycost::findOrFail($id);
        return view('dailycosts.show')->with("dailycost", $dailycost);
    }

    public function destroy(string $id)
    {
        $dailycost = Dailycost::findOrFail($id);
        $dailycost->delete();
        return redirect()->back();
    }
}
