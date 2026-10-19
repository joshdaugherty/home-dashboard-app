<?php

use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Location and weather')] class extends Component {
    //
}; ?>

<section class="w-full">
    @include('partials.settings-heading')

    <flux:heading level="2" class="sr-only">{{ __('Location and weather') }}</flux:heading>

    <x-pages::settings.layout :heading="__('Location and weather')" :subheading="''">
        <livewire:home-dashboard.settings-form :embedded="true" section="location" />
    </x-pages::settings.layout>
</section>
