<?php

namespace App\View\Components\Reclamation;

use Closure;
use Carbon\Carbon;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class cardPost extends Component
{
    private $data;
    private $user;
    /**
     * Create a new component instance.
     */
    public function __construct( $data , $user)
    {
        $this->data = $data ;
        $this->user = $user ;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        return view('components.reclamation.card-post' ,['data' => $this->data , "user"=> $this->user]);
    }


    
}
