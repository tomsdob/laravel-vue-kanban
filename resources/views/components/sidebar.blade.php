<div class="p-4 hidden flex lg:flex flex-col bg-gray-100 h-full" id="sidebar">
    <ul>
        <li>
            <a href="#" class="block px-4 py-3 text-base font-medium text-gray-500 leading-5 hover:text-gray-800 rounded-lg w-full hover:bg-gray-300 transition-all duration-200">Tasks</a>
        </li>
    </ul>
    <div class="mt-auto flex justify-start items-center">
        <a href="#" class="p-2 flex justify-center items-center text-white bg-blue-600 w-10 h-10 rounded-full">
            {{-- Name, surname initials --}}
            @php
                $name = auth()->user()->name;
                $pos = strpos($name, " ");
                $initials = $name[0] . $name[$pos + 1];
            @endphp
            <span>{{ $initials }}</span>
        </a>
        <a href="{{ route('logout') }}" class="ml-10 flex items-center text-gray-500 hover:text-blue-600 transition-all duration-200">
            <span class="mr-2 text-base font-medium">Logout</span>
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
        </a>
    </div>
</div>
