<x-layout>
  <a href="{{route('dashboard')}}" class="block mb-2 text-xs text-blue-500">&larr; Back To Dashboard</a>
  <div class="card bg-white shadow-md rounded-lg p-6 mb-6">
       <h2 class="font-bold text-xl mb-4">Update Post</h2>
       @if (session('success'))
  <div>
    <x-flashMsg msg="{{ session('success') }}" bg="bg-green-500" />
  </div>
@endif
        <form action="{{ route('posts.update', $post) }}" method="post">
            @csrf
@method('PUT')
            {{-- Post Title --}}
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                <input type="text" name="title" id="title" value="{{ $post->title }}" class="input block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('title') ring-red-500 @enderror">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Post Body --}}
            <div class="mb-4">
                <label for="body" class="block text-sm font-medium text-gray-700 mb-2">Post Content</label>
                <textarea name="body" id="body" rows="5" class="input block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('body') ring-red-500 @enderror">{{ $post->body }}</textarea>
                @error('body')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit Button --}}
            <div>
                <button type="submit" class="bg-green-500 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded-md shadow-sm">
       Update
                </button>
            </div>
        </form>
        </div>
</x-layout>