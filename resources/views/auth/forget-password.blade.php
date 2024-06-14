<x-layout>
    <h2 class="title">Reset Your Password</h2>
    {{-- SESSION MESSAGE --}}
        @if (session('status'))
      <div>
        <x-flashMsg msg="{{ session('status') }}" bg="bg-green-500" />
      </div>
    @endif
    <div class="mx-auto max-w-screen-sm card">
        <form action="{{route('password.email')}}" method="POST" x-data="formSubmit" @submit.prevent="submit">
            @csrf
            {{-- EMAIL --}}
            <div class="mb-4">
                <label for="email">Your Email Address</label>
                <input type="text" name="email" id="email" value="{{ old('email') }}"  class="input @error('email') ring-red-500 @enderror">
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <button type="submit" class="w-full px-4 py-2 bg-indigo-500 text-white rounded" x-ref="btn">Submit</button>
            </div>
        </form>
    </div>
</x-layout>
