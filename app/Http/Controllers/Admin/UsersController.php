<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\SearchService;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    private $service;

    public function __construct(SearchService $service)
    {
        $this->service = $service;
    }
    public function index(Request $request)
    {
        $query = $this->service->userSearch($request);
        $users = $query->paginate(20);
        $statuses = ['banned' => 'Banned','active' => 'Active',];
        return view('admin.users.index', compact('users', 'statuses'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $fields = $request->validate(['name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users']);

        $user = User::new($fields['name'], $fields['email']);
        return redirect()->route('admin.users.show', $user);
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $fields = $request->validate(['name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users']);
        
        $user->update($fields);
        return redirect()->route('admin.users.show', $user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');   
    }
}
