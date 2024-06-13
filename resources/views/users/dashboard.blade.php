<x-layout>
    <h1 class="title text-2xl font-bold mb-6">Hello {{ auth()->user()->username }}</h1>

    <div class="card bg-white shadow-md rounded-lg p-6 mb-6">
        <h2 class="font-bold text-xl mb-4">Create a new Post</h2>
{{-- session message --}}
@if (session('success'))
  <div class="mb-4">
    <x-flashMsg msg="{{session('success')}}" bg="bg-gray-500" />
  </div>
@endif
 
        <form action="{{ route('posts.store') }}" method="post">
            @csrf

            {{-- Post Title --}}
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" class="input block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('title') ring-red-500 @enderror">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Post Body --}}
            <div class="mb-4">
                <label for="body" class="block text-sm font-medium text-gray-700 mb-2">Post Content</label>
                <textarea name="body" id="body" rows="5" class="input block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('body') ring-red-500 @enderror">{{ old('body') }}</textarea>
                @error('body')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit Button --}}
            <div>
                <button type="submit" class="bg-slate-900 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded-md shadow-sm">
       Create
                </button>
            </div>
        </form>

        
        {{-- USER POST --}}
        <div class="m-4 ">
          <h1 class="title">Your Latest Post</h1>
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
        </div>
    </div>
</x-layout>
