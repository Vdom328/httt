<?php

namespace App\Http\Controllers;
use App\Property;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Document;
use App\Note;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $properties = Property::count();
    $totalPrice = Property::sum('rent_cost');
    $tenants = User::whereIn('property_id', Property::where('user_id', auth()->user()->id)->pluck('id'))->count();
    if (request('show_deleted') == 1) {
        if (! Gate::allows('document_delete')) {
            return abort(401);
        }
        $documents = Document::onlyTrashed()->count();
    } else {
        $documents = Document::count();
    }
    if (request('show_deleted') == 1) {
        if (! Gate::allows('note_delete')) {
            return abort(401);
        }
        $notes = Note::onlyTrashed()->count();
    } else {
        $notes = Note::count();
    }
    $remainingassets = Property::whereNull('rented_date')->count();
    $notpaid = Property::where('payment_status', '=', 'unpaid')->count();
    return view('/home', compact('properties', 'tenants', 'documents', 'notes', 'totalPrice','remainingassets','notpaid'));
}

}
