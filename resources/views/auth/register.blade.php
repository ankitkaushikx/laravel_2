<x-layout>
    <h2 class="title">Register a new account</h2>
    <div class="mx-auto max-w-screen-sm card">
        <form  action="{{Route('register')}}" method="POST">
{{-- USERNAME --}}
<div class="mb-4">
    <label for="username">Username</label>
    <input type="text" name="username" id="username">
</div>

{{-- EMAIL --}}
<div class="mb-4">
    <label for="email">Email</label>
    <input type="text" name="email" id="email">
</div>
{{-- EMAIL --}}
<div class="mb-4">
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
</div>
{{-- EMAIL --}}
<div class="mb-4">
    <label for="confirmpassword">Confirm Password</label>
    <input type="password" name="confirmpassword" id="confirmpassword">
</div>
<div class="mb-4">
    <button type="submit" class="w-full px-4 py-2 bg-indigo-500 text-white rounded">Register</button>
</div>
        </form>
    </div>
</x-layout>  
