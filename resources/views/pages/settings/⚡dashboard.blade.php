<?php

use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Dashboard settings')] class extends Component {
    //
}; ?>

<section class="w-full">
    @include('partials.settings-heading')

    <flux:heading level="2" class="sr-only">{{ __('Dashboard settings') }}</flux:heading>

    <x-pages::settings.layout :heading="__('Dashboard')" :subheading="__('Calendars, location and weather for the frame')">
        <livewire:home-dashboard.settings-form :embedded="true" />
    </x-pages::settings.layout>
</section>
