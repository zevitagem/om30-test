<div class="bg-white rounded overflow-hidden shadow-lg">
    <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">{{ $post->title }}</div>
        <p class="text-gray-700 text-base">
            {{ $post->body }}
        </p>
    </div>
    
    @php 
        $showPreview = ((isset($visibilities) && $visibilities['preview'] == true) || !isset($visibilities));
    @endphp
    
    <div class="px-6 pt-4 pb-2">
        @if($post->belongsToUser($logged_user_id))
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                @if($showPreview)
                    <a type="button" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full mb-2" href="{{ route('posts.preview', $post->id) }}">Preview</a>
                @endif

                <a type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mb-2" href="{{ route('posts.show', $post->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full mb-2">Delete</button>
            </form>
        @else
            @if($showPreview)
                <a type="button" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full mb-2" href="{{ route('posts.preview', $post->id) }}">Preview</a>
            @endif
        @endif
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $post->category }}</span>
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700"><b>Author</b>: {{ $post->user->name }}</span>
        <span class="inline-block bg-indigo-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700"><i>{{ $post->created_at }}</i></span>
    </div>
</div>