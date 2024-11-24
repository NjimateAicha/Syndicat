<?php

namespace App\View\Components\Document;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class formAjouterDocument extends Component
{
    public $residence;
    /**
     * Create a new component instance.
     */
    public function __construct(String $residence)
    {
        $this->residence = $residence;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.document.form-ajouter-document');
    }
}
