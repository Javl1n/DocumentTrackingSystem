<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- User Type -->
        <div x-data="{ cho: true, bhw: false }">
            <div>
                <ul class="grid w-full gap-0 md:grid-cols-2">
                    <li>
                        <x-form.radio
                            value="CHO"
                            x-on:click="bhw = false ; cho = true"
                            name="user_type"
                            class="rounded-l-lg"
                            :check="!empty(old('user_type')) ? old('user_type') === 'CHO' ? true : false : true ">
                            <div class="block">
                                <div class="w-full text-lg font-semibold">CHO</div>
                            </div>
                            {{-- <x-slot name="addonbottom">
                                <div class=" border-none w-[399px] z-50 mt-6 rounded-lg hidden peer-checked:block">
                                    <x-text-input id="key" class="block mt-1 w-full" type="password" name="key" :value="old('key')" placeholder="Key" autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('key')" class="mt-2" />
                                </div>
                            </x-slot> --}}
                        </x-form.radio>
                    </li>
                    <li>
                        <x-form.radio
                            value="BHW"
                            name="user_type"
                            x-on:click="bhw = true ; cho = false"
                            peer="BHW"
                            class="rounded-r-lg"
                            :check="old('user_type') === 'BHW' ? true : false">
                            <div class="block">
                                <div class="w-full text-lg font-semibold">BHW</div>
                            </div>
                        </x-form.radio>
                    </li>
                </ul>
            </div>
            <div x-show="cho" class=" border-none w-[399px] z-50 mt-6 rounded-lg">
                <x-input-label for="key" :value="__('CHO Key')" />
                <x-text-input
                    id="key"
                    class="block mt-1 w-full"
                    type="password"
                    name="key" autocomplete="password" />
                <x-input-error :messages="$errors->get('key')" class="mt-2" />
            </div>
            <div x-show="bhw" class=" border-none w-[399px] z-50 mt-6 rounded-lg">
                <x-input-label for="barangay" :value="__('Barangay')" />
                <select class="border-gray-300 dark:border-gray-700 dark:bg-background dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" name="barangay" id="barangay">
                    @foreach(App\Models\Barangay::all() as $barangay)
                        <option value="{{ $barangay->id }}">{{ $barangay->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        {{-- <!-- Key -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('CHO Key')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('cho_key')" disabled autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div> --}}

        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- Contact -->
        <div class="mt-4">
            <x-input-label for="contact" :value="__('Contact')" />
            <x-text-input id="contact" class="block mt-1 w-full" type="text" name="contact" :value="old('contact')" required autofocus />
            <x-input-error :messages="$errors->get('contact')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-form.buttons.primary-button class="ml-4">
                {{ __('Register') }}
            </x-form.buttons.primary-button>
        </div>
    </form>
</x-guest-layout>
