<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-4 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 border border-transparent rounded-xl font-semibold text-sm text-white tracking-wide shadow-lg shadow-indigo-500/25 hover:from-indigo-700 hover:to-purple-700 hover:shadow-xl hover:shadow-indigo-500/30 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:scale-95 transition-all duration-150 touch-btn']) }}>
    {{ $slot }}
</button>
