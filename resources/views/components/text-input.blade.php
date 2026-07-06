@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-2 border-indigo-200 focus:border-indigo-400 focus:ring-indigo-400 rounded-xl shadow-sm bg-white/80 backdrop-blur']) }}>
