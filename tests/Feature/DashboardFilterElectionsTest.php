<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Election;

class DashboardFilterElectionsTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_hides_elections_with_done_status(): void
    {
        $active = Election::create([
            'name' => 'Election Active',
            'status' => 'active',
            'start_at' => now()->subDay(),
        ]);

        $done = Election::create([
            'name' => 'Election Done',
            'status' => 'done',
            'start_at' => now()->subDays(2),
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee($active->name);
        $response->assertDontSee($done->name);
    }
}

