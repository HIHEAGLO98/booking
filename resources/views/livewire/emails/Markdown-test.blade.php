@component('mail::message')
# Introduction

Bonjour Monsieur/Madame.
Vous venez de reserver une place pour cet événement.
Nous vous souhaitons un bon spectacle!!!

@component('mail::button', ['url' => 'http://booking_app.test'])
Cliquez ici
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
