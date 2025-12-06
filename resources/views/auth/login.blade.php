<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sembark URL Shortener</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-50 font-sans antialiased">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-2xl shadow-xl border border-gray-100">
            <div>
                <div
                    class="mx-auto h-16 w-16 bg-blue-600 rounded-2xl flex items-center justify-center text-white text-3xl font-bold shadow-lg shadow-blue-200">
                    S
                </div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Welcome Back
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Sign in to manage your short URLs
                </p>
            </div>

            <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="rounded-md shadow-sm -space-y-px">
                    <div class="mb-4">
                        <label for="email" class="sr-only">Email address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa-solid fa-envelope text-gray-400"></i>
                            </div>
                            <input id="email" name="email" type="email" autocomplete="email" required
                                class="appearance-none rounded-lg relative block w-full pl-10 px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm transition-all"
                                placeholder="Email address" value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa-solid fa-lock text-gray-400"></i>
                            </div>
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                required
                                class="appearance-none rounded-lg relative block w-full pl-10 px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm transition-all"
                                placeholder="Password">
                        </div>
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all shadow-md shadow-blue-100">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <i class="fa-solid fa-arrow-right text-blue-500 group-hover:text-blue-400"></i>
                        </span>
                        Sign in
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>