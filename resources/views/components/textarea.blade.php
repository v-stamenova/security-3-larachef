@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-red-700 dark:focus:border-red-800 focus:ring-red-600 dark:focus:ring-red-700 rounded-md shadow-sm']) !!}>
    {{ $slot }}
</textarea>
