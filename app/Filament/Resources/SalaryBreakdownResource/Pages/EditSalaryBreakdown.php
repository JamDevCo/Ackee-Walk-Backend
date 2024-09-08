<?php

namespace App\Filament\Resources\SalaryBreakdownResource\Pages;

use App\Filament\Resources\SalaryBreakdownResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSalaryBreakdown extends EditRecord
{
    protected static string $resource = SalaryBreakdownResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
