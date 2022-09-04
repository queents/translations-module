<?php


namespace Modules\Translations\Vilt\Resources\TranslationsResource\Actions;

use Modules\Base\Services\Components\Actions;

class TranslateAction extends Actions
{
    public function setup(): void
    {
        $this->name("translate");
        $this->label(__('Translate'));
        $this->type("success");
        $this->icon('bx bxs-cloud');
        $this->action('language_lines.translate');
        $this->can(true);
    }
}

