<?php

namespace App\Filament\Resources\ExperienceLevelResource\Pages;

use App\Filament\Resources\ExperienceLevelResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExperienceLevels extends ListRecords
{
    protected static string $resource = ExperienceLevelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
