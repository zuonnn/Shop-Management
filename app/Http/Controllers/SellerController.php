<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sellers = Seller::all();
        return view('admin.sellers.index', ['sellers' => $sellers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sellers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate form data
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'birthday' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
        ]);

        // Create a new User
        $user = new User();
        $user->name = $validatedData['name'];
        $user->username = $validatedData['username'];
        $user->password = bcrypt($validatedData['password']); // Hash the password
        $user->save();

        // Create a new Seller associated with the User
        $seller = new Seller();
        $seller->name = $validatedData['name'];
        $seller->phone = $validatedData['phone'];
        $seller->email = $validatedData['email'];
        $seller->address = $validatedData['address'];
        $seller->birthday = $validatedData['birthday'];
        $seller->user_id = $user->id; // Link the seller to the user
        $seller->save();

        return redirect('/admin/sellers')->with('success', 'Seller has been successfully added');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $seller = Seller::find($id);
        return view('admin.sellers.show', ['seller' => $seller]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $seller = Seller::find($id);
        return view('admin.sellers.edit', ['seller' => $seller]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $seller = Seller::find($id);

        // Update seller fields
        $seller->name = $request->input('name');
        $seller->phone = $request->input('phone');
        $seller->email = $request->input('email');
        $seller->address = $request->input('address');
        $seller->birthday = $request->input('birthday');
        $seller->save();

        // Update associated user's name and password
        $user = $seller->user;
        $user->name = $request->input('name');
        $user->password = Hash::make($request->input('password')); // Update password and hash it
        $user->save();

        return redirect('/admin/sellers');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $seller = Seller::find($id);
        $seller->delete();
        return redirect('/admin/sellers');
    }
}   
