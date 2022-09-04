<?php

namespace Modules\Translations\Vilt\Resources\TranslationsResource;

use Modules\Base\Services\Components\Base\Component;
use Modules\Translations\Vilt\Resources\TranslationsResource\Actions\ExportAction;
use Modules\Translations\Vilt\Resources\TranslationsResource\Actions\ImportAction;
use Modules\Translations\Vilt\Resources\TranslationsResource\Actions\ScanAction;
use Modules\Translations\Vilt\Resources\TranslationsResource\Actions\TranslateAction;
use Modules\Translations\Vilt\Resources\TranslationsResource\Modals\ImportModal;
use Modules\Translations\Vilt\Resources\TranslationsResource\Routes\ScanRoute;
use Modules\Translations\Vilt\Resources\TranslationsResource\Routes\TranslateRoute;

trait Components
{
    public function components():array
    {
        return [
            Component::make(ScanAction::class)->action(),
            Component::make(TranslateAction::class)->action(),
            Component::make(ImportAction::class)->action(),
            Component::make(ExportAction::class)->action(),
            Component::make(ImportModal::class)->modal(),
            Component::make(ScanRoute::class)->route(),
            Component::make(TranslateRoute::class)->route(),
        ];
    }
}
