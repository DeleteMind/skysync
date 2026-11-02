<?php

declare(strict_types=1);

namespace frontend\assets;

use yii\bootstrap5\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

/**
 * Main frontend application asset bundle (template SkySync).
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        // Fontes do template
        'https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&family=Instrument+Serif:ital@0;1&family=JetBrains+Mono:wght@400;500;600&display=swap',
        'css/site.css',
        'css/style.css',     // template SkySync (depois do Bootstrap e do site.css)
    ];

    public $js = [
        'https://unpkg.com/lucide@0.460.0/dist/umd/lucide.min.js',   // ícones
        'js/app.js',                                                 // tema, menus, dropdowns, modais
    ];

    public $depends = [
        YiiAsset::class,
        BootstrapAsset::class,
    ];
}