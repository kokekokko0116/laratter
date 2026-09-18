<x-layouts.app :title="__('User詳細')">
    <div class="p-6">
        <h2 class="font-semibold text-xl mb-4">{{ __('User詳細') }}</h2>
        <a href="{{ route('tweets.index') }}" class="text-blue-500 hover:text-blue-700 mr-2">一覧に戻る</a>
        <p class="text-lg mt-2">{{ $user->name }}</p>
        <div class="text-sm text-gray-500">
            <p>アカウント作成日時: {{ $user->created_at->format('Y-m-d H:i') }}</p>
        </div>
        @if ($user->id !== auth()->id())
            <div class="mt-2">
                @if ($user->followers->contains(auth()->id()))
                    <form action="{{ route('follow.destroy', $user) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">unFollow</button>
                    </form>
                @else
                    <form action="{{ route('follow.store', $user) }}" method="POST">
                        @csrf
                        <button type="submit" class="text-blue-500 hover:text-blue-700">follow</button>
                    </form>
                @endif
            </div>
        @endif
    </div>
</x-layouts.app>
