<?php


namespace Modules\Translations\Vilt\Resources\TranslationsResource\Actions;

use Modules\Base\Services\Components\Actions;

class ImportAction extends Actions
{
    public function setup(): void
    {
        $this->name("import");
        $this->label(__('Import'));
        $this->type("success");
        $this->icon('bx bx-cloud-upload');
        $this->modal('import');
        $this->can(true);
    }
}

