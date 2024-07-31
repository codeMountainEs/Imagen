<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Component;
use Filament\Pages\Auth\Register as BaseRegister;

class Register extends BaseRegister
{
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getNameFormComponent(),
                        $this->getEmailFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                        $this->getRoleFormComponent(),
                    ])
                ->statePath('data'),
            ),
        ];
    }

    protected function getRoleFormComponent(): Component
    {
        return Select::make('role')
            ->options([
                'Administrador' => 'Administrador',
                'Usuario' => 'Usuario',
            ])
            ->default('Usuario')
            ->required();
    }
}
