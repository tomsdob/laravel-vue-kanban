<nav class="fixed top-0 inset-x-0 px-8 py-4 text-white bg-primary z-10" id="navbar">
    <div class="flex justify-between items-center">
        <div class="flex items-center">
            <span class="text-2xl font-medium leading-5">{{ config('app.name', 'Laravel') }}</span>
        </div>
        <div class="space-x-4 flex items-center">
            <button class="relative p-2 text-white hover:text-gray-300 rounded-full transition-all duration-200 focus:outline-none focus:shadow-outline">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                <span class="-mt-6 ml-1 w-2 h-2 bg-red-500 rounded-lg absolute"></span>
            </button>
            <button onclick="document.getElementById('sidebar').classList.toggle('hidden');" class="lg:hidden relative p-2 text-white hover:text-gray-300 rounded-full transition-all duration-200 focus:outline-none focus:shadow-outline">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="menu w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </div>
    </div>
</nav>
