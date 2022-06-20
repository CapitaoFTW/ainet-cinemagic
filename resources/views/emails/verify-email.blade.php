@component('mail::message')
# Introduction

Olá, {{ $user }}.

Recebemos uma mensagem a indicar que te registaste no nosso site.

Terás então de verificar o teu e-mail abaixo.

Se não te registaste {{ config('app.name') }}, podes ignorar esta mensagem.

@component('mail::button', ['url' => '{{ route('reset.password')}}'])
Repor palavra-passe
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
