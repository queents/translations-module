<?php

namespace Modules\Translations\Entities;

use Modules\Translations\Services\SaveScan;
use Sushi\Sushi;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    use Sushi;

    protected ?array $rows = [];

    public function getRows()
    {
        return (new SaveScan())->getKeys();
    }

    protected function sushiShouldCache()
    {
        return false;
    }
}
