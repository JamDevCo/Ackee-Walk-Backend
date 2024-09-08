<?php

namespace App\Filament\Resources\SalaryBreakdownResource\Pages;

use App\Filament\Resources\SalaryBreakdownResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSalaryBreakdowns extends ListRecords
{
    protected static string $resource = SalaryBreakdownResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
