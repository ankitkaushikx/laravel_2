<x-layout>
    <h2 class="title">Reset Your Password</h2>
    <div class="mx-auto max-w-screen-sm card">
        <form action="{{route('password.update')}}" method="POST">
            @csrf

            {{-- TOKEN --}}
            <input type="hidden" name="token" value="{{$token}}">


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


            {{-- SUBMIT BUTTON --}}
            <div class="mb-4">
                <button type="submit" class="w-full px-4 py-2 bg-indigo-500 text-white rounded">Reset Password</button>
            </div>
        </form>
    </div>
</x-layout>
