<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\SaveUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class UserController extends Controller
{

    public function index(): View
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('users.index', compact('users'));
    }

    public function create(): View
    {
        return view('users.create');
    }

    public function store(SaveUserRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            $user = new User(
                $request->only([
                    'name', 'document', 'email', 'password', 'position', 'birth_date'
                ])
            );
            $user->fill(['created_by' => auth()->user()->id]);
            $user->save();

            $user->address()->create(
                $request->only([
                    'zipcode', 'street', 'number', 'complement', 'neighborhood', 'city', 'state'
                ])
            );
        });

        return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso!');
    }

    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    public function update(SaveUserRequest $request, User $user): RedirectResponse
    {
        DB::transaction(function () use ($request, $user) {
            $user->update(
                $request->only([
                    'name', 'document', 'email', 'password', 'position', 'birth_date'
                ])
            );

            $user->address()->updateOrCreate(
                ['user_id' => $user->id],
                $request->only([
                    'zipcode', 'street', 'number', 'complement', 'neighborhood', 'city', 'state'
                ])
            );
        });
        return redirect()->route('users.index')->with('success', 'Usuário alterado com sucesso!');
    }

    public function destroy(User $user): RedirectResponse
    {
        DB::transaction(function () use ($user) {
            $user->address()->delete();
            $user->delete();
        });
        return redirect()->route('users.index')->with('success', 'Usuário removido com sucesso!');
    }

}
