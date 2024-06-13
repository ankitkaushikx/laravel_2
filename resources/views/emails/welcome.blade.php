<h1>Welcome {{$user->username}}</h1>

<div class="">
  <p>Congratulation You Created a new Post</p>
  <h3>{{$post->body}}</h3>

  <img width="300" src="{{ $message->embed('storage/' . $post->image)}}" alt="">
</div>