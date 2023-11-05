<aside class="w-1/4 p-7 border-r border-gray-500 flex-shrink-0 text-white min-h-full">
    <!-- Settings Dropdown -->
    {{-- <div class="hidden lg:ml-0 sm:flex sm:items-center sm:ml-6">
        <x-dropdown align="right" width="full">
            <x-slot name="trigger">
                <button class="inline-flex items-center px-3 py-2 border border-transparent font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150 w-full">
                    <img class="rounded-md" src="https://i.pravatar.cc/60" alt="">
                    <div class="text-left text-lg flex-1 pl-3" >{{ Auth::user()->name }}</div>
                    <div class="ml-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-dropdown-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div> --}}
    <form action="/" method="post">
        @csrf
        <div class="grid grid-cols-5">
            <x-text-input class="w-full col-span-4" />
            <button class="col-span-auto">Search</button>
        </div>

    </form>
    <ul class="mt-6 text-lg">
        <li>
            <div x-data="{open: false}">
                <span @click ="open =! open" href="{{ route('Home') }}">All Documents</span>
                <div x-show="open" x-collapse>
                    <ul class="ms-10">
                        <li>ASDldj</li>
                        <ul class="ms-10">
                            <li>ASDldj</li>
                        </ul>
                    </ul>
                </div>
            </div>
            <div x-data="{open: false}">
                <span @click ="open =! open" href="{{ route('Home') }}">All Documents</span>
                <div x-show="open" x-collapse>
                    <ul class="ms-10">
                        <li>ASDldj</li>
                        <ul class="ms-10">
                            <li>ASDldj</li>
                        </ul>
                    </ul>
                </div>
            </div>
        </li>
    </ul>
</aside>
