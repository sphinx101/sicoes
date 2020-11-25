<?php

namespace App\Filter;

use Illuminate\Support\Facades\Auth;
use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;

class MenuFilterRole implements FilterInterface
{
    public function transform($item)
    {
        if (!$this->isVisible($item)) {
            return false;
        }
        if (isset($item['header'])) {
            $item = $item['header'];
        }

        return $item;
    }

    protected function isVisible($item_menu)
    {
        if (isset($item_menu['role'])) {
            if (Auth::user()->hasRole($item_menu['role'])) {
                return true;
            }
            return false;
        }
    }
}
