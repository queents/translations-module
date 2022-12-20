<?php

namespace Modules\Translations\Vilt\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Modules\Base\Services\Components\Base\Alert;
use Modules\Base\Services\Resource\Resource;
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

    public function __construct()
    {
        $this->table = "translations";
        $this->view = "Resource";
    }

    public function rows(): array
    {
        $this->canCreate = false;
        $this->canDelete = false;
        $this->canDeleteAny = false;

        $jsonFolder = File::files(lang_path());
        $counter = 0;
        $langRows = [];
        foreach($jsonFolder as $getLangName){
            $langName = str_replace('.json', '', $getLangName->getFilename());
            $langRows[] = Text::make($langName);
        }

        return array_merge([
            Text::make('id')
                ->label(__('ID'))
                ->edit(false)
                ->create(false),

            Text::make('key')
                ->label(__('Key'))
                ->searchable(),
        ], $langRows);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
           "key" => "required|string"
        ]);

        $jsonFolder = File::files(lang_path());
        foreach($jsonFolder as $getLangName){
            $fileContent = json_decode(File::get(lang_path($getLangName->getFilename())));
            $fileContent->{$request->get('key')} = $request->get(str_replace('.json', '', $getLangName->getFilename()));
            File::put(lang_path($getLangName->getFilename()), json_encode($fileContent, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));
        }

        return Alert::make(__('Translation Updated Success'))->fire();
    }
}
