<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="p-6 text-gray-900">
        <h3 class="text-lg font-bold mb-4">ThesisHubへようこそ！</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <a href="{{ route('theses.index') }}" class="block p-6 bg-blue-50 border border-blue-200 rounded-lg hover:bg-blue-100 transition">
                <h4 class="font-bold text-blue-700">論文アーカイブを見る</h4>
                <p class="text-sm text-blue-600">過去の卒業論文や概要を検索・閲覧できます。</p>
            </a>

            <a href="{{ route('careers.index') }}" class="block p-6 bg-green-50 border border-green-200 rounded-lg hover:bg-green-100 transition">
                <h4 class="font-bold text-green-700">進路情報を見る</h4>
                <p class="text-sm text-green-600">先輩方の就職先や進学先の情報を閲覧できます。</p>
            </a>
        </div>
    </div>
</x-app-layout>
