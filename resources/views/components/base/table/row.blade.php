{{--
  This component is used to display a table row inside a table.
--}}

@props([
    'href' => false,
])

@if ($href)
  <a href="{{ $href }}">
@endif
<div class="grid grid-cols-12 bg-black bg-opacity-0 px-6 py-4 hover:bg-opacity-5">
  {{ $slot }}
</div>
@if ($href)
  </a>
@endif
