@props(['chirp'])

<div class="card bg-base-100 shadow-xl mb-4 border border-base-300">
    <div class="card-body">
        <div class="flex justify-between items-start">
            <div>
                <span class="font-bold">{{ $chirp->user ? $chirp->user->name : 'Anonymous' }}</span>
                <span class="text-sm text-gray-500 ml-2">{{ $chirp->created_at->diffForHumans() }}</span>
                @if($chirp->created_at->ne($chirp->updated_at))
                    <span class="text-xs text-gray-400 ml-1">(edited)</span>
                @endif
            </div>

            @can('update', $chirp)
            <div class="flex gap-2">
                <a href="/chirps/{{ $chirp->id }}/edit" class="btn btn-xs btn-outline">Edit</a>
                <form method="POST" action="/chirps/{{ $chirp->id }}" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-xs btn-error btn-outline">Delete</button>
                </form>
            </div>
            @endcan
        </div>
        <p class="mt-2">{{ $chirp->message }}</p>
    </div>
</div>
