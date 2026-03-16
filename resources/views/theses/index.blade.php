<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('論文アーカイブ一覧') }}
            </h2>
            <a href="{{ route('theses.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md text-sm">新規投稿</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <form action="{{ route('theses.index') }}" method="GET" class="flex gap-2">
                    <input type="text" name="keyword" placeholder="キーワードで検索..." value="{{ request('keyword') }}" class="w-full border-gray-300 rounded-md shadow-sm">
                    <button type="submit" class="bg-gray-800 text-white px-6 py-2 rounded-md">検索</button>
                </form>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($theses as $thesis)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-blue-500">
                        <div class="text-sm text-gray-500 mb-1">{{ $thesis->published_year }}年度 | 指導：{{ $thesis->advisor }}</div>
                        <h3 class="text-lg font-bold mb-2">
                            <a href="{{ route('theses.show', $thesis) }}" class="text-blue-600 hover:underline">
                                {{ $thesis->title }}
                            </a>
                        </h3>
                        <p class="text-gray-600 text-sm line-clamp-3 mb-4">{{ $thesis->abstract }}</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach(explode(',', $thesis->keywords) as $tag)
                                <span class="bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">{{ trim($tag) }}</span>
                            @endforeach
                        </div>
                        <div class="mt-4 flex justify-between items-center">
                            <a href="{{ route('theses.show', $thesis) }}" class="text-blue-500 text-sm">詳細を見る</a>

                            @if($thesis->user_id === auth()->id())
                                <div class="flex gap-2 text-sm">
                                    <a href="{{ route('theses.edit', $thesis) }}" class="text-gray-500 hover:underline">編集</a>
                                    <form action="{{ route('theses.destroy', $thesis) }}" method="POST" onsubmit="return confirm('PDFファイルも削除されます。よろしいですか？');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:underline">削除</button>
                                    </form>
                                </div>
                            @endif
                        </div>

                    </div>

                @endforeach
            </div>

            @if($theses->isEmpty())
                <p class="text-center text-gray-500">該当する論文は見つかりませんでした。</p>
            @endif
        </div>
    </div>
</x-app-layout>
