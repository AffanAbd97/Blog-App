<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Request;

class Sidebar extends Component
{
    /**
     * The sidebar menu items.
     *
     * @var array
     */
    public $menuItems;
    public $session;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->menuItems = [
            [
                'url' => route('index.blog'),
                'label' => 'Post',

                'routeName' => 'index.blog',

            ],
            [
                'url' => route('index.akun'),
                'label' => 'Akun',

                'routeName' => 'index.akun'
            ],

            // Add more menu items as needed
        ];
        $this->session = session()->get('user');
        $isAdmin = $this->session && session()->get('user')->role == 'Admin';
        if (!$this->session) {
            unset($this->menuItems[1]); // Assuming 'Supplier' menu item is at index 1
            unset($this->menuItems[0]); // Assuming 'Supplier' menu item is at index 1
        }
        // If the user is not an admin, remove the menu item
        if (!$isAdmin) {
            unset($this->menuItems[1]); // Assuming 'Supplier' menu item is at index 1
        }
    }

    /**
     * Check if a URL is active.
     *
     * @param string $url
     * @return bool
     */
    public function isActive($routeName)
    {
        return Route::currentRouteName() === $routeName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sidebar');
    }
}
