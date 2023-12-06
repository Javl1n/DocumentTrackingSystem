<div
    {{ $attributes(['class' => 'flex-1 sm:px-6 lg:px-8 pb-7']) }}
    {{-- class="flex-1 sm:px-6 lg:px-8 pb-7 min-w-full" --}}
>
    <div class="bg-white dark:bg-background-light shadow-sm sm:rounded-lg min-h-full p-6 text-gray-900 dark:text-gray-100 h-full">
        {{ $slot }}
    </div>
</div>
