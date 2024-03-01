<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Dailycost;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;


class TrashController extends Controller
{
    public function index(Request $request)
    {
        $data['dailycosttrashes'] = Dailycost::onlyTrashed()->get();
        $data["contacttrashes"] = Contact::onlyTrashed()->get();

        // Merge the trashed records
        // $data["trashes"] = $data['dailycosttrashes']->merge($data["contacttrashes"]);


        // if ($request->has('filter')) {
        //     $filter = $request->input('filter');

        //     switch ($filter) {
        //         case "lastweek":
        //             $start = Carbon::now()->startOfWeek()->subWeek();
        //             $end = Carbon::now()->endOfWeek()->subWeek();
        //             break;

        //         case "lastmonth":
        //             $start = Carbon::now()->startOfMonth()->subMonth();
        //             $end = Carbon::now()->endOfMonth()->subMonth();
        //             break;

        //         case "last3month":
        //             $start = Carbon::now()->startOfMonth()->subMonths(2);
        //             $end = Carbon::now()->endOfMonth();
        //             break;
        //         default:
        //             $start = null;
        //             $end = null;


        //     }

        //     if ($start && $end) {
        //         // Filter the merged collection
        //         $data['trashes'] = $data['trashes']->filter(function ($item) use ($start, $end) {
        //             return $item->created_at->between($start, $end);
        //         });
        //     }
        // }


        // dd($data['dailycosttrashes']->count());
        return view('trashes.index', $data);

    }





    public function show(string $id)
    {


        // dd($modelName);

        $data['dailycost'] = Dailycost::onlyTrashed()->where('id', $id)->firstOrFail();




        return view('trashes.show', $data);
    }





    public function destroy(string $id)
    {
        $trash = Dailycost::onlyTrashed()->findOrFail($id);
        $trash->forceDelete();
        return redirect()->back();
    }

    // public function restore(string $id)
    // {
    //     $trash = Dailycost::onlyTrashed()->findOrFail($id);
    //     $trash->restore();

    //     session()->flash('success', 'Restore Successfully');
    //     return redirect()->back();
    // }

    public function destoryall()
    {
        $data['dailycosttrashes'] = Dailycost::onlyTrashed()->get();
        $data["contacttrashes"] = Contact::onlyTrashed()->get();

        // Merge the trashed records
        $trash = $data['dailycosttrashes']->merge($data["contacttrashes"]);

        foreach ($trash as $item) {
            $item->forceDelete();
        }
        return redirect()->back();
    }

}
