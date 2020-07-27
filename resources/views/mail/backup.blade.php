@component('mail::message')
# Chegou, {{ $user->name }}!

O backup das suas RocketNotes está no arquivo do Excel, anexo a este e-mail.

Tenha uma excelente semana!<br>
{{ config('app.name') }}
@endcomponent
