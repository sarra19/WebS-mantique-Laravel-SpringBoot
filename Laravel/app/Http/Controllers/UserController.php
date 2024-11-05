<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of all users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Define the base query
        $query = User::query();

    

        // Sortable columns (requires kyslik/column-sortable package)
        $users = $query->paginate(10); // Pagination, showing 10 users per page

        // Pass data to the view
        return view('BackOffice.User.index', compact('users'));
    }
/**
     * Show the form for creating a new sales center.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BackOffice.User.create'); 
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        try {
            // Create a new user with hashed password
            $user = User::create([
                'name' => $validatedData['name'],
                'username' => $validatedData['username'],
                'phone' => $validatedData['phone'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);

            return redirect()->route('users.index')->with('success', 'User created successfully.');
        } catch (QueryException $e) {
            return redirect()->route('users.create')->with('error', 'Failed to create sales center: ' . $e->getMessage());

        }
    }
    /**
     * Display the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find a user by ID or return a 404 error
        $user = User::findOrFail($id);
        return view('BackOffice.User.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Retrieve the user to edit and return the edit view
        $user = User::findOrFail($id);
        return view('BackOffice.User.update', compact('user'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Find the user and validate the request
        $user = User::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'username' => 'sometimes|string|max:255|unique:users,username,' . $user->id,
            'phone' => 'sometimes|string|max:15',
            'email' => 'sometimes|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'sometimes|string|min:8',
        ]);

        try {// Update user data
        $user->update(array_merge(
            $validatedData,
            $request->filled('password') ? ['password' => Hash::make($request->password)] : []
        ));



            return redirect()->route('users.index')->with('success', 'User created successfully.');
        } catch (QueryException $e) {
            return redirect()->route('users.edit')->with('error', 'Failed to create sales center: ' . $e->getMessage());

        }    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the user and delete
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }
}
