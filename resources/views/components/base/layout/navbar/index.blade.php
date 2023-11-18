@props([
    'home' => '/',
    'actions' => false,
    'title' => config('app.name'),
    'subtitle' => false,
    'login' => true,
])
<nav class="flex h-16 w-full flex-row items-center bg-indigo-800 px-4 text-white">
  <a
    class="flex flex-col"
    href="{{ $home }}"
  >
    <h2 class="text-lg font-medium text-white">
      {{ $title }}
    </h2>
    @if ($subtitle)
      <h3 class="pl-1 text-sm text-white text-opacity-90">
        {{ $subtitle }}}
      </h3>
    @endif
  </a>
  @if ($actions)
    <div class="ml-auto flex flex-row items-center gap-2">
      {{ $actions }}
    </div>
  @endif
  @if ($login)
    <div class="ml-auto flex flex-row items-center gap-4">
      @if (Auth::user())
        <div>
          {{ Auth::user()->name }}
        </div>
        <x-base.action
          type="form"
          href="/logout"
          icon="mdi-logout"
          padding="py-2 px-2"
          color="bg-white bg-opacity-5 text-white text-opacity-90"
          darkColor="bg-red-500"
          body="{{ __('log out') }}"
        />
      @else
        <x-base.action
          href="/login"
          icon="mdi-logout"
          padding="py-2 px-2"
          color="bg-white bg-opacity-5 text-white text-opacity-90"
          body="{{ __('log in') }}"
        />
      @endif
    </div>
  @endif
</nav>
