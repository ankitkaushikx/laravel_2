@props(['post', 'full'=> false])
<div class="card bg-white shadow-md rounded-lg p-4 mb-6">
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
                    <span>{{$post->body}}</sp>
                </div>
                @endif
                 <div class="text-sm text-gray-700">
                    <span>{{Str::words($post->body, 15, '...')}}</sp>
                    <a class="text-blue-500  font-bold ml-2" href="{{route('posts.show', $post)}}">Read More &rarr;</a>
                </div>
               
            </div>