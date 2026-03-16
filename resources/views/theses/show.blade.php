<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('論文詳細') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-8">
                <h1 class="text-2xl font-bold mb-4 text-gray-900">{{ $thesis->title }}</h1>

                <div class="border-b pb-4 mb-6 text-gray-600 grid grid-cols-2 gap-4">
                    <p><strong>執筆者:</strong> {{ $thesis->user->name }}</p>
                    <p><strong>指導教員:</strong> {{ $thesis->advisor }} 先生</p>
                    <p><strong>執筆年度:</strong> {{ $thesis->published_year }}年度</p>
                    <p><strong>投稿日:</strong> {{ $thesis->created_at->format('Y/m/d') }}</p>
                </div>

                <div class="mb-8">
                    <h2 class="text-lg font-semibold mb-2 border-l-4 border-blue-500 pl-2">概要 (Abstract)</h2>
                    <p class="text-gray-700 leading-relaxed whitespace-pre-wrap">{{ $thesis->abstract }}</p>
                </div>

                <div class="bg-gray-50 p-6 rounded-lg border flex justify-between items-center">
                    <div>
                        <h3 class="font-bold text-gray-800">論文PDFファイル</h3>
                        <p class="text-sm text-gray-500">内容を確認するには下のボタンを押してください</p>
                    </div>
                    <a href="{{ Storage::url($thesis->pdf_path) }}" target="_blank" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-6 rounded-lg transition">
                        PDFを開く
                    </a>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100 flex justify-between items-center text-sm text-gray-500">
                    <div>
                        <p>アップロード日: {{ $thesis->created_at->format('Y/m/d H:i') }}</p>
                        <p>最終更新日: {{ $thesis->updated_at->format('Y/m/d H:i') }}</p>
                    </div>

                    @if($thesis->user_id === auth()->id())
                        <div class="flex gap-4">
                            <a href="{{ route('theses.edit', $thesis) }}" class="bg-gray-100 px-4 py-2 rounded hover:bg-gray-200">編集する</a>
                            <form action="{{ route('theses.destroy', $thesis) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500">削除する</button>
                            </form>
                        </div>
                    @endif
                </div>

                <div class="mt-8 text-center">
                    <a href="{{ route('theses.index') }}" class="text-gray-500 hover:underline">一覧に戻る</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
