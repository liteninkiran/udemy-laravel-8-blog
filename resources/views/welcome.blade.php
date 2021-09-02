<x-layout>

    <a class="btn btn-sm btn-success mb-2" href="{{ route('create.user') }}">Add User</a>

    <table class="table table-striped table-bordered">

        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @if ($users->count() > 0)
                @foreach ($users as $user)

                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                        <a class="btn btn-sm btn-success" href="{{ route('user', $user->id) }}">View</a>
                        <a class="btn btn-sm btn-primary" href="{{ route('edit', $user->id) }}">Edit</a>
                        <a class="btn btn-sm btn-danger" href="{{ route('delete', $user->id) }}">Delete</a>
                        </td>
                    </tr>

                @endforeach

            @else

                <h3>No Users Found</h3>

            @endif


        </tbody>

    </table>

</x-layout>
