@props(['action', 'method', 'id' => 'form', 'body'])

<form
  class="flex flex-col gap-3"
  {{ $attributes }}action="{{ $action }}"
  method="{{ $method == 'GET' ? 'GET' : 'POST' }}"
  id="{{ $id }}"
  accept-charset="utf-8"
  enctype="multipart/form-data"
>
  @csrf
  @method($method)

  {{ $slot }}
</form>
