<x-layouts.admin>

    <section class="section">

        <div class="section-body">

            <div class="row">

                <div class="col-12">

                    @include('includes.messages')

                    <div class="card">

                        {{-- Header --}}
                        <div class="card-header">
                            <h4>Write Your Post</h4>
                        </div>

                        <form action="{{ route('admin.posts.store') }}" method="POST">

                            @csrf

                            <div class="card-body">

                                {{-- Title --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input name="title" type="text" class="form-control" value="{{ old('title') }}">
                                    </div>
                                </div>

                                {{-- Category --}}
                                <div class="form-group row mb-4">

                                    {{-- Label --}}
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>

                                    {{-- Drop-down Menu --}}
                                    <div class="col-sm-12 col-md-7">

                                        {{-- Check if categories exist --}}
                                        @if ($categories->count() > 0)

                                            {{-- List categories --}}
                                            <select name="category_id" class="form-control selectric">

                                                {{-- Default unselectable option / placeholder --}}
                                                <option value="" disabled @if (old('category_id') === null ) selected @endif>Select a category</option>

                                                {{-- Loop through categories --}}
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" @if (old('category_id') === $category->id ) selected @endif>{{ $category->title }}</option>
                                                @endforeach

                                            </select>

                                        @else

                                            {{-- Unselectable drop-down menu --}}
                                            <select name="category_id" class="form-control selectric" disabled>
                                                <option value="">Please create at least one category</option>
                                            </select>

                                        @endif

                                    </div>

                                </div>

                                {{-- Description --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="desc" class="summernote-simple" style="width: 100%" value="{{ old('desc') }}" id="desc"></textarea>
                                    </div>
                                </div>

                                {{-- Image --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Choose File</label>
                                            <input type="file" name="image" id="image-upload" />
                                        </div>
                                    </div>
                                </div>

                                {{-- User --}}
                                <div class="form-group row mb-4">
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="user_id" value="1" hidden>
                                    </div>
                                </div>

                                {{-- Submit Button --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Create Post</button>
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
