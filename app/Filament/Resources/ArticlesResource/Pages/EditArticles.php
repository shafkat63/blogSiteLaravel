<?php

namespace App\Filament\Resources\ArticlesResource\Pages;

use App\Filament\Resources\ArticlesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditArticles extends EditRecord
{
    protected static string $resource = ArticlesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
