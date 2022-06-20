@component('mail::message')
# Introduction

Olá, {{ $user }}.

Lamentamos que estejas a ter problemas a iniciar sessão no {{ config('app.name') }}.
Recebemos uma mensagem a indicar que te esqueceste da tua palavra-passe.
Se não pediste uma ligação para iniciar sessão nem a reposição da palavra-passe, podes ignorar esta mensagem.

@component('mail::button', ['url' => '{{ route('reset.password')}}'])
Repor palavra-passe
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
