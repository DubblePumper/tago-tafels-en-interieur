<?php

namespace App\Support;

final class TagoContent
{
    public static function navigation(): array
    {
        return [
            ['label' => 'Home', 'route' => 'home'],
            ['label' => 'Tafels', 'route' => 'tables'],
            ['label' => 'Realisaties', 'route' => 'realizations'],
            ['label' => 'Maatwerk', 'route' => 'custom'],
            ['label' => 'Over Tago', 'route' => 'about'],
            ['label' => 'Contact', 'route' => 'contact'],
        ];
    }

    public static function meta(string $page): array
    {
        $pages = [
            'home' => [
                'title' => 'Maatwerktafels met karakter',
                'description' => 'Tago Tafels & Interieur maakt unieke tafels in hout en staal, ontworpen rond jouw ruimte, stijl en manier van leven.',
                'route' => 'home',
            ],
            'tables' => [
                'title' => 'Tafels op maat in hout en staal',
                'description' => 'Ontdek eettafels, salontafels en bijzettafels op maat, met keuzes in vorm, afmeting, hout, poten en afwerking.',
                'route' => 'tables',
            ],
            'realizations' => [
                'title' => 'Realisaties en interieurinspiratie',
                'description' => 'Bekijk warme realisaties van maatwerktafels, houten details, staalaccenten en interieurstukken met karakter.',
                'route' => 'realizations',
            ],
            'custom' => [
                'title' => 'Maatwerk tafel aanvragen',
                'description' => 'Stel jouw tafel samen vanuit vorm, afmetingen, houtkleur, poten en afwerking. Vraag advies of een offerte op maat.',
                'route' => 'custom',
            ],
            'about' => [
                'title' => 'Over Tago Tafels & Interieur',
                'description' => 'Leer het ateliergevoel achter Tago kennen: warm vakmanschap, massief hout, staal en persoonlijke begeleiding.',
                'route' => 'about',
            ],
            'contact' => [
                'title' => 'Contact en offerte aanvragen',
                'description' => 'Bespreek jouw tafel of interieurproject met Tago en vraag advies op maat via een korte, duidelijke offerteflow.',
                'route' => 'contact',
            ],
        ];

        return $pages[$page] ?? $pages['home'];
    }

    public static function reasons(): array
    {
        return [
            ['title' => 'Massief & puur materiaal', 'text' => 'Eerlijk hout en staal van hoge kwaliteit.'],
            ['title' => 'Ambacht in eigen atelier', 'text' => 'Handgemaakt met aandacht voor vorm, nerf en detail.'],
            ['title' => 'Ontworpen rond jou', 'text' => 'Maatwerk dat logisch aansluit op jouw interieur.'],
            ['title' => 'Duurzaam & tijdloos', 'text' => 'Robuust gemaakt om lang mee te gaan.'],
            ['title' => 'Persoonlijke begeleiding', 'text' => 'Van eerste idee tot plaatsing, helder en nabij.'],
        ];
    }

    public static function collections(): array
    {
        return [
            ['title' => 'Eettafels', 'slug' => 'eettafels', 'image' => 'collection-eettafels.png', 'alt' => 'Eiken eettafel op maat met zwart stalen onderstel'],
            ['title' => 'Salontafels', 'slug' => 'salontafels', 'image' => 'collection-salontafels.png', 'alt' => 'Salontafel op maat in hout en staal in een warm interieur'],
            ['title' => 'Bijzettafels', 'slug' => 'bijzettafels', 'image' => 'collection-bijzettafels.png', 'alt' => 'Ronde bijzettafel in hout met zwart stalen poot'],
            ['title' => 'Stoelen', 'slug' => 'stoelen', 'image' => 'collection-stoelen.png', 'alt' => 'Gestoffeerde stoel naast een houten maatwerktafel'],
            ['title' => 'Verlichting', 'slug' => 'verlichting', 'image' => 'collection-verlichting.png', 'alt' => 'Warme hanglamp boven een houten tafel'],
            ['title' => 'Interieur', 'slug' => 'interieur', 'image' => 'collection-interieur.png', 'alt' => 'Maatwerk interieurkast in hout en zwart staal'],
        ];
    }

    public static function processSteps(): array
    {
        return [
            ['number' => '01', 'title' => 'Kennismaking', 'text' => 'We luisteren naar jouw verhaal, wensen en inspiratie.'],
            ['number' => '02', 'title' => 'Ontwerp', 'text' => 'We vertalen jouw ideeen naar een doordacht ontwerp op maat.'],
            ['number' => '03', 'title' => 'Materiaal & details', 'text' => 'Samen kiezen we houtsoort, afwerking en stalen details.'],
            ['number' => '04', 'title' => 'Productie', 'text' => 'Met ambacht en precisie wordt jouw meubel gemaakt in ons atelier.'],
            ['number' => '05', 'title' => 'Levering & plaatsing', 'text' => 'We leveren en plaatsen met zorg, tot in het kleinste detail.'],
        ];
    }

    public static function realizations(): array
    {
        return [
            ['title' => 'Eiken eettafel met matrixpoot', 'category' => 'eettafels', 'image' => 'realisatie-eiken-matrix.png', 'meta' => 'Massief eiken blad, zwart staal, warm modern interieur'],
            ['title' => 'Ronde tafel in lichte eik', 'category' => 'eettafels', 'image' => 'realisatie-ronde-tafel.png', 'meta' => 'Rond tafelblad, centrale stalen poot, Japandi sfeer'],
            ['title' => 'Salontafel met fijne staalbasis', 'category' => 'salontafels', 'image' => 'collection-salontafels.png', 'meta' => 'Laag en rustig, ontworpen rond zithoek en materiaalgevoel'],
            ['title' => 'Interieurkast met oak accent', 'category' => 'interieur', 'image' => 'collection-interieur.png', 'meta' => 'Hout, staal en rustige styling als geheel'],
            ['title' => 'Dikke tafelrand in eik', 'category' => 'details', 'image' => 'detail-houtnerf.png', 'meta' => 'Close-up van nerf, randafwerking en matte bescherming'],
            ['title' => 'Atelierdetail in productie', 'category' => 'atelier', 'image' => 'atelier-werkbank.png', 'meta' => 'Materiaalkeuze, afwerking en ateliergevoel'],
        ];
    }

    public static function materials(): array
    {
        return [
            ['title' => 'Vorm', 'text' => 'Rond, ovaal, rechthoekig of organisch, afgestemd op jouw ruimte.'],
            ['title' => 'Blad', 'text' => 'Houtsoort, dikte, randafwerking en kleur bepalen het karakter.'],
            ['title' => 'Poten', 'text' => 'Staal, kruispoot, matrixpoot, U-poot of centrale poot.'],
            ['title' => 'Afwerking', 'text' => 'Olie, lak of matte beschermlaag met helder onderhoudsadvies.'],
        ];
    }

    public static function faqs(): array
    {
        return [
            ['question' => 'Wat kost een tafel op maat?', 'answer' => 'Dat hangt af van afmeting, houtsoort, onderstel en afwerking. De offerteflow houdt de eerste aanvraag bewust kort, zodat Tago gericht kan antwoorden.'],
            ['question' => 'Hoe lang duurt maatwerk?', 'answer' => 'De exacte richttermijn wordt per project bevestigd. Materiaalkeuze, planning en afwerking bepalen samen de doorlooptijd.'],
            ['question' => 'Kan ik een foto of plan meesturen?', 'answer' => 'Ja. Je kan bij de aanvraag een beeld uploaden van jouw ruimte, inspiratie of bestaande interieur.'],
            ['question' => 'Welke afwerking past bij mijn interieur?', 'answer' => 'Tago begeleidt je in houtkleur, randafwerking, pootvorm en bescherming, zodat het meubel logisch aanvoelt in de ruimte.'],
        ];
    }

    public static function formOptions(): array
    {
        return [
            'tableTypes' => [
                'eettafel' => 'Eettafel',
                'salontafel' => 'Salontafel',
                'bijzettafel' => 'Bijzettafel',
                'interieur' => 'Interieurstuk',
                'ander' => 'Nog niet zeker',
            ],
            'styles' => [
                'industrieel' => 'Industrieel',
                'landelijk-modern' => 'Landelijk modern',
                'japandi' => 'Japandi',
                'luxe-modern' => 'Luxe modern',
                'nog-onzeker' => 'Nog niet zeker',
            ],
            'woodColors' => [
                'naturel-eik' => 'Naturel eik',
                'donker-eik' => 'Donkere eik',
                'gerookt' => 'Gerookt',
                'zwart' => 'Zwart of diep donker',
                'nog-onzeker' => 'Nog niet zeker',
            ],
        ];
    }
}
