<?php


namespace Modules\Translations\Vilt\Resources\TranslationsResource\Routes;
use Modules\Translations\Vilt\Resources\TranslationsResource;

use Modules\Base\Services\Components\Routes;

class ScanRoute extends Routes
{
    public function setup(): void
    {
         $this->name('scan');
         $this->type('post');
         $this->method('scan');
         $this->controller(TranslationsResource::class);
         $this->path('scan');
    }
}

