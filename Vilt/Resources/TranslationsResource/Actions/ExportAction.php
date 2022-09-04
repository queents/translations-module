<?php


namespace Modules\Translations\Vilt\Resources\TranslationsResource\Actions;

use Modules\Base\Services\Components\Actions;

class ExportAction extends Actions
{
    public function setup(): void
    {
        $this->name("export");
        $this->label(__('Export'));
        $this->type("success");
        $this->icon('bx bxs-spreadsheet');
        $this->url(url('admin/language-lines/export'));
        $this->can(true);
    }
}

