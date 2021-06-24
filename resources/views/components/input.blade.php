@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border focus:outline-none
focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 rounded-lg w-full p-2']) !!}>