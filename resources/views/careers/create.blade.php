<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('進路情報を登録する') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('careers.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">卒業後の進路</label>
                        <select name="status" class="w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="就職">就職</option>
                            <option value="進学">進学</option>
                            <option value="資格準備">資格準備</option>
                            <option value="その他">その他</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-black text-sm font-bold mb-2">業界（IT、金融、メーカー、官公庁など）</label>
                        <input type="text" name="industry" class="w-full border-gray-300 rounded-md shadow-sm" placeholder="「資格準備」等の場合は空欄でもOK">
                    </div>

                    <div class="mb-4">
                        <label class="block text-black text-sm font-bold mb-2">勤務先 または 進学先大学院</label>
                        <input type="text" name="organization" class="w-full border-gray-300 rounded-md shadow-sm" placeholder="東京大学教育学研究科">
                    </div>

                    <div class="mb-4">
                        <label class="block text-black text-sm font-bold mb-2">職種</label>
                        <input type="text" name="job_title" class="w-full border-gray-300 rounded-md shadow-sm" placeholder="例：エンジニア、研究職">
                    </div>

                    <div class="mb-6">
                        <label class="block text-black text-sm font-bold mb-2">卒業年度</label>
                        <input type="number" name="graduation_year" value="{{ date('Y') }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <div class="flex items-center justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            進路情報を保存する
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>




</x-app-layout>
