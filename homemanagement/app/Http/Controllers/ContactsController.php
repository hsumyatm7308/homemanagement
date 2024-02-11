<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Relative;
use App\Models\Status;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        $statuses = Status::whereIn('id', [1, 2])->get();
        $relatives = Relative::all();
        return view('contacts.index', compact('contacts', 'statuses', 'relatives'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:50|unique:contacts',
            'number' => 'required',
            'status_id' => 'required|in:1,2',
            'relative_id' => 'nullable'
        ]);

        $user = Auth::user();
        $user_id = $user['id'];

        $contact = new Contact();

        $contact->title = $request['title'];
        $contact->slug = Str::slug($request['title']);
        $contact->number = $request['number'];
        $contact->status_id = $request['status_id'];
        // $contact->relative_id = $request['relative_id'];
        $contact->relative_id = 1;
        $contact->user_id = $user_id;


        $contact->save();
        return redirect(route('contacts.index'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title' => ['required', 'max:50'],
            'number' => 'required',
            'status_id' => ['required', 'in:1,2'],
            'relative_id' => 'nullable'
        ]);

        $user = Auth::user();
        $user_id = $user['id'];

        $contact = Contact::findOrFail($id);

        $contact->title = $request['title'];
        $contact->slug = Str::slug($request['title']);
        $contact->number = $request['phnumber'];
        $contact->status_id = $request['status_id'];
        // $contact->relative_id = $request['relative_id'];
        $contact->relative_id = 1;

        $contact->user_id = $user_id;

        $contact->save();
        return redirect(route('contacts.index'));
    }



    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->back();
    }


    public function contactstatus(Request $request)
    {
        $contact = Contact::findOrFail($request['id']);
        $contact->status_id = $request['status_id'];
        $contact->save();

        return response()->json(['success', 'Status Change Successfully']);
    }
}
