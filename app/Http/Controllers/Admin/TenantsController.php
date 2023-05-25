<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreTenantsRequest;
use App\Http\Requests\Admin\UpdateTenastrequest;
use App\Notifications\InvitationSend;
use App\Property;
use App\Http\Controllers\Controller;
use App\User;

class TenantsController extends Controller
{

    /**
     * Display a listing of Tenants.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tenants = User::whereIn('property_id', Property::where('user_id', auth()->user()->id)->pluck('id'))->get();
        $tenants = User::whereIn('property_id', Property::where('user_id', auth()->user()->id)->pluck('id'))
            // ->join('role_user', 'users.id', '=', 'role_user.user_id')
            // ->join('roles', 'roles.id', '=', 'role_user.role_id')
            // ->orWhere('roles.id', 3)
            // ->orWhereIn('property_id', Property::where('user_id', auth()->user()->id)->pluck('id'))
            ->get();

            // dd($tenants);
        $properties = Property::all();
        return view('admin.tenants.index', compact('tenants','properties'));
    }

    /**
     * Show the form for creating new Tenant.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
        
    //     $properties = Property::where('user_id', auth()->user()->id)->pluck('name', 'id');

    //     return view('admin.tenants.create', compact('properties'));
    //     // return redirect()->route('admin.tenants.index');
    // }
    
   
    public function create()
    {
        $property_ids = User::pluck('property_id')->filter()->unique()->toArray(); // get an array of unique property_id values from the users table
        
        $properties = Property::where('user_id', auth()->user()->id)
                        ->whereNotIn('id', $property_ids)
                        ->pluck('name', 'id');
        $paymentStatuses = [
            'paid' => 'Paid',
            'unpaid' => 'Unpaid',
        ];
        return view('admin.tenants.create', compact('properties','paymentStatuses'));
    }

    
    

    /**
     * Store a newly created Tenant in storage.
     *
     * @param  \App\Http\Requests\StoreTenantsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTenantsRequest $request)
    { 
        
        $user = User::create([
            'name'             => $request->name,
            'email'            => $request->email,
            'password'         => str_random(8),
            'property_id'      => $request->property_id,
            'invitation_token' => substr(md5(rand(0, 9) . $request->email . time()), 0, 32),
        ]);
        $user->role()->attach(3);

        // $user->notify(new InvitationSend());
        $property = Property::find($request->property_id);
        $property->rented_date = $request->rented_date;
        $property->payment_date = $request->payment_date;
        $property->payment_status = $request->payment_status;
        $property->contract_expiry_date = $request->contract_expiry_date;
        $property->save();

        return redirect()->route('admin.tenants.index');
    }


    /**
     * Remove Property from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        $property_id = $user->property_id;
        $property = Property::find($property_id);
        if ($property) {
            $property->rented_date = null;
            $property->payment_date = null;
            $property->payment_status = null;
            $property->contract_expiry_date = null;
            $property->save();
        }

        return redirect()->route('admin.tenants.index');
    }
    public function edit($id)
    {  
        
        $user = User::find($id);
        $property_id = $user->property_id;
        $properties = Property::where('user_id', auth()->user()->id)->pluck('name', 'id');
        $propertyalls = Property::find($property_id);
        $property = User::where('id', $id)->get();
        $paymentStatuses = [
            'paid' => 'Paid',
            'unpaid' => 'Unpaid',
        ];
        return view('admin.tenants.edit', compact('property','properties','paymentStatuses','propertyalls'));
    }
    public function update(StoreTenantsRequest $request, $id)
    {
        $user = User::find($id);

        $user->update([
            'name'             => $request->input('name'),
            'email'            => $request->input('email'),
            'password'         => str_random(8),
            'property_id'      => $request->input('property_id'),
            'invitation_token' => substr(md5(rand(0, 9) . $request->input('email') . time()), 0, 32),
        ]);
        $property = Property::find($request->property_id);
        $property->rented_date = $request->rented_date;
        $property->payment_date = $request->payment_date;
        $property->payment_status = $request->payment_status;
        $property->contract_expiry_date = $request->contract_expiry_date;
        $property->save();
        return redirect()->route('admin.tenants.index');
    }
    public function update2(UpdateTenastrequest $request, $id)
    {
        $user = User::find($id);
        $property_id = $user->property_id;
        $property = Property::find($property_id);

        // Check if the payment status is "unpaid"
        if ($property->payment_status == 'unpaid') {
            // Update the payment status to "paid"
            $property->update(['payment_status' => 'paid']);
        } else {
            // Update the payment status to "unpaid"
            $property->update(['payment_status' => 'unpaid']);
        }

        return redirect()->route('admin.tenants.index');
    }

    public function show($id)
    {
        // dd($id);
        $properties = Property::where('user_id', auth()->user()->id)->pluck('name', 'id');
        $property = User::where('id', $id)->get();
        $documents = \App\Document::where('property_id', $id)->get();
        $notes     = \App\Note::where('property_id', $id)->get();
        return view('admin.tenants.show', compact('property','properties','documents','notes'));
    }
    
}
