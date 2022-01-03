<?php

/*
|--------------------------------------------------------------------------
| Detect Active Route
|--------------------------------------------------------------------------
|
| Compare given route with current route and return output if they match.
| Very useful for navigation, marking if the link is active.
|
*/
global $is_google_lighthouse;
function is_google_lighthouse() {
    global $is_google_lighthouse;
    if (!isset($is_google_lighthouse)) {
        $is_google_lighthouse = mb_strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome-Lighthouse') !== FALSE;
    }
    return $is_google_lighthouse;
}
function isActiveRoute($route, $output = "active")
{
    if (Route::currentRouteName() == $route) return $output;
}

function navigation($section = 'default', $options = [])
{
    $items = config('navigation')[$section];
    $output = '<ul class="'.$options['class'].'">';
    $currentRoute = Route::currentRouteName();

    foreach($items as $item)
    {
        if (!Auth::user()->hasAccess($item['route'])) {
            continue;
        }

        $output .= '<li class="'.($item['route'] == $currentRoute ? 'active' : '').'"><a href="'. route($item['route']) .'">'.$item['title'].'</a></li>';
    }

    $output .= '</ul>';
    return $output;
}

function get_current_region($user_region = null)
{
    $region = null;
    if (!$user_region) {
        if (\Session::has('user_region')) {
            $user_region = \Session::get('user_region');
        }
    }
    if ($user_region) {
        $region = \App\Models\Region::where('name', 'ilike', '%'.$user_region.'%')->first();
    }
    return $region;
}
