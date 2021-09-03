<x-layouts.admin>

    <section class="section">

        <div class="section-body">

            {{-- Filters --}}
            <div class="row">

                <div class="col-12">

                    <div class="card mb-0">

                        <div class="card-body">

                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="{{ route('admin.posts.index') }}">All <span class="badge badge-white">{{ $posts->count() }}</span></a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('admin.posts.trashed') }}">Trash <span class="badge badge-primary">{{ $trashed->count() }}</span></a></li>
                            </ul>

                        </div>

                    </div>

                </div>

            </div>

            @if( $posts->count() > 0)

                {{-- Messages --}}
                <div class="row mt-4">
                    <div class="col-12">
                        @include('includes.messages')
                    </div>
                </div>

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
                                            <th>Description</th>
                                            {{-- <th>Image</th> --}}
                                            <th>Category</th>
                                            <th>Created At</th>
                                        </tr>

                                        {{-- Data --}}
                                        @foreach ($posts as $post)

                                            <tr>

                                                {{-- Post Title --}}
                                                <td>{{ $post->title }}
                                                    <div class="table-links">
                                                        <a href="{{ route('admin.posts.edit', $post->id) }}">Edit</a><div class="bullet"></div>
                                                        <a href="{{ route('admin.posts.destroy', $post->id) }}">Trash</a>
                                                    </div>
                                                </td>

                                                {{-- Post Description --}}
                                                <td>{!! $post->desc !!}
                                                    <div class="table-links">
                                                        <a href="{{ route('admin.posts.edit', $post->id) }}">Edit</a><div class="bullet"></div>
                                                        <a href="{{ route('admin.posts.destroy', $post->id) }}">Trash</a>
                                                    </div>
                                                </td>

                                                {{-- Image --}}
{{-- 
                                                <td>{{ $post->image }}
                                                    <div class="table-links">
                                                        <a href="{{ route('admin.posts.edit', $post->id) }}">Edit</a><div class="bullet"></div>
                                                        <a href="{{ route('admin.posts.destroy', $post->id) }}">Trash</a>
                                                    </div>
                                                </td>
 --}}
                                                {{-- Category --}}
                                                <td>{{ $post->category->title }}
                                                    <div class="table-links">
                                                        <a href="{{ route('admin.posts.edit', $post->id) }}">Edit</a><div class="bullet"></div>
                                                        <a href="{{ route('admin.posts.destroy', $post->id) }}">Trash</a>
                                                    </div>
                                                </td>

                                                {{-- Created --}}
                                                <td>{{ $post->created_at }}</td>

                                            </tr>

                                        @endforeach

                                    </table>

                                </div>

                                {{-- Pagination --}}
                                <div class="float-right">
                                    <nav>
                                        <ul class="pagination">
                                            {{ $posts->links('pagination::bootstrap-4') }}
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
