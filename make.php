#!/usr/bin/php
<?php

// TODO: move this to `buildpro`

exit((int) main($argc, $argv));

/**
 * @param integer $argc
 * @param array $argv
 * @return integer
 */
function main($argc, array $argv) {
    $rules = array();
    $target = '';

    foreach (file('Makefile') as $line) {
        $line = trim($line);
        if (preg_match('/^(.*)=(.*)$/', $line, $matches)) {
            $vars[$matches[1]] = $matches[2];
        } elseif (preg_match('/(.*):$/', $line, $matches)) {
            $target = $matches[1];
        } elseif ($target && $line) {
            if (substr($line, 0, 1) != '#') {
                $line = replace_vars($line, $vars);
                $line = preg_replace('/\$\((.*)\)/', '\${$1}', $line);
                $rules[$target][] = $line;
            }
        }
    }

    if ($argc >= 2) {
        $selected_target = $argv[1];

        foreach ($rules[$selected_target] as $cmd) {
            echo shell_exec($cmd);
        }

    } else {
        echo "Options:\n";
        foreach (array_keys($rules) as $target) {
            echo "    | $target:\n";
        }
    }
    return 0;
}

/**
 * @param string $subject
 * @param array $vars
 * @return string
 */
function replace_vars($subject, array $vars) {
    $keys = array();
    $values = array();
    foreach ($vars as $key => $value) {
        $keys[] = '$('.$key.')';
        $values[] = $value;
    }
    return str_replace($keys, $values, $subject);
}
