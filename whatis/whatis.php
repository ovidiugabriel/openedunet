<?php

define ('MEMCACHED_HOST', '127.0.0.1');
define ('MEMCACHED_PORT', 11211);


if (!isset($argv[1])) {
    echo `whatis`;
    die;
}

// Test that memcache is able to store values ...
$memcache = Cache()->memcache();
$memcache->set('X', 1);
assert(1 == $memcache->get('X'));

$memcache->setOption(Memcached::OPT_SERIALIZER, Memcached::SERIALIZER_JSON);
$memcache->setOption(Memcached::OPT_HASH, Memcached::HASH_MD5);
$memcache->setOption(Memcached::OPT_BINARY_PROTOCOL, true);

switch ($argv[1]) {
    case '-index':
    {
        // Build and save index.
        echo "Building index (forced) ... \n";
        $symbols = build_index();
        save_index($symbols);
        cache_symbols($symbols);

        exit(0);
    }
    break;

    case '-reload':
    {        
        $file = $HOME . '/cpp_symbols_index.php';
        if (file_exists($file)) {
            echo "Loading index from disk ... \n";
            $symbols = require_once $file;    
            assert(is_array($symbols));
            cache_symbols($symbols);
        }
        exit(0);
    }
    break;

    default:
        # code...
        break;
}

if (false === $memcache->get('WHATIS_INDEX_EXISTS')) {
    echo "Index not found in memory ... \n";
    // Load index from disk
    $file = $HOME . '/cpp_symbols_index.php';

    if (!file_exists($file)) {
        echo "Building index ... \n";
        $symbols = build_index();
        save_index($symbols);
    } else {
        echo "Loading index from disk ... \n";
        $symbols = require_once $file;    
        assert(is_array($symbols));
    }
    
    cache_symbols($symbols);
}

$query  = trim($argv[1]);
$result = find_symbol($memcache, $query);

var_dump($result);

echo Console::RED . $query . Console::RESET . " is " . Console::RED . $result[0] . Console::RESET ;
echo  " in file " . Console::BOLD . basename($result[1]) . Console::RESET . "\n";
echo ' - ' . Console::MAGENTA  . $result[1] . Console::RESET . "\n";
die;
