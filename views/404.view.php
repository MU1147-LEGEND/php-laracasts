<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>404 Not found</title>
</head>

<body>
    <div class="h-4/5 mt-20 flex items-center justify-center overflow-hidden font-sans">
        <div class="text-center px-4">
            <div class="relative flex justify-center mb-8">
                <svg class="w-40 h-40 text-indigo-500 animate-float z-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 2a5 5 0 00-5 5v2a2 2 0 00-2 2v5a2 2 0 002 2h10a2 2 0 002-2v-5a2 2 0 00-2-2H8V7a2 2 0 014-0h2A4 4 0 0010 2z" />
                    <path d="M10 0C5.58 0 2 3.58 2 8v8c0 1.1.9 2 2 2h2c1.1 0 2-.9 2-2v-2h4v2c0 1.1.9 2 2 2h2c1.1 0 2-.9 2-2V8c0-4.42-3.58-8-8-8zm0 14c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm-3-6c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm6 0c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1z" />
                </svg>

                <div class="absolute -bottom-4 w-24 h-4 bg-gray-300 rounded-[100%] animate-shadow filter blur-sm"></div>
            </div>

            <h1 class="text-7xl font-extrabold text-indigo-100 tracking-widest">404</h1>
            <div class="bg-indigo-600 px-2 text-sm rounded rotate-12 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-24 shadow-lg">
                <span class="text-white font-bold">Page Not Found</span>
            </div>

            <h2 class="text-2xl md:text-3xl font-bold text-gray-500 mt-4 mb-2">
                Oops! You&#39;ve hit a dead end.
            </h2>
            <p class="text-gray-400 mb-8 max-w-md mx-auto">
                Sorry, the page you are looking for does not exist or has been moved.
            </p>

            <a href="/" class="group relative inline-flex items-center justify-center px-8 py-3 text-base font-medium text-white bg-indigo-600 rounded-full overflow-hidden transition-all duration-300 hover:bg-indigo-700 hover:shadow-lg hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span class="absolute w-0 h-0 transition-all duration-500 ease-out bg-white rounded-full group-hover:w-56 group-hover:h-56 opacity-10"></span>
                <span class="relative flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Go back to Homepage
                </span>
            </a>
        </div>
    </div>
</body>

</html>