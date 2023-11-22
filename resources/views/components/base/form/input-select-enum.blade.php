@props(['attribute', 'model' => null, 'name', 'value' => null, 'options' => [], 'nameAttribute' => 'name', 'keyAttribute' => 'id', 'empty' => false])

<select
  {{ $attributes->merge([
      'class' => "rounded h-10 px-2 w-full
                      focus:border-blue-500 focus:border-2 focus:ring-0
                      disabled:text-opacity-60 disabled:text-white
                      border-black border-opacity-20 border-1
                      dark:border-white dark:border-opacity-10 dark:border-1
                      bg-dark bg-opacity-10
                      dark:bg-black dark:bg-opacity-30",
      'name' => $name,
      'value' => $value,
  ]) }}
>
  @if ($empty)
    <option value="">{{ $empty }}</option>
  @endif
  @foreach ($options as $option)
    <option
      value="{{ $option }}"
      class="dark:bg-gray-900"
    >
      {{ Str::ucfirst($option->label()) }}
    </option>
  @endforeach
</select>
