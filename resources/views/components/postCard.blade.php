@props(['post', 'full'=> false])
<div class="card bg-white shadow-sm rounded-lg p-4 mb-6 border">
  {{-- COVER PHOTO --}}
  <div class="flex justify-center">
@if ($post->image)
   <img src="{{ asset('storage/' . $post->image) }}" alt="" class="w-100 mb-5" style="max-height: 200px; min-height:200px">
@else
   <img src="https://placehold.co/800x400" alt="" class="w-100 mb-5" style="max-height: 200px; min-height:200px">
@endif
  </div>
                {{-- Title --}}
                <h2 class="font-bold text-xl text-gray-800 mb-2">{{$post->title}}</h2>

                {{-- Author And Date --}}
                <div class="text-xs text-gray-500 mb-4">
                    <span>Posted on {{$post->created_at->diffForHumans()}} by</span>
                    <a href="{{route('posts.user',$post->user)}}" class="text-blue-500 font-medium">
                      {{$post->user->username}}
                    </a>
                </div>

                {{-- Body --}}
               @if ($full)
  <div class="text-sm text-gray-700">
    <span>{{ $post->body }}</span>
  </div>
@else
  <div class="text-sm text-gray-700">
    <span>{{ Str::words($post->body, 15, '...') }}</span>
    <a class="text-blue-500 font-bold ml-2" href="{{ route('posts.show', $post) }}">Read More &rarr;</a>
  </div>
@endif

           <div class="flex items-center justify-end gap-4 mt-6">
            {{$slot}}
           </div>
            </div>