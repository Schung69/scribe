<x-mail::message>
# Nouveau message depuis le site

**Nom :** {{ $data['nom'] }}<br>
**E-mail :** {{ $data['email'] }}<br>
@if (! empty($data['telephone']))
**Téléphone :** {{ $data['telephone'] }}<br>
@endif
@if (! empty($data['societe']))
**Société :** {{ $data['societe'] }}<br>
@endif

<x-mail::panel>
{!! nl2br(e($data['message'])) !!}
</x-mail::panel>

Pour répondre, utilisez simplement « Répondre » : le message partira vers {{ $data['email'] }}.
</x-mail::message>
