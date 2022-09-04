<?php


namespace Modules\Translations\Vilt\Resources\TranslationsResource\Modals;

use Modules\Base\Services\Components\Base\Action;
use Modules\Base\Services\Components\Modals;
use Modules\Base\Services\Rows\Media;

class ImportModal extends Modals
{
    public function setup(): void
    {
        $this->name("import");
        $this->label(__('Import Translations'));
        $this->rows([
            Media::make('excel')->label(__('Excel File'))
        ]);
        $this->buttons([
            Action::make('upload')->label(__('Upload'))->action('language_lines.import')
        ]);
    }
}

