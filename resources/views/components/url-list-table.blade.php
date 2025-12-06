<div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-700">

            <thead class="bg-slate-900 text-white text-xs uppercase font-bold tracking-wider">
                <tr>
                    <th class="px-6 py-5 rounded-tl-lg">Short URL</th>
                    <th class="px-6 py-5">Original Destination</th>
                    <th class="px-6 py-5 text-center">Hits</th>
                    @if(isset($showCompany))
                    <th class="px-6 py-5">Company</th> @endif
                    @if(isset($showUser))
                    <th class="px-6 py-5">Created By</th> @endif
                    <th class="px-6 py-5 text-right rounded-tr-lg">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($urls as $url)
                    <tr class="hover:bg-blue-50 transition-colors group">

                        <td class="px-6 py-6 font-medium align-middle">
                            <div
                                class="inline-flex items-center gap-3 px-5 py-3 rounded-lg bg-indigo-50 border border-indigo-200 text-indigo-700 shadow-sm w-full max-w-60 hover:border-indigo-400 hover:shadow-md transition-all">
                                <div class="p-1.5 bg-indigo-100 rounded text-indigo-600 shrink-0">
                                    <i class="fa-solid fa-bolt text-xs"></i>
                                </div>
                                <div class="flex flex-col min-w-0">
                                    <span
                                        class="text-[10px] uppercase text-indigo-400 font-bold tracking-wider leading-none mb-0.5">Short
                                        Link</span>
                                    <a href="{{ url($url->short_code) }}" target="_blank"
                                        class="font-bold truncate hover:underline text-sm"
                                        title="{{ url($url->short_code) }}">
                                        {{ request()->getHost() }}/{{ $url->short_code }}
                                    </a>
                                </div>
                                <a href="{{ url($url->short_code) }}" target="_blank"
                                    class="ml-auto p-1 text-indigo-400 hover:text-indigo-800 transition-colors">
                                    <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i>
                                </a>
                            </div>
                        </td>


                        <td class="px-6 py-6 align-middle">
                            <div
                                class="flex items-center gap-3 px-5 py-3 rounded-lg bg-gray-50 border border-gray-200 text-gray-600 max-w-sm shadow-sm hover:bg-white hover:shadow-md transition-all group-hover/url:border-gray-300">
                                <div class="p-1.5 bg-gray-200 rounded text-gray-500 shrink-0">
                                    <i class="fa-solid fa-turn-down text-xs rotate-90"></i>
                                </div>
                                <div class="flex flex-col min-w-0">
                                    <span
                                        class="text-[10px] uppercase text-gray-400 font-bold tracking-wider leading-none mb-0.5">Destination</span>
                                    <span class="truncate text-sm" title="{{ $url->original_url }}">
                                        {{ $url->original_url }}
                                    </span>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-6 text-center align-middle">
                            <span
                                class="inline-flex flex-col items-center justify-center w-12 h-12 rounded-full text-xs font-bold bg-slate-100 text-slate-700 border border-slate-200 shadow-sm">
                                <span>{{ number_format($url->hits) }}</span>
                                <span class="text-[8px] text-slate-400 font-normal uppercase">Hits</span>
                            </span>
                        </td>

                        @if(isset($showCompany))
                            <td class="px-6 py-6 align-middle">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-lg bg-slate-800 flex items-center justify-center text-sm font-bold text-white shadow-md ring-2 ring-slate-100">
                                        {{ substr($url->company->name ?? '?', 0, 1) }}
                                    </div>
                                    <span class="font-semibold text-gray-700">{{ $url->company->name ?? 'N/A' }}</span>
                                </div>
                            </td>
                        @endif

                        @if(isset($showUser))
                            <td class="px-6 py-6 text-gray-600 font-medium align-middle">{{ $url->user->name }}</td>
                        @endif

                        <td class="px-6 py-6 text-right align-middle">

                            <button onclick="navigator.clipboard.writeText('{{ url($url->short_code) }}')"
                                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-slate-900 hover:bg-black text-white text-xs font-bold uppercase tracking-wider transition-all shadow-md hover:shadow-xl hover:-translate-y-0.5 active:translate-y-0 active:scale-95"
                                title="Copy Link to Clipboard">
                                <i class="fa-regular fa-copy"></i>
                                <span>Copy</span>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-20 text-center text-gray-400 bg-gray-50">
                            <div class="flex flex-col items-center gap-4">
                                <div
                                    class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center shadow-inner">
                                    <i class="fa-regular fa-folder-open text-3xl text-gray-400"></i>
                                </div>
                                <div class="text-center">
                                    <p class="text-lg font-medium text-gray-600">No URLs found</p>
                                    <p class="text-sm text-gray-400">Create your first short link above!</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($urls->hasPages())
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
            {{ $urls->links() }}
        </div>
    @endif
</div>