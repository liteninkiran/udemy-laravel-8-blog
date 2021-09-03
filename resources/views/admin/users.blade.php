<x-layouts.admin>

    <section class="section">

        <div class="section-body">

            {{-- Filters --}}
            <div class="row">

                <div class="col-12">

                    <div class="card mb-0">

                        <div class="card-body">

                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="{{ route('admin.users.index') }}">All <span class="badge badge-white">{{ $users->count() }}</span></a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('admin.users.trashed') }}">Trash <span class="badge badge-primary">{{ $trashed->count() }}</span></a></li>
                            </ul>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Messages --}}
            <div class="row mt-4">
                <div class="col-12">
                    @include('includes.messages')
                </div>
            </div>

            @if ($users->count() > 0)

                {{-- Data --}}
                <div class="row">

                    <div class="col-12">

                        <div class="card">

                            {{-- Header --}}
                            <div class="card-header">
                                <h4>All Users</h4>
                            </div>

                            {{-- Data --}}
                            <div class="card-body">

                                {{-- Search Bar --}}
                                <div class="float-right">
                                    <form>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                {{-- Data --}}
                                <div class="table-responsive">

                                    {{-- Table --}}
                                    <table class="table table-striped">

                                        {{-- Header Row --}}
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Created At</th>
                                        </tr>

                                        {{-- Data --}}
                                        @foreach ($users as $user)

                                            <tr>

                                                {{-- Name --}}
                                                <td>{{ $user->name }}

                                                    <div class="table-links">

                                                        {{-- Check if user is admin --}}
                                                        @if (auth()->check() && !auth()->user()->is_admin)
                                                            <a href="{{ route('admin.users.promote', [$user->id, 1]) }}">Promote</a><div class="bullet"></div>
                                                            <a href="{{ route('admin.users.destroy', $user->id) }}">Trash</a>
                                                        @elseif (auth()->check() && auth()->user()->is_admin)
                                                            <a href="{{ route('admin.users.promote', [$user->id, 0]) }}">Demote</a><div class="bullet"></div>
                                                            <a href="{{ route('admin.users.destroy', $user->id) }}">Trash</a>
                                                        @else
                                                            <p>You must be logged in to manage users</p>
                                                        @endif


                                                    </div>

                                                </td>

                                                {{-- Email --}}
                                                <td>{{ $user->email }}

                                                    <div class="table-links">

                                                        {{-- Check if user is admin --}}
                                                        @if (auth()->check() && !auth()->user()->is_admin)
                                                            <a href="{{ route('admin.users.promote', [$user->id, 1]) }}">Promote</a>
                                                        @elseif (auth()->check() && auth()->user()->is_admin)
                                                            <a href="{{ route('admin.users.promote', [$user->id, 0]) }}">Demote</a>
                                                        @else
                                                            <p>You must be logged in to manage users</p>
                                                        @endif

                                                        <div class="bullet"></div>
                                                        <a href="{{ route('admin.users.destroy', $user->id) }}">Trash</a>

                                                    </div>

                                                </td>

                                                {{-- Created --}}
                                                <td>{{ $user->created_at }}</td>

                                            </tr>

                                        @endforeach

                                    </table>

                                </div>

                                {{-- Pagination --}}
                                <div class="float-right">
                                    <nav>
                                        <ul class="pagination">
                                            {{ $users->links('pagination::bootstrap-4') }}
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @else

                <h4 class="mt-4">No records to display</h4>

            @endif

        </div>

    </section>

</x-layout>
