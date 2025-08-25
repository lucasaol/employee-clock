<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateUserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{

    public function index(): View
    {
        $users = User::orderBy('name')->paginate(10);
        return view('users.index', compact('users'));
    }

    public function create(): View
    {
        return view('users.create');
    }

    public function store(CreateUserRequest $request): RedirectResponse
    {
        $data = $request->validated();
        User::create($data);

        return redirect()->back()->with('success', 'Registro criado com sucesso!');
    }

}
