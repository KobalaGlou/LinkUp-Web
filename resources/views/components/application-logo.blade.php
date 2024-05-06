@php
$classes = ($active ?? false)
            ? ''
            : '';
@endphp

<img {{ $attributes->merge(['class' => $classes]) }} src="/img/Logo_LU_Black.webp" alt="Logo linkup" >