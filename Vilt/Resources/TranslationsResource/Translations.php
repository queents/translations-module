<?php

namespace Modules\Translations\Vilt\Resources\TranslationsResource;

trait Translations
{
    public function loadTranslations(): array
    {
        return [
            "index" => __("Translations"),
            "create" => __('Create Translations'),
            "bulk" => __('Delete Selected Translation'),
            "edit_title" => __('Edit Translation'),
            "create_title" => __('Create New Translation'),
            "view_title" => __('View Translation'),
            "delete_title" => __('Delete Translation'),
            "bulk_title" => __('Run Bulk Action To Translation'),
        ];
    }
}
