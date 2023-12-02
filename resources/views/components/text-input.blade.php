@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} 
{!! $attributes->merge(['class' => 'appearance-none border-gray-300 dark:border-gray-700 dark:bg-background dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm
file:items-center 
file:px-4 
file:py-2 
file:bg-gray-800 
file:dark:bg-blue-300 
file:border 
file:border-transparent 
file:rounded-md 
file:font-semibold 
file:text-xs 
file:text-white 
file:dark:text-gray-800 
file:tracking-widest 
file:hover:bg-gray-700 
file:dark:hover:bg-secondary 
file:dark:hover:text-text 
file:focus:bg-gray-700 
file:dark:focus:bg-primary 
file:active:bg-gray-900 
file:dark:active:bg-gray-300 
file:focus:outline-none 
file:focus:ring-2 
file:focus:ring-indigo-500 
file:focus:ring-offset-2 
file:dark:focus:ring-offset-gray-800 
file:transition ease-in-out 
file:duration-150']) !!}>
