<x-layout>
@auth
    <h1>
        You Are Logged In
    </h1>
@endauth

@guest
    You Are Not Logged In
@endguest
</x-layout>