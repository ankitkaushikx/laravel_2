<x-layout>
    <h2 class="title">Login</h2>
    <div class="mx-auto max-w-screen-sm card">
        <form action="{{ Route('login') }}" method="POST">
            @csrf



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
{{-- Remember Checkbox --}}
   <div class="mb-4" style="display: flex; align-items: center;">
    <input type="checkbox" name="remember" id="remember" style="margin-right: 0.5rem;">
    <label for="remember">Remember Me</label>
</div>

 @error('failed')
                    <p class="error">{{ $message }}</p>
                @enderror

            <div class="mb-4">
                <button type="submit" class="w-full px-4 py-2 bg-indigo-500 text-white rounded">Register</button>
            </div>
        </form>
    </div>
</x-layout>
