<x-layout title="Home - Chirper">
    <form method="POST" action="/chirps" class="mb-8">
        @csrf
        <textarea
            name="message"
            class="textarea textarea-bordered w-full @error('message') textarea-error @enderror"
            placeholder="What's on your mind?"
            rows="3"
            maxlength="255"
        >{{ old('message') }}</textarea>
        @error('message')
            <span class="text-error text-sm mt-1">{{ $message }}</span>
        @enderror
        <div class="flex justify-end mt-2">
            <button class="btn btn-primary">Chirp</button>
        </div>
    </form>

    <h1 class="text-2xl font-bold mb-6">Latest Chirps</h1>

    @forelse($chirps as $chirp)
        <x-chirp :chirp="$chirp" />
    @empty
        <p class="text-center text-gray-500">No chirps yet. Be the first!</p>
    @endforelse
</x-layout>
