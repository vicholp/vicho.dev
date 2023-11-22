<input
  {{ $attributes->merge([
      'class' => "file:rounded file:h-10 file:px-2 file:w-40
                                  file:focus:border-blue-500 file:focus:border-2 file:focus:ring-0
                                  disabled:text-opacity-60 disabled:text-white file:border-0
                                  file:bg-dark file:bg-opacity-10
                                  file:dark:bg-black file:dark:bg-opacity-30",
      'type' => 'file',
  ]) }}
>
