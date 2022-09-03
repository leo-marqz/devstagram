<div>
    <!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->

    <div class="max-w-7xl mx-auto">

        @if ($posts->count())

            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 md:justify-content-center lg:justify-content-center xl:justify-content-center">
                @foreach ($posts as $post)
                <a
                    class=""
                    href="{{route('posts.show', ['user'=>$post->user ,'post'=>$post])}}">

                    <img src="{{ asset('uploads') . "/" . $post->image }}" alt="imagen de post {{ $post->title }}">
                    <p class="font-bold uppercase text-sm flex justify-around items-center text-slate-400 bg-gray-800 border-t-2 border-slate-500 p-1  ">
                        {{$isHome ? $post->user->username : "" }}
                        <span class="font-normal lowercase">{{$post->created_at->diffForHumans()}}</span>
                    </p>
                </a>
                    {{-- <p class="text-gray-500 uppercase text-center font-bold p-4 rounded-lg bg-gray-200">{{$post->title}} <-> {{$post->user->username}}</p> --}}
                @endforeach
            </div>

        @else
            <p class="text-gray-500 uppercase text-center font-bold p-4 rounded-lg bg-gray-200">No hay posts ...</p>
        @endif


</div>
</div>
