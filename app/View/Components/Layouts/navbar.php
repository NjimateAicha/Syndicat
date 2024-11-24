<?php

namespace App\View\Components\Layouts;

use Closure;
use App\Models\User;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class navbar extends Component
{

    public $user, $route;
    public $residencePassed;
    /**
     * Create a new component instance.
     */
    public function __construct( $user , string $route, $residence = null)
    {
        $this->user = $user;
        $this->route = $route;
        $this->residencePassed = $residence;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.navbar');
    }
}
