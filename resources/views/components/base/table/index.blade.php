{{--
  This component is used to display a table, using the card component.

  @param string $header The header of the table.

  For example:

  <x-base.card.table padding="false">
    <x-slot:header>
      <div class="col-span-3">
        Column A
      </div>
      <div class="col-span-3">
        Column B
      </div>
      <div class="col-span-3">
        Column C
      </div>
    </x-slot:table>
    <x-base.card.table-row>
      <div class="col-span-3">
        A
      </div>
      <div class="col-span-3">
        B
      </div>
      <div class="col-span-3">
        C
      </div>
    </x-base.card.table-row>
  </x-base.card.table>
--}}

@props(['header' => false, 'footer' => false])

@if ($header)
  <div
    class="grid grid-cols-12 rounded-t-lg bg-black bg-opacity-5 px-6 py-4 font-medium text-black text-opacity-90 dark:bg-white dark:bg-opacity-5 dark:text-white"
  >
    {{ $header }}
  </div>
@endif
<div
  class="my-[-1rem] flex flex-col divide-y divide-black divide-opacity-5 py-6 dark:divide-white dark:divide-opacity-5">
  {{ $slot }}
</div>
@if ($footer)
  <div
    class="grid grid-cols-12 rounded-b-lg bg-black bg-opacity-5 px-6 py-4 font-medium text-black text-opacity-90 dark:bg-white dark:bg-opacity-5 dark:text-white"
  >
    {{ $footer }}
  </div>
@endif
