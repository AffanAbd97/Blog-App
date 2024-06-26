<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageHeader extends Component
{
   /**
     * The alert type.
     *
     * @var string
     */
    public $title;
 
 
    /**
     * Create the component instance.
     *
     * @param  string  $title
    
     * @return void
     */
    public function __construct($title)
    {
        $this->title = $title;
      
    }
 

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.page-header');
    }
}
