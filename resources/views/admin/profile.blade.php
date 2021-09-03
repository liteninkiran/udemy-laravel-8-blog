<x-layouts.admin>

    <section class="section">
        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-4">

                    {{-- Name and Email --}}
                    <div class="card author-box">
                        <div class="card-body">
                            <div class="author-box-center">

                                {{-- Image --}}
                                <img alt="image" src="{{ auth()->user()->getGravatarAttribute() }}" class="rounded-circle author-box-picture">
                                <div class="clearfix"></div>

                                {{-- Name --}}
                                <div class="author-box-name"><a href="#">{{ auth()->user()->name }}</a></div>

                                {{-- Email --}}
                                <div class="author-box-job">{{ auth()->user()->email }}</div>

                            </div>
                        </div>
                    </div>

                    {{-- Personal Details --}}
                    <div class="card">

                        {{-- Header --}}
                        <div class="card-header">
                            <h4>Personal Details</h4>
                        </div>

                        {{-- Details --}}
                        <div class="card-body">
                            <div class="py-4">

                                {{-- Phone --}}
                                <p class="clearfix">
                                    <span class="float-left">Phone</span>
                                    <span class="float-right text-muted">{{ auth()->user()->phone }}</span>
                                </p>

                                {{-- Email --}}
                                <p class="clearfix">
                                    <span class="float-left">Email</span>
                                    <span class="float-right text-muted">{{ auth()->user()->email }}</span>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-8">
                    <div class="card">
                        <div class="padding-20">

                            {{-- Tabs --}}
                            <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab" aria-selected="false">Settings</a>
                                </li>
                            </ul>

                            {{-- Tab Content --}}
                            <div class="tab-content tab-bordered" id="myTab3Content">

                                {{-- About --}}
                                <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">

                                    <div class="row">

                                        {{-- Name --}}
                                        <div class="col-md-3 col-6 b-r">
                                            <strong>Full Name</strong><br>
                                            <p class="text-muted">{{ auth()->user()->name }}</p>
                                        </div>

                                        {{-- Phone --}}
                                        <div class="col-md-3 col-6 b-r">
                                            <strong>Phone</strong><br>
                                            <p class="text-muted">{{ auth()->user()->phone }}</p>
                                        </div>

                                        {{-- Email --}}
                                        <div class="col-md-3 col-6 b-r">
                                            <strong>Email</strong><br>
                                            <p class="text-muted">{{ auth()->user()->email }}</p>
                                        </div>

                                    </div>

                                </div>

                                {{-- Settings --}}
                                <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                                    <form method="post" class="needs-validation">

                                        {{-- Header --}}
                                        <div class="card-header">
                                            <h4>Edit Profile</h4>
                                        </div>

                                        <div class="card-body">

                                            <div class="row">

                                                {{-- Name --}}
                                                <div class="form-group col-md-6 col-12">
                                                    <label>Full Name</label>
                                                    <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                                                    <div class="invalid-feedback">
                                                        Please fill in the first name
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">

                                                {{-- Email --}}
                                                <div class="form-group col-md-7 col-12">
                                                    <label>Email</label>
                                                    <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}">
                                                    <div class="invalid-feedback">
                                                        Please fill in the email
                                                    </div>
                                                </div>

                                                {{-- Phone --}}
                                                <div class="form-group col-md-5 col-12">
                                                    <label>Phone</label>
                                                    <input type="tel" name="phone" class="form-control" value="{{ auth()->user()->phone }}">
                                                </div>

                                            </div>

                                        </div>

                                        {{-- Submit Button --}}
                                        <div class="card-footer text-right">
                                            <button class="btn btn-primary">Save Changes</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</x-layout>
