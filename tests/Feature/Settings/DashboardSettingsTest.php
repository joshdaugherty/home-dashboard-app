<?php

namespace Tests\Feature\Settings;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardSettingsTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_are_redirected_to_the_login_page(): void
    {
        foreach (['dashboard.people', 'dashboard.settings', 'dashboard.location'] as $name) {
            $this->get(route($name))->assertRedirect(route('login'));
        }
    }

    public function test_each_section_has_its_own_page_inside_the_settings_area(): void
    {
        $this->actingAs(User::factory()->create());

        $this->get(route('dashboard.people'))->assertOk()->assertSee('Add a person')->assertDontSee('Add a calendar')->assertSee('Appearance');
        $this->get(route('dashboard.settings'))->assertOk()->assertSee('Add a calendar')->assertDontSee('Add a person');
        $this->get(route('dashboard.location'))->assertOk()->assertSee('Find a place')->assertDontSee('Add a calendar');
    }

    public function test_the_dashboard_settings_link_goes_to_the_calendars_page(): void
    {
        $this->assertSame(route('dashboard.settings'), route(config('home-dashboard.settings_route')));
    }
}
