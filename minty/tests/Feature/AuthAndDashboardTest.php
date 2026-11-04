<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthAndDashboardTest extends TestCase
{
    public function test_home_and_dashboard_return_successful_response(): void
    {
        $responseHome = $this->get('/');
        $responseHome->assertStatus(200);

        $responseDashboard = $this->get('/dashboard');
        $responseDashboard->assertStatus(200);

        $responseMesCartes = $this->get('/mes-cartes');
        $responseMesCartes->assertStatus(200);

        $responseProfil = $this->get('/profil');
        $responseProfil->assertStatus(200);
    }

    public function test_login_page_returns_successful_response(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertSee('Connexion');
    }

    public function test_register_page_returns_successful_response(): void
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertSee('Créer un compte Vault');
    }
}
