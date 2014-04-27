<?php

Form::macro('css', function($file){
    $href = Config::get('assets.css.'.$file);

    if (! $href)
        throw new Exception("Asset $file not found");

    return '<link href="'.$href.'" type="text/css" rel="stylesheet" />';
});

Form::macro('js', function($file){
    $href = Config::get('assets.js.'.$file);

    if (! $href)
        throw new Exception("Asset $file not found");

    return '<script type="text/javascript" src="'.$href.'"></script>';
});