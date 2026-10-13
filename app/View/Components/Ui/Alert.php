<?php

namespace App\View\Components\Ui;

use Illuminate\View\Component;
use Illuminate\View\View;

class Alert extends Component
{
    public function __construct(
        public string $type = 'success'
    ) {}

    public function render(): View
    {
        return view('components.ui.alert');
    }
}