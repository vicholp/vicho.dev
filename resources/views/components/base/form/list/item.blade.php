{{--

For example:

<x-base.form.list.item attribute="asdfk_asdf_id" input="text" />
<x-base.form.list.item attribute="asdfk_asdf_id" input="checkbox" />
<x-base.form.list.item attribute="asdf" input="text" name="sdf" type="number" value="2" />

--}}

@props(['attribute', 'name' => $attribute, 'input' => 'text', 'visible' => true, 'i18n' => true])

@if ($visible)
  <div class="grid grid-cols-12 items-center py-2">
    <div class="col-span-4 px-5 text-right">
      {{ str(__(str($attribute)->snake()->replace('_', ' ')->toString()))->ucfirst() }}
    </div>
    <div class="col-span-8">
      <x-dynamic-component
        :component="'base.form.input-' . $input"
        attribute="{{ $attribute }}"
        name="{{ $name }}"
        {{ $attributes }}
      />
    </div>
  </div>
@endif
