<x-layout title="Register">
    <div class="card bg-base-100 shadow-xl max-w-md mx-auto">
        <div class="card-body">
            <h2 class="card-title mb-4">Create Account</h2>
            <form method="POST" action="/register">
                @csrf
                <input type="text" name="name" placeholder="Name" class="input input-bordered w-full mb-3" required>
                <input type="email" name="email" placeholder="Email" class="input input-bordered w-full mb-3" required>
                <input type="password" name="password" placeholder="Password" class="input input-bordered w-full mb-3" required>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" class="input input-bordered w-full mb-3" required>
                <button class="btn btn-primary w-full">Sign Up</button>
            </form>
        </div>
    </div>
</x-layout>
