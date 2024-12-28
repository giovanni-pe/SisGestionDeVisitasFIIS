<?php 
namespace App\Http\Controllers;

use App\Models\VisitorRepresentative;
use App\Models\User;
use Illuminate\Http\Request;

class VisitorRepresentativeController extends Controller
{
    /**
     * Display a listing of visitor representatives.
     */
    public function index()
    {
        $representatives = VisitorRepresentative::with('user')->get();
        return view('visitor_representatives.index', compact('representatives'));
    }

    /**
     * Show the form for creating a new visitor representative.
     */
    public function create()
    {
        $users = User::all(); // Fetch all users for the dropdown
        return view('visitor_representatives.create', compact('users'));
    }

    /**
     * Store a newly created visitor representative in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'nullable|exists:users,id', // Optional: Use existing user
            'name' => 'required_if:user_id,null|string|max:255', // Required if no existing user
            'email' => 'required_if:user_id,null|email|unique:users,email', // Required if no existing user
            'identification' => 'required|string|max:255|unique:visitor_representatives,identification',
            'phone' => 'required|string|max:15',
        ]);

        // Use existing user or create a new one
        $user = $request->user_id
            ? User::find($request->user_id)
            : User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt('default_password'), // Use secure password logic
            ]);

        // Create the visitor representative
        VisitorRepresentative::create([
            'user_id' => $user->id,
            'identification' => $request->input('identification'),
            'phone' => $request->input('phone'),
        ]);

        return redirect()->route('visitor_representatives.index')
            ->with('message', 'Visitor Representative created successfully!');
    }

    /**
     * Show the form for editing the specified visitor representative.
     */
    public function edit($id)
    {
        $representative = VisitorRepresentative::with('user')->findOrFail($id);
        $users = User::all(); // Fetch all users for the dropdown
        return view('visitor_representatives.edit', compact('representative', 'users'));
    }

    /**
     * Update the specified visitor representative in storage.
     */
    public function update(Request $request, $id)
    {
        $representative = VisitorRepresentative::with('user')->findOrFail($id);

        $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'name' => 'required_if:user_id,null|string|max:255',
            'email' => 'required_if:user_id,null|email|unique:users,email,' . $representative->user->id,
            'identification' => 'required|string|max:255|unique:visitor_representatives,identification,' . $representative->id,
            'phone' => 'required|string|max:15',
        ]);

        // Use existing user or update the current one
        if ($request->user_id) {
            $user = User::find($request->user_id);
        } else {
            $representative->user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            ]);
            $user = $representative->user;
        }

        // Update the representative
        $representative->update([
            'user_id' => $user->id,
            'identification' => $request->input('identification'),
            'phone' => $request->input('phone'),
        ]);

        return redirect()->route('visitor_representatives.index')
            ->with('message', 'Visitor Representative updated successfully!');
    }

    /**
     * Remove the specified visitor representative from storage.
     */
    public function destroy($id)
    {
        $representative = VisitorRepresentative::findOrFail($id);

        // Optionally delete the associated user
        if ($representative->user) {
            $representative->user->delete();
        }

        $representative->delete();

        return redirect()->route('visitor_representatives.index')
            ->with('message', 'Visitor Representative deleted successfully!');
    }

    /**
     * Display the specified visitor representative's details and associated data.
     */
    public function show($id)
    {
        $representative = VisitorRepresentative::with('visitRequests')->findOrFail($id);
        return view('visitor_representatives.show', compact('representative'));
    }
}
