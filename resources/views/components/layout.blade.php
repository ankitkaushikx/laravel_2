<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
     <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-slate-100 text-slate-900">
  <header class="bg-slate-800 shadow-lg ">
    <nav>
       <a href="{{route('posts.index')}}" class="nav-link">Home</a>
@auth
  <div class="relative grid place-items-center" x-data="{open:false}">
    {{-- Dropdown Menu Button --}}
    <button @click="open = !open" class="round-btn" type="button">
      <img src="https://picsum.photos/200" alt="" width="30px" height="30px" class="rounded-2xl">
    </button>
 

  {{-- Dropdown Menu --}}
  <div x-show="open" @click.outside="open = false" class="bg-white shadow-lg absolute top-10 right=0 rounded-lg overflow-hidden font-light">
    <p class="username text-sm text-center p-1 shadow-sm">
{{auth()->user()->username}}
    </p>
    <a href="{{route('dashboard')}}" class="block hover:bg-slate-100 pl-4 pr-8 py-2">Dashboard</a>

    <form action="{{route('logout')}}" method="post">
      @csrf
      <button class=" w-full block hover:bg-slate-100 pl-4 pr-8 py-2">Logout</button>
    </form>
  </div>
  </div>
@endauth

   @guest
         <div class="flex items-center gap-4">
        <a href="{{route('login')}}" class="nav-link">LogIn</a>
        <a href="{{route('register')}}" class="nav-link">Register</a>
       </div>
   @endguest
    </nav>
  </header>

  <main class="py-8 px-4 mx-auto">
  {{$slot}}
  </main>
</body>
</html>