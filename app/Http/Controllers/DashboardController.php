<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\BuildsDashboardMenu;

class DashboardController extends Controller
{
    use BuildsDashboardMenu;

    public function index(string $page = 'dashboard')
    {
        $screens = $this->screens();

        $active = $screens->firstWhere('key', $page) ? $page : 'dashboard';

        return view('dashboard.index', [
            'screens' => $screens,
            'active' => $active,
        ]);
    }

    public function profile()
    {
        return $this->placeholder('View Profile');
    }

    public function settings()
    {
        return $this->placeholder('Settings');
    }

    public function login()
    {
        return view('dashboard.login');
    }

    protected function placeholder(string $label)
    {
        return view('dashboard.coming-soon', [
            'screens' => $this->screens(),
            'active' => null,
            'label' => $label,
        ]);
    }
}
