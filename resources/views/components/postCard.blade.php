@props(['post'])
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