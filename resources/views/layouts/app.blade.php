<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sembark URL Shortener</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 antialiased">
    <div class="min-h-screen flex flex-col">
        <!-- Navigation -->
        <nav class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="{{ route('dashboard') }}" class="shrink-0 flex items-center gap-2">
                            <div
                                class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold">
                                S</div>
                            <span class="font-bold text-xl tracking-tight text-gray-900">Sembark<span
                                    class="text-blue-600">Short</span></span>
                        </a>
                    </div>
                    <div class="flex items-center gap-4">
                        @auth
                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                <div
                                    class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <span class="hidden md:block font-medium">{{ Auth::user()->name }}</span>
                                <span
                                    class="hidden md:block text-xs px-2 py-1 rounded-full bg-gray-100 border border-gray-200">
                                    @if(Auth::user()->isSuperAdmin()) Super Admin
                                    @elseif(Auth::user()->isAdmin()) Admin
                                    @else Member
                                    @endif
                                </span>
                            </div>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="text-gray-500 hover:text-red-600 transition-colors p-2 rounded-full hover:bg-red-50"
                                    title="Logout">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                </button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="grow py-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Alerts -->
                @if(session('success'))
                    <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-r-md shadow-sm flex items-center justify-between"
                        role="alert">
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-circle-check text-green-500"></i>
                            <p class="text-sm text-green-700 font-medium">{{ session('success') }}</p>
                        </div>
                        <button onclick="this.parentElement.remove()" class="text-green-500 hover:text-green-700"><i
                                class="fa-solid fa-times"></i></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-md shadow-sm" role="alert">
                        <div class="flex items-start gap-3">
                            <i class="fa-solid fa-circle-exclamation text-red-500 mt-1"></i>
                            <div>
                                <p class="text-sm text-red-700 font-bold">Something went wrong:</p>
                                <ul class="mt-1 list-disc list-inside text-sm text-red-600">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-200 mt-auto">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <p class="text-center text-sm text-gray-500">&copy; {{ date('Y') }} Sembark URL Shortener. Built for
                    Assignment.</p>
            </div>
        </footer>
    </div>
</body>

</html>