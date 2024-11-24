<?php

namespace App\View\Components\Document;

use Closure;
use App\Models\Document;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class cardPdf extends Component
{
    public $document , $id;
    /**
     * Create a new component instance.
     */
    public function __construct(Document $document , String $id)
    {
        $this->document = $document;
        $this->id = $id;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.document.card-pdf');
    }
}
