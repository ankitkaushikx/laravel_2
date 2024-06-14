<x-layout>
  <h1 class="mb-4">Please Verify Your email through the email we've sent You.</h1>
  
  <p>Didn't get the email</p>
  
  <form action="{{route('verification.send')}}" method="post">
    @csrf
    <button class="btn">Send Again</button>
  </form>
</x-layout>