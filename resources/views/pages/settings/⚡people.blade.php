<?php

use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('People')] class extends Component {
    //
}; ?>

<section class="w-full">
    @include('partials.settings-heading')

    <flux:heading level="2" class="sr-only">{{ __('People') }}</flux:heading>

    <x-pages::settings.layout :heading="__('People')" :subheading="''">
        <livewire:home-dashboard.settings-form :embedded="true" section="people" />
    </x-pages::settings.layout>
</section>
