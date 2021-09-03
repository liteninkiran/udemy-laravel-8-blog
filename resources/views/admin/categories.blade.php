<x-layouts.admin>

    <section class="section">

        <div class="section-body">

            {{-- Filters --}}
            <div class="row">

                <div class="col-12">

                    <div class="card mb-0">

                        <div class="card-body">

                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="{{ route('admin.categories.index') }}">All <span class="badge badge-white">{{ $categories->count() }}</span></a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('admin.categories.trashed') }}">Trash <span class="badge badge-primary">{{ $trashed->count() }}</span></a></li>
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

            @if ($categories->count() > 0)

                {{-- Data --}}
                <div class="row">

                    <div class="col-12">

                        <div class="card">

                            {{-- Header --}}
                            <div class="card-header">
                                <h4>All Posts</h4>
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
                                            <th>Title</th>
                                            <th>Created At</th>
                                        </tr>

                                        {{-- Data --}}
                                        @foreach ($categories as $category)

                                            <tr>

                                                {{-- Category Title --}}
                                                <td>{{ $category->title }}
                                                    <div class="table-links">
                                                        <a href="{{ route('admin.categories.edit', $category->id) }}">Edit</a><div class="bullet"></div>
                                                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <input type="submit" value="Trash">
                                                        </form>
                                                    </div>
                                                </td>

                                                {{-- Created --}}
                                                <td>{{ $category->created_at }}</td>

                                            </tr>

                                        @endforeach

                                    </table>

                                </div>

                                {{-- Pagination --}}
                                <div class="float-right">
                                    <nav>
                                        <ul class="pagination">
                                            {{ $categories->links('pagination::bootstrap-4') }}
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
