<?php

use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

function getDatatable($items, $relations = [])
{
    $pagination = request('pagination');
    $query = request('query');

    $search = @$query['generalSearch'];

    $sort = request('sort');


    if ($pagination['perpage'] == -1 || $pagination['perpage'] == null) {
        $pagination['perpage'] = 10;
    }

    $items = $items->with($relations);

    if ($search != null) {
        $items->filter($search);
    }

    if ($sort && count($sort)) {
        $items->orderBy($sort['field'], $sort['sort']);
    } else {
        $items->orderByDesc('created_at');
    }

    $itemsCount = $items->count();
    $items = $items->take($pagination['perpage'])->skip($pagination['perpage'] * ($pagination['page'] - 1))->get();
    $pagination['total'] = $itemsCount;
    $pagination['pages'] = ceil($itemsCount / $pagination['perpage']);

    $data['meta'] = $pagination;
    $data['data'] = $items;
    return $data;
}


function showLanguagesTabs()
{
    return count(locales()) > 1;
}

function strLimit($str, $limit)
{
    return Str::limit($str, $limit, '...');
}

function locales()
{
    $arr = [];
    foreach (LaravelLocalization::getSupportedLocales() as $key => $value) {
        $arr[$key] = __('common.' . $value['name']);
    }
    return $arr;
}

function roles()
{
    return Role::all();
}

function replace_space_str($str)
{
    return str_replace(' ', '-', $str);
}


function getSetting($key)
{
    return \App\Setting::getSetting($key)->value;
}

function getVedioData($url)
{
    $data = [];
    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
        $data['embeded_id'] = $match[1];
        $data['provider'] = 'youtube';
    }
//    else if (preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im', $url, $match)) {
//        $data['embeded_id'] = $match[3];
//        $data['provider'] = 'vimeo';
//    }

    return $data;
}

?>
