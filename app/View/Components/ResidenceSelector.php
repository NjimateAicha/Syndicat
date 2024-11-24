<?php
namespace App\View\Components;

use App\Models\Residence;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;
use Illuminate\View\Component;

class ResidenceSelector extends Component
{
    public $residences;
    public $selectedResidence;

    public function __construct()
    {
        // Retrieve all residences
        $this->residences = Residence::all();

        // Retrieve the selected residence ID from the session
        $selectedResidenceId = Session::get('selected_residence_id');

        // Find the selected residence
        $this->selectedResidence = $selectedResidenceId ? Residence::find($selectedResidenceId) : $this->residences->first();
    }

    /**
     * Update the selected residence in the session.
     */
    public function updateSelectedResidence($residenceId)
    {
        // Update the selected residence in the session
        Session::put('selected_residence_id', $residenceId);

        // Update the selected residence property
        $this->selectedResidence = Residence::find($residenceId);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.residence-selector');
    }
}
