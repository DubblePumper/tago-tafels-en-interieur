<?php

namespace Tests\Feature;

use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    public function test_public_pages_render_with_tago_content(): void
    {
        foreach (['/', '/tafels', '/realisaties', '/maatwerk', '/over-tago', '/contact'] as $uri) {
            $this->get($uri)
                ->assertOk()
                ->assertSee('TAGO')
                ->assertSee('Tafels & Interieur', false);
        }
    }

    public function test_homepage_contains_primary_conversion_copy(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Maatwerktafels met karakter')
            ->assertSee('Bekijk realisaties')
            ->assertSee('Vraag advies')
            ->assertSee('Onze werkwijze');
    }

    public function test_seo_endpoints_render(): void
    {
        $this->get('/robots.txt')
            ->assertOk()
            ->assertSee('Sitemap: '.url('/sitemap.xml'));

        $this->get('/sitemap.xml')
            ->assertOk()
            ->assertSee(route('home'))
            ->assertSee(route('contact'));
    }
}
