@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-bold text-sm text-gray-700']) }}>
    <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">{{ $value ?? $slot }}</span>
</label>
