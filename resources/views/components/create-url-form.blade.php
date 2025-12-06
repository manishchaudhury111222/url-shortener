<div
    class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-8 transform hover:scale-[1.01] transition-all duration-300">
    <div class="flex items-center gap-3 mb-4">
        <div class="p-2 bg-indigo-100 rounded-lg text-indigo-600">
            <i class="fa-solid fa-link"></i>
        </div>
        <h3 class="text-lg font-bold text-gray-900">Generate Short URL</h3>
    </div>

    <form action="{{ route('urls.store') }}" method="POST" class="flex flex-col md:flex-row gap-4">
        @csrf
        <div class="grow relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fa-solid fa-globe text-gray-400"></i>
            </div>
            <input type="text" name="original_url"
                class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition-all"
                placeholder="Paste your long URL here (e.g., https://example.com/very/long/path)..." required>
        </div>
        <button type="submit"
            class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 px-8 rounded-lg shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-2">
            <i class="fa-solid fa-wand-magic-sparkles"></i> Generate
        </button>
    </form>
</div>