<x-layouts.admin>

    <section class="section">

        <div class="section-body">

            @if( $categories->count() > 0)

                <div class="row">
                    <div class="col-12">

                        <div class="card mb-0">
                            <div class="card-body">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">All <span class="badge badge-white">10</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Draft <span class="badge badge-primary">2</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Pending <span class="badge badge-primary">3</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Trash <span class="badge badge-primary">0</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">

                    <div class="col-12">

                        @include('includes.messages')

                        <div class="card">
                            <div class="card-header">
                                <h4>All Posts</h4>
                            </div>
                            <div class="card-body">

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

                                {{-- Table --}}
                                <div class="table-responsive">

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
                                                        <a href="#" class="text-danger">Trash</a>
                                                    </div>
                                                </td>

                                                {{-- Created --}}
                                                <td>{{ $category->created_at }}</td>

                                            </tr>

                                        @endforeach

                                    </table>

                                </div>

                                <div class="float-right">
                                    <nav>
                                        <ul class="pagination">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                            <li class="page-item active">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @else

                <h4>No records to display</h4>

            @endif

        </div>

    </section>

</x-layout>
