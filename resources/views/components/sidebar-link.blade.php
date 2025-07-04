@props(['href', 'icon' => '', 'active' => false])

<a href="{{ $href }}"
    {{ $attributes->merge([
        'class' =>
            ($active
                ? 'bg-gray-200 text-blue-700 font-semibold'
                : 'text-gray-700 hover:bg-gray-100') .
            ' flex items-center px-4 py-2 rounded transition duration-150 ease-in-out'
    ]) }}>
    <span class="mr-2">{!! $icon !!}</span>
    {{ $slot }}
</a>
