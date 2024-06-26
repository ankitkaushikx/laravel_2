<x-layout>
    <h2 class="title">Register a new account</h2>
    <div class="mx-auto max-w-screen-sm card">
        <form action="{{ Route('register') }}" method="POST">
            @csrf

            {{-- USERNAME --}}
            <div class="mb-4">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="{{ old('username') }}" class="input @error('username') ring-red-500 @enderror">
                @error('username')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- EMAIL --}}
            <div class="mb-4">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="{{ old('email') }}"  class="input @error('email') ring-red-500 @enderror">
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- PASSWORD --}}
            <div class="mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="input @error('password') ring-red-500 @enderror">
                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- PASSWORD CONFIRMATION --}}
            <div class="mb-4">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="input">
            </div>
  
            {{-- SUBSCRIBED TO EMAIL NEWSLETTER --}}
            <div class="mb-4" style="display: flex; align-items: center;">
             <input type="checkbox" name="subscribe" id="subscribe">
             <label for="subscribe" class="pl-2">Subscribe to our NewsLetter</label>
            </div>
            {{-- SUBMIT BUTTON --}}
            <div class="mb-4">
                <button type="submit" class="w-full px-4 py-2 bg-indigo-500 text-white rounded">Register</button>
            </div>
        </form>
    </div>
</x-layout>
