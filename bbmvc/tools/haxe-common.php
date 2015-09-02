<?php

/**
 * Transforms a dot-style fully specified class name into a file path suitable
 * to be used by the Haxe runtime for PHP target.
 * 
 * @param string $class_name
 * @param boolean $impl whether to use Haxe _Impl_ type class
 * @return array ('full_name' => 'string', 'relpath' => 'string')
 * @internal
 */
function haxe_class_to_relpath($class_name, $impl = true) {
    $init_name  = str_replace('.', '_', $class_name);
    $parts      = explode('.', $class_name);
    $short_name = array_pop($parts);
    $path       = implode('/', $parts);

    if ($impl) {
        $full_name  = implode('_', $parts) . '__' . $short_name . '_' . $short_name . '_Impl_';
        $relpath = $path . '/_' . $short_name . '/' . $short_name . '_Impl_.class.php';
    } else {
        $full_name = implode('_', $parts) . '_' . $short_name;
        $relpath = $path . '/' . $short_name . '.class.php';
    }

    return compact('full_name', 'relpath');
}
