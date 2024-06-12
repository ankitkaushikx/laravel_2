<x-layout>

    <h1 class="title text-2xl font-bold mb-6">
        Latest Posts
    </h1>

    @if($posts->isEmpty())
        <p class="text-gray-500">No posts available at the moment.</p>
    @else
        @foreach ($posts as $post)
            <div class="card bg-white shadow-md rounded-lg p-4 mb-6">
                {{-- Title --}}
                <h2 class="font-bold text-xl text-gray-800 mb-2">{{$post->title}}</h2>

                {{-- Author And Date --}}
                <div class="text-xs text-gray-500 mb-4">
                    <span>Posted on {{$post->created_at->diffForHumans()}} by</span>
                    <a href="" class="text-blue-500 font-medium">
                      {{$post->user_id}}
                    </a>
                </div>

                {{-- Body --}}
                <div class="text-sm text-gray-700">
                    <p>{{Str::words($post->body, 15, '...')}}</p>
                </div>
            </div>
        @endforeach
    @endif

</x-layout>
