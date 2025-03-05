@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-center text-purple-600 text-3xl font-bold mb-6">Liste des Utilisateurs</h1>

   
    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
            <strong>Succès !</strong> {{ session('success') }}
        </div>
    @endif

    <div class="bg-black text-white p-6 rounded-lg shadow-md">
        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left text-purple-500">Nom</th>
                    <th class="px-4 py-2 text-left text-purple-500">Email</th>
                    <th class="px-4 py-2 text-left text-purple-500">Rôle</th>
                    <th class="px-4 py-2 text-left text-purple-500">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="border-b border-gray-300">
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2">{{ $user->getRoleNames()->first() }}</td>
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('users.edit', $user->id) }}" class="bg-purple-600 text-white hover:bg-purple-700 px-4 py-2 rounded-lg transition duration-300">
                                Modifier
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

   
    <div class="mt-6">
        {{ $users->links() }}
    </div>
</div>
@endsection
