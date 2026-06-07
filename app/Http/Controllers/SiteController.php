<?php

namespace App\Http\Controllers;

use App\Support\TagoContent;
use Illuminate\Http\Response;

class SiteController extends Controller
{
    public function home()
    {
        return view('pages.home', $this->viewData('home'));
    }

    public function tables()
    {
        return view('pages.tables', $this->viewData('tables'));
    }

    public function realizations()
    {
        return view('pages.realizations', $this->viewData('realizations'));
    }

    public function custom()
    {
        return view('pages.custom', $this->viewData('custom'));
    }

    public function about()
    {
        return view('pages.about', $this->viewData('about'));
    }

    public function contact()
    {
        return view('pages.contact', $this->viewData('contact'));
    }

    public function sitemap(): Response
    {
        return response()
            ->view('seo.sitemap', ['navigation' => TagoContent::navigation()])
            ->header('Content-Type', 'application/xml');
    }

    public function robots(): Response
    {
        return response("User-agent: *\nAllow: /\n\nSitemap: ".url('/sitemap.xml')."\n", 200)
            ->header('Content-Type', 'text/plain');
    }

    private function viewData(string $page): array
    {
        $meta = TagoContent::meta($page);
        $meta['canonical'] = route($meta['route']);

        return [
            'meta' => $meta,
            'schema' => $this->schema(),
            'navigation' => TagoContent::navigation(),
            'reasons' => TagoContent::reasons(),
            'collections' => TagoContent::collections(),
            'processSteps' => TagoContent::processSteps(),
            'realizations' => TagoContent::realizations(),
            'materials' => TagoContent::materials(),
            'faqs' => TagoContent::faqs(),
            'formOptions' => TagoContent::formOptions(),
        ];
    }

    private function schema(): array
    {
        return [
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'Organization',
                    '@id' => url('/#organization'),
                    'name' => 'TAGO Tafels & Interieur',
                    'url' => url('/'),
                    'description' => 'Premium maatwerkatelier voor tafels en interieur in hout en staal.',
                ],
                [
                    '@type' => 'WebSite',
                    '@id' => url('/#website'),
                    'url' => url('/'),
                    'name' => 'TAGO Tafels & Interieur',
                    'publisher' => ['@id' => url('/#organization')],
                    'inLanguage' => 'nl-BE',
                ],
            ],
        ];
    }
}
