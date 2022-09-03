<div>
    <!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->

    <div class="max-w-7xl mx-auto">

        @if ($posts->count())

            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 md:justify-content-center lg:justify-content-center xl:justify-content-center">
                @foreach ($posts as $post)
                <a href="{{route('posts.show', ['user'=>$post->user ,'post'=>$post])}}">
                    <img src="{{ asset('uploads') . "/" . $post->image }}" alt="imagen de post {{ $post->title }}">
                </a>
                    {{-- <p class="text-gray-500 uppercase text-center font-bold p-4 rounded-lg bg-gray-200">{{$post->title}} <-> {{$post->user->username}}</p> --}}
                @endforeach
            </div>

        @else
            <p class="text-gray-500 uppercase text-center font-bold p-4 rounded-lg bg-gray-200">No hay posts ...</p>
        @endif


</div>
</div>
