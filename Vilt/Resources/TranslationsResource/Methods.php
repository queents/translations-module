<?php

namespace Modules\Translations\Vilt\Resources\TranslationsResource;

use Google\Cloud\Translate\V2\TranslateClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Base\Services\Components\Base\Alert;
use Modules\Base\Services\Rows\Text;
use Modules\Translations\Entities\Translation;
use Modules\Translations\Exports\TranslationsExport;
use Modules\Translations\Imports\TranslationsImport;
use Modules\Translations\Services\SaveScan;

trait Methods
{
    public function export(Request $request)
    {
        return Excel::download(new TranslationsExport, 'translations.xlsx');
    }

    public function import(Request $request)
    {
        $rules = [
            "excel" => "required",
        ];
        $validator = Validator::make($request->all(), $rules);
        $validator->validate();

        if (!$validator->fails()) {
            Excel::import(new TranslationsImport, $request->file('excel')[0]);

            return Alert::make(__('Import Success'))->fire();
        }
    }
    public function translate()
    {
        $data = Translation::all();

        $getLocals = config('translations.locals');

        $translate = new TranslateClient([
            'key' => config('translations.google_key')
        ]);

        foreach ($data as $item) {
            $key = $item->key;
            $translation = Translation::where('key', $key)->first();

            try {
                if ($translation) {
                    $empty = false;
                    foreach ($translation->text as $transText) {
                        if (empty($transText)) {
                            $empty = true;
                        }
                    }
                    if ($empty) {
                        $text = [];
                        foreach ($getLocals as $lang => $value) {
                            $trans = $translate->translate($key, [
                                'target' => $lang
                            ]);
                            if (is_array($trans)) {
                                $text[$lang] = $trans['text'];
                            } else {
                                $text[$lang] = $key;
                            }
                        }
                        $translation->text = $text;
                        $translation->save();
                    }
                }
            } catch (\Exception $e) {
            }
        }

        return Alert::make(__('All Languages Has Been Translate Success'))->fire();
    }
    public function scan()
    {
        $scan = new SaveScan();
        $scan->save();

        return Alert::make(__('Your Languages Has Been Scan Success'))->fire();
    }
    public function change(Request $request)
    {
        $rules = [
            "language" => "required|array",
        ];
        $validator = Validator::make($request->all(), $rules);
        $validator->validate();

        if (!$validator->fails()) {
            Cookie::queue('lang',  $request->get('language')['id']);
            return Alert::make(__('Language has been change'))->fire();
        }
    }

    public function getLocals(): array
    {
        $getLocals = config('translations.locals');
        $loadLocals = [];
        foreach ($getLocals as $key => $value) {
            $loadLocals[] = Text::make($key)->label($value);
        }

        return $loadLocals;
    }
}