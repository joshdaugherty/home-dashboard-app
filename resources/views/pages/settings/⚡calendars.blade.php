<?php

use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Calendars')] class extends Component {
    //
}; ?>

<section class="w-full">
    @include('partials.settings-heading')

    <flux:heading level="2" class="sr-only">{{ __('Calendars') }}</flux:heading>

    <x-pages::settings.layout :heading="__('Calendars')" :subheading="''">
        <livewire:home-dashboard.settings-form :embedded="true" section="calendars" />
    </x-pages::settings.layout>
</section>
