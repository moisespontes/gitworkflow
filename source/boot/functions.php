<?php

/**
 * Cria a slug
 *
 * @param string $string
 * @return string
 */
function str_clear(string $string): string
{
    $string = trim(strip_tags(mb_strtolower($string)));
    $charact = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª ';
    $replace = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr----------------------------------';

    $slug = strtr(utf8_decode($string), utf8_decode($charact), $replace);
    return str_replace(["-----", "----", "---", "--"], "-", $slug);
}

/**
 * @param string $string
 * @return string
 */
function str_slug(string $string, bool $camel = false): string
{
    $slug = str_replace(' ', '', ucwords(implode(' ', explode('-', str_clear($string)))));
    return ($camel) ? lcfirst($slug) : $slug;
}

/*##### URLs #####*/

/**
 * @param string|null $path
 * @return string
 */
function url(string $path = null): string
{
    return URL . "/" . ($path[0] === "/" ? mb_substr($path, 1) : $path);
}
