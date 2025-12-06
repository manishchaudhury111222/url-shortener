<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-8">
    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
        <div class="p-2 bg-purple-100 rounded-lg text-purple-600">
            <i class="fa-solid fa-user-plus"></i>
        </div>
        <h3 class="text-lg font-bold text-gray-900">
            @if(Auth::user()->isSuperAdmin()) Invite New Client @else Invite Team Member @endif
        </h3>
    </div>

    <form action="{{ route('invite.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
        @csrf

        @if(Auth::user()->isSuperAdmin())
            <div class="md:col-span-3">
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Company Name</label>
                <input type="text" name="company_name"
                    class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:border-purple-500 focus:ring-2 focus:ring-purple-200 outline-none"
                    placeholder="Acme Corp" required>
            </div>
        @endif

        <div class="{{ Auth::user()->isSuperAdmin() ? 'md:col-span-3' : 'md:col-span-4' }}">
            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Name</label>
            <input type="text" name="name"
                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:border-purple-500 focus:ring-2 focus:ring-purple-200 outline-none"
                placeholder="John Doe" required>
        </div>

        <div class="{{ Auth::user()->isSuperAdmin() ? 'md:col-span-4' : 'md:col-span-4' }}">
            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Email</label>
            <input type="email" name="email"
                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:border-purple-500 focus:ring-2 focus:ring-purple-200 outline-none"
                placeholder="john@example.com" required>
        </div>

        @if(!Auth::user()->isSuperAdmin())
            <div class="md:col-span-2">
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Role</label>
                <select name="role"
                    class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:border-purple-500 focus:ring-2 focus:ring-purple-200 outline-none">
                    <option value="3">Member</option>
                    <option value="2">Admin</option>
                </select>
            </div>
        @endif

        <div class="md:col-span-2">
            <button type="submit"
                class="w-full bg-purple-600 hover:bg-purple-700 text-white font-medium py-2.5 px-4 rounded-lg shadow-sm hover:shadow-md transition-all">
                Send <span class="hidden xl:inline">Invite</span>
            </button>
        </div>
    </form>
</div>