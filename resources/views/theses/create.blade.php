<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('論文を投稿する') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('theses.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">論文タイトル</label>
                        <input type="text" name="title" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">概要（Abstract）</label>
                        <textarea name="abstract" rows="5" class="w-full border-gray-300 rounded-md shadow-sm" required></textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">指導教員</label>
                            <input type="text" name="advisor" class="w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">執筆年度</label>
                            <input type="number" name="published_year" value="{{ date('Y') }}" class="w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">キーワード（カンマ区切り）</label>
                        <input type="text" name="keywords" placeholder="家族社会学, 都市社会学" class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2">論文PDFファイル</label>
                        <input type="file" name="pdf" accept="application/pdf" class="w-full" required>
                    </div>

                    <div class="flex items-center justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            論文を登録する
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
