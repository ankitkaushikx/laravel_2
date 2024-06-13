<x-layout>

    <h1 class="title text-2xl font-bold mb-6">
        Latest Posts
    </h1>
    

    @if($posts->isEmpty())
        <p class="text-gray-500">No posts available at the moment.</p>
    @else
    <div class="grid grid-cols-2 gap-6">

    @foreach ($posts as $post)
         <x-postCard :post="$post" />

        @endforeach
        </div>
        <div>
            {{$posts->links()}}
        </div>
    @endif

</x-layout>
