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
        $this->get(route('dashboard.settings'))->assertRedirect(route('login'));
    }

    public function test_dashboard_settings_are_embedded_in_the_settings_area(): void
    {
        $this->actingAs(User::factory()->create());

        $this->get(route('dashboard.settings'))
            ->assertOk()
            ->assertSee('Calendars')
            ->assertSee('Location and weather')
            // The app's own settings navigation is present around the form.
            ->assertSee('Appearance')
            ->assertDontSee('Back to dashboard');
    }

    public function test_the_home_tab_links_to_the_embedded_page(): void
    {
        $this->assertSame(route('dashboard.settings'), route(config('home-dashboard.settings_route')));
    }
}
