<aside class="w-1/4 p-7 border-r border-gray-500  text-white">
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
            <x-text-input class="w-full col-span-5" />
        </div>

    </form>

        <ul class="mt-6 text-lg">
            @foreach($templates as $template)
                <li class="p-2">
                    <div x-data="{open: false}">
                        <div class="flex">
                            <span @click ="open =! open">
                                <x-icon name="dropdown-arrow" class="w-4 mt-1 me-2">
                                </x-icon>
                            </span>
                            <h1 class="text-lg" href="{{ route('Home') }}">{{ $template->name }}</h1>
                        </div>
                        <div x-show="open" x-collapse>
                            <ul class="ms-5 mt-4">
                                @foreach ($documents->where('document_template_id', $template->id) as $document)
                                    <li>ASDldj
                                        <ul class="ms-10">
                                            <li>ASDldj</li>
                                        </ul>
                                    </li>
                                @endforeach
                                <a href="/documents/create/{{ $template->id }}" class="hover:text-blue-500">
                                    <li class="text-base flex">
                                        <span>
                                            <x-icon name="circle" class="w-5 ms-0 mt-0.5" />
                                        </span>
                                        <span>
                                            Create New
                                        </span>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

</aside>
