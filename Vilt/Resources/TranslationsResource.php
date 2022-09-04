<?php

namespace Modules\Translations\Vilt\Resources;

use Google\Cloud\Translate\V2\TranslateClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Base\Services\Components\Base\Action;
use Modules\Base\Services\Components\Base\AddRoute;
use Modules\Base\Services\Components\Base\Alert;
use Modules\Base\Services\Components\Base\Modal;
use Modules\Base\Services\Resource\Resource;
use Modules\Base\Services\Rows\Media;
use Modules\Base\Services\Rows\Schema;
use Modules\Base\Services\Rows\Text;
use Modules\Translations\Entities\Translation;
use Modules\Translations\Vilt\Resources\TranslationsResource\Components;
use Modules\Translations\Vilt\Resources\TranslationsResource\Methods;
use Modules\Translations\Vilt\Resources\TranslationsResource\Translations;

class TranslationsResource extends Resource
{
    use Components;
    use Translations;
    use Methods;

    public ?string $model = Translation::class;
    public string $icon = "bx bxs-quote-alt-left";
    public string $group = "Settings";

    public function rows(): array
    {
        $this->canCreate = false;

        return [
            Text::make('id')
                ->label(__('ID'))
                ->edit(false)
                ->create(false),

            Text::make('group')
                ->label(__('Group')),

            Text::make('namespace')
                ->label(__('Namespace')),

            Text::make('key')
                ->label(__('Key'))
                ->searchable(),

            Schema::make('text')
                ->label(__('Text'))
                ->sortable(false)
                ->list('false')
                ->options($this->getLocals()),
        ];
    }
}
