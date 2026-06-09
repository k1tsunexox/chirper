<x-layout title="Edit Chirp">
    <h1 class="text-2xl font-bold mb-6">Edit your Chirp</h1>
    <form method="POST" action="/chirps/{{ $chirp->id }}">
        @csrf
        @method('PUT')
        <textarea
            name="message"
            class="textarea textarea-bordered w-full"
            rows="3"
        >{{ old('message', $chirp->message) }}</textarea>
        <div class="flex justify-end mt-2 gap-2">
            <a href="/" class="btn btn-ghost">Cancel</a>
            <button class="btn btn-primary">Update Chirp</button>
        </div>
    </form>
</x-layout>
