<?php


namespace Modules\Translations\Vilt\Resources\TranslationsResource\Routes;
use Modules\Translationsjson\Vilt\Resources\TranslationsResource;

use Modules\Base\Services\Components\Routes;

class TranslateRoute extends Routes
{
    public function setup(): void
    {
         $this->name('translate');
         $this->type('post');
         $this->method('translate');
         $this->controller(TranslationsResource::class);
         $this->path('translate');
    }
}

