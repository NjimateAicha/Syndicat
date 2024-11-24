<?php

namespace App\View\Components\Reclamation;

use Closure;
use App\Models\Residence;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class FormAjouteDeclaration extends Component
{
    public $postUrl;
    public $residence;
    /**
     * Create a new component instance.
     */
    public function __construct(string $postUrl , string $residence)
    {
        $this->postUrl = $postUrl;
        $this->residence = $residence;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.reclamation.form-ajoute-declaration');
    }
}
