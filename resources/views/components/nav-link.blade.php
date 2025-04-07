@props([
     'active' => false
 ])

<a class="navlink {{ $active ? 'active' : '' }}"
   aria-current="{{ $active ? 'page' : 'false' }}"
    {{ $attributes }}
>
    {{ $slot }}
</a>
