<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('論文情報を編集する') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('theses.update', $thesis) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">論文タイトル</label>
                        <input type="text" name="title" value="{{ $thesis->title }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">概要（Abstract）</label>
                        <textarea name="abstract" rows="5" class="w-full border-gray-300 rounded-md shadow-sm" required>{{ $thesis->abstract }}</textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">指導教員</label>
                            <input type="text" name="advisor" value="{{ $thesis->advisor }}" class="w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">執筆年度</label>
                            <input type="number" name="published_year" value="{{ $thesis->published_year }}" class="w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">キーワード（カンマ区切り）</label>
                        <input type="text" name="keywords" value="{{ $thesis->keywords }}" class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2">PDFファイルを差し替える（変更しない場合は空欄でOK）</label>
                        <input type="file" name="pdf" accept="application/pdf" class="w-full">
                        <p class="text-xs text-gray-500 mt-2">
                            現在のファイル: <span class="font-mono">{{ basename($thesis->pdf_path) }}</span>
                        </p>
                    </div>

                    <div class="flex items-center justify-between">
                        <a href="{{ route('theses.show', $thesis) }}" class="text-gray-500">キャンセル</a>
                        <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-6 rounded shadow-sm hover:bg-blue-700">
                            更新を保存する
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
