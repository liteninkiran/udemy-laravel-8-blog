<x-layouts.admin>
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">

                    @include('includes.messages')

                    <div class="card">

                        <div class="card-header">
                            <h4>Edit Category</h4>
                        </div>

                        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="title" value="{{ $category->title }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Update Category</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
