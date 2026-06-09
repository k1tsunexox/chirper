<x-layout title="Login">
    <div class="card bg-base-100 shadow-xl max-w-md mx-auto">
        <div class="card-body">
            <h2 class="card-title mb-4">Sign In</h2>
            @error('email')<p class="text-error mb-2 text-sm">{{ $message }}</p>@enderror
            <form method="POST" action="/login">
                @csrf
                <input type="email" name="email" placeholder="Email" class="input input-bordered w-full mb-3" required>
                <input type="password" name="password" placeholder="Password" class="input input-bordered w-full mb-3" required>
                <button class="btn btn-primary w-full">Log In</button>
            </form>
        </div>
    </div>
</x-layout>
