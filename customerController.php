<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Database\Eloquent\SoftDeletes;

class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Customer Registration Form';
        $url = url('/customer');
        $data = compact('title', 'url');
        return view('layouts/customer')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'gender' => 'required',
                'address' => 'required',
                'state' => 'required',
                'country' => 'required',
                'dob' => 'required',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required'
            ]
        );


        // insert query
        $customer = new Customer;
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->gender = $request['gender'];
        $customer->address = $request['address'];
        $customer->state = $request['state'];
        $customer->country = $request['country'];
        $customer->dob = $request['dob'];
        $customer->password = md5($request['password']);
        $customer->save();

        return redirect('/customer/view');
    }

    public function view(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $customers = Customer::where('name','LIKE',"%$search%")->orwhere('email','LIKE',"%$search%")->get();
        } else{
        $customers = Customer::all();
        }
        $data = compact('customers','search');
        return view('layouts/customers-view')->with($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::find($id);
        $url = url('/customer/update') . '/' . $id;
        $title = 'Edit Customer Form <span>&#128393;</span>';
        if (is_null($customer)) {
            return redirect('customer/view');
        } else
            $data = compact('customer', 'url', 'title');
        return view('layouts/customer')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = Customer::find($id);
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->gender = $request['gender'];
        $customer->address = $request['address'];
        $customer->state = $request['state'];
        $customer->country = $request['country'];
        $customer->dob = $request['dob'];
        $customer->save();

        return redirect('/customer/view');
    }

    public function trash()
    {
        $customers = Customer::onlyTrashed()->get();
        // echo "<pre>";
        // print_r($customers);
        // echo "</pre>";
        $data = compact('customers');
        return view('layouts/customers-trash')->with($data);
    }

    public function restore($id){
        $customer = Customer::withTrashed()->find($id);
        $customer->restore();
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $customer = Customer::all()->find($id);
        if (!is_null($customer)) {
            $customer->delete();
        }

        return redirect()->back();
    }
    public function destroy($id)
    {
        $customer = Customer::withTrashed()->find($id);

        if (!is_null($customer)) {
            $customer->forceDelete();
        }

        return redirect()->back();
    }


}
