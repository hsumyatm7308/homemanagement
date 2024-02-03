<?php

namespace App\Http\Controllers;

use App\Models\Dailycost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DailycostsController extends Controller
{
    //
    public function index()
    {
        $data['dailycosts'] = Dailycost::orderBy('id', 'desc')->get();
        return view('dailycosts.index', $data);
    }

    public function create()
    {
        $data['dailycosts'] = Dailycost::orderBy('name', 'asc')->get();
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
        return view('dailycosts.edit', ['dailycost' => $dailycost]);
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

        $dailycost = new Dailycost();


        $dailycost->name = $request['name'];
        $dailycost->amount = $request['amount'];
        $dailycost->remark = $request['remark'];
        $dailycost->category_id = $request['category_id'];
        $dailycost->amount = $request['amount'];
        $dailycost->user_id = $user_id;

        // remove old image 


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

    public function show($id)
    {
        $dailycost = Dailycost::findOrFail($id);
        return view('dailycosts.show')->with("dailycost", $dailycost);
    }
}
