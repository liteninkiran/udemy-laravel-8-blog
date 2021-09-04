<x-layouts.app>

    <div class="row gx-4 gx-lg-5 justify-content-center">

        <div class="col-md-10 col-lg-8 col-xl-7">

            @if ($posts->count() > 0)

                @foreach ($posts as $post)

                    <!-- Post preview-->
                    <div class="post-preview">

                        <a href="post.html">
                            <h2 class="post-title">{{ $post->title }}</h2>
                            <h3 class="post-subtitle">{!! $post->desc !!}</h3>
                        </a>

                        <p class="post-meta">
                            Posted by<a href="#">{{ $post->user->name }}</a>on {{ date('l\, \t\h\e jS \o\f F \a\t H:i', strtotime($post->created_at)) }}
                        </p>

                        {{--

                            Characters that have a backslash \ before them are escaped. Spaces are spaces.

                            "\, \t\h\e"     >>      ", the"
                            "\o\f"          >>      "of"
                            "\a\t"          >>      "at"

                            Date/Time Formats:

                            l: Sunday through Saturday
                            j: Day of month without leading zeroes
                            S: st, nd, rd or th. Works well with j (above)
                            H: 24-hour format of an hour with leading zeros
                            i: Minutes with leading zeros
                            
                        --}}

                    </div>

                    <!-- Divider-->
                    <hr class="my-4" />

                @endforeach

            @else

            @endif

            <!-- Pager-->
            <div class="d-flex justify-content-end mb-4">
                {{-- <a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a> --}}
                {{ $posts->links('pagination::bootstrap-4') }}
            </div>

        </div>

    </div>
    
</x-layouts>
