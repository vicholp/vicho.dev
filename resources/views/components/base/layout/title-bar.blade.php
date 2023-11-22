@props(['title', 'actions' => false, 'previousRoute' => false, 'i18n' => true])

<div class="col-span-12 flex flex-row items-center gap-3">
  <div class="p-2 text-lg font-medium text-black text-opacity-80">
    @if ($previousRoute)
      <a
        href="{{ $previousRoute }}"
        class="flex items-center gap-3 dark:text-white dark:text-opacity-90"
      >
        <v-icon icon="mdi:arrow-left"></v-icon>
        {{ __($title) }}
      </a>
    @else
      <h3 class="p-0.5 dark:text-white dark:text-opacity-90">
        {{ __($title) }}
      </h3>
    @endif
  </div>
  <div class="ml-auto flex flex-row items-center gap-3">
    {{ $actions }}
  </div>
</div>
