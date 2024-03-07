<?php

namespace App\Http\Controllers;

use App\Jobs\ContactJob;
use App\Mail\ContactMail;
use App\Models\Contact;
use App\Models\Phonenumber;
use App\Models\Relative;
use App\Models\Status;
use App\Notifications\ContactNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
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

    public function create()
    {
        $data['contacts'] = Contact::orderBy('name', 'asc')->get();
        $data['statuses'] = Status::all();
        $data['relatives'] = Relative::all()->pluck('name', 'id');
        return view('contacts.create', $data);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50|unique:contacts',
            'number' => 'required',
            'status_id' => 'required|in:1,2',
            'birthday' => 'nullable',
            'relative_id' => 'nullable',

        ]);

        $user = Auth::user();
        $user_id = $user['id'];

        $contact = new Contact();

        $contact->name = $request['name'];
        $contact->slug = Str::slug($request['name']);
        $contact->remark = $request['remark'];
        $contact->status_id = $request['status_id'];
        $contact->relative_id = $request['relative_id'];
        $contact->birthday = $request['birthday'];
        $contact->user_id = $user_id;

        $contact->save();


        $phone = new Phonenumber();
        $phone->number = $request['number'];
        $phone->phonable_id = $contact->id;
        $phone->phonable_type = get_class($contact);
        $phone->user_id = $user_id;
        $phone->save();



        $data = [
            'name' => $request['name'],
        ];

        Notification::send($user, new ContactNotification($data));
        return redirect(route('contacts.index'));
    }


    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => ['required', 'max:50'],
            'status_id' => ['required', 'in:1,2'],
            'birthday' => 'nullable',
            'relative_id' => 'nullable',
        ]);

        $user = Auth::user();
        $user_id = $user['id'];

        $contact = Contact::findOrFail($id);

        $contact->name = $request['name'];
        $contact->slug = Str::slug($request['name']);
        $contact->remark = $request['remark'];
        $contact->status_id = $request['status_id'];
        $contact->relative_id = $request['relative_id'];
        $contact->birthday = $request['birthday'];

        $contact->user_id = $user_id;

        $contact->save();
        return redirect(route('contacts.index'));
    }




    public function show(string $id)
    {
        $contact = Contact::findOrFail($id);
        $phones = Phonenumber::where('user_id', $id)->where('phonable_type', 'App\Models\Contact')->get();

        // dd($phones);
        return view('contacts.show')->with("contact", $contact)->with('phones', $phones);
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


    public function mailbox(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        $to = $request->input('cmpemail');
        $subject = $request->input('cmpsubject');
        $content = $request->input('cmpcontent');


        $username = Auth::user()->name;


        // dd($contact, $to, $subject, $content, $username);
        Mail::to($to)->send(new ContactMail($subject, $content, $contact, $username));

        return redirect()->back();
    }


    public function trashindex()
    {
        $trashes = Contact::onlyTrashed()->get();
        $statuses = Status::whereIn('id', [1, 2])->get();
        $relatives = Relative::all();
        return view('contacts.trash', compact('trashes', 'statuses', 'relatives'));
    }


    public function restore(string $id)
    {
        $trash = Contact::onlyTrashed()->findOrFail($id);
        $trash->restore();


        $trashcount = Contact::onlyTrashed()->count();

        // dd($trashcount);

        session()->flash('success', 'Restore Successfully');

        if ($trashcount > 0) {
            return redirect()->back();

        } else {
            return redirect()->route('trashes.index');
        }
    }

}
