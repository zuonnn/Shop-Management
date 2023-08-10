<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;

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
        if (strlen($request->get('name'))==0)
            return redirect('sellers')->with('error', 'Name is required');
        $seller = new Seller();
        $seller->name = $request->get('name');
        $seller->phone = $request->get('phone');
        $seller->email = $request->get('email');
        $seller->address = $request->get('address');
        $seller->birthday = $request->get('birthday');
        $seller->username = $request->get('username');
        $seller->password = $request->get('password');
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
        $seller->name = $request->get('name');
        $seller->phone = $request->get('phone');
        $seller->email = $request->get('email');
        $seller->address = $request->get('address');
        $seller->phone = $request->get('birthday');
        // $seller->username = $request->get('username');
        // $seller->password = $request->get('password');
        $seller->save();
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
