<?php


namespace Modules\Translations\Vilt\Resources\TranslationsResource\Actions;

use Modules\Base\Services\Components\Actions;

class ScanAction extends Actions
{
    public function setup(): void
    {
        $this->name("Scan");
        $this->label(__('Scan'));
        $this->type("success");
        $this->icon('bx bx-search-alt');
        $this->action('language_lines.scan');
        $this->can(true);
    }
}

