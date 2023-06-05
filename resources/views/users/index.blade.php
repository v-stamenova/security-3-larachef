<x-app-layout>

    <body class="antialiased">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="p-6 lg:p-8 bg-gray-800 bg-opacity-98	 border-b border-gray-200 dark:border-gray-700  sm:rounded-lg">
                    <div class="flex justify-between">
                        <div>
                            <h1 class="text-8xl text-gray-200 pb-5">Users</h1>
                        </div>
                    </div>

                    <div>
                        <table class="table-fixed w-full text-gray-200">
                            <thead class="text-left">
                            <tr>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>
                                        @if(Auth::user()->id != $user->id)
                                            <form method="POST" action="{{route('admin.users.delete', $user)}}">
                                                @csrf
                                                @method("DELETE")
                                                <x-danger-button type="submit">Delete</x-danger-button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>

</x-app-layout>
