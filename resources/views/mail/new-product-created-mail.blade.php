<x-mail::message>
# Была создана новая что то

{{ $product->name }}

<x-mail::button :url="$url">
Перейти
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
