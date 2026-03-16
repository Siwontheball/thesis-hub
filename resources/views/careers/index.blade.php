<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('卒業生の進路一覧') }}
            </h2>
            <a href="{{ route('careers.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md text-sm">自分の進路を登録</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 border border-green-400 rounded">
                    {{ session('success') }}
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-full text-left border-collapse">

                        <thead>
                            <tr class="bg-gray-100">
                                <th class="p-3 border">卒業年度</th>
                                <th class="p-3 border">氏名</th>
                                <th class="p-3 border">状況</th>
                                <th class="p-3 border">業界</th>
                                <th class="p-3 border">組織名</th>
                                <th class="p-3 border">職種</th>
                                <th class="p-3 border">操作</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach ($careers as $career)
                            <tr>
                                <td class="p-3 border">{{ $career->graduation_year }}年度</td>
                                <td class="p-3 border">{{ $career->user->name }}</td>
                                <td class="p-3 border">
                                    <span class="px-2 py-1 rounded text-xs {{ $career->status == '就職' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                        {{ $career->status }}
                                    </span>
                                </td>
                                <td class="p-3 border">
                                    {{ $career->industry ?? '---' }}
                                </td>
                                <td class="p-3 border">
                                    {{ $career->organization ?? '---' }}
                                </td>
                                <td class="p-3 border">
                                    {{ $career->job_title ?? '---' }}
                                </td>

                                <td class="p-3 border">
                                    @if ($career->user_id === auth()->id())
                                        <div class="flex gap-2">
                                            <a href="{{ route('careers.edit', $career) }}" class="text-blue-500 hover:underline">編集</a>

                                            <form action="{{ route('careers.destroy', $career) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:underline">削除</button>
                                            </form>
                                        </div>
                                    @endif
                                </td>


                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
