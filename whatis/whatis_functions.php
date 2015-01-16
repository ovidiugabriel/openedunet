<?php

function store_symbol(Memcached $memcache, $key, $value) {
    // Store alias ...
    
    $value[0] = trim($value[0]);    
    if (!$memcache->set($k = 'whatis_alias_' . $key, $value[0])) {
        throw new Exception("memcache.set:(whatis_alias_{$key})" . ' Error: '. $this->memcache->getResultMessage(), 1);
    }

    $v = $memcache->get('whatis_alias_' . $key);
    
    if ($value[0] != $v)  {
        throw new Exception("Key $key=$value[0] ($v) not stored in cache.", 1);
    }

    // Store filepath

    // $value[1] = trim($value[1]);
    $value[1] = '#';
    if (!$memcache->set($k = 'whatis_file_' . $key, $value[1])) {
        throw new Exception("memcache.set:(whatis_file_{$key})" . ' Error: '. $this->memcache->getResultMessage(), 1);       
    }


    $v = $memcache->get('whatis_file_' . $key);

    if ($value[1] != $v) {
        throw new Exception("Key $key=$value[1] ($v) not stored in cache.", 1);
    }
}

function find_symbol(Memcached $memcache, $query) {
    $alias = $memcache->get('whatis_alias_' . $query);
    $file  = $memcache->get('whatis_file_' . $query);
    if (false === $file) {
        throw new Exception("Error Processing Request: " . $memcache->getResultMessage(), 1);
        
    }
    
    return array($alias, $file);
}

/** 
 * Store all symbols into the cache.
 * 
 * @param array $symbols
 * @throws Exception    - in case that a key could not be set
 *                      - in case that a wrong value has been stored into the cache
 */
function cache_symbols(array $symbols) {
    $memcache = Cache()->memcache();
    foreach ($symbols as $key => $value) {
        store_symbol($memcache, $key, $value);       
        echo "$key => $value[0] '$value[1]' \n";
    }

    $memcache->set('WHATIS_INDEX_EXISTS', true);
}

function save_index($symbols) {   
    global $HOME; 
    if (count($symbols) > 0) {
        file_put_contents( $HOME . "/cpp_symbols_index.php", '<?php return ' . var_export($symbols, true) . ';');
    }
}

function build_index() {
    global $HOME;

    $symbols = array();
    $files = explode("\n", shell_exec("find $HOME/ | grep \"\.h\""));
    $files[] = "/usr/include/stdint.h";
    $files[] = "/usr/include/pthread.h";

    foreach ($files as $file) {
        if ('' != trim($file)) {
            parse_header($file, $symbols);
        }
    }
    return $symbols;
}

function parse_header($file, &$symbols) {
    $lines = file($file);
    if (!$lines) return;

    foreach ($lines as $line) {
        $line = trim($line);
        if (''==$line) continue;

        if (preg_match('/#\s*define\s+('.Rules::IDENTIFIER.')\s+([^<\/]+)\/\*/', $line, $matches)) {
            $symbols[$matches[1]] = array('define '. $matches[2], $file);
            
        } elseif (preg_match('/#\s*define\s+(' . Rules::IDENTIFIER . ')\s+([^<]+)/', $line, $matches)) {
            $symbols[$matches[1]] = array('define ' . $matches[2], $file);

        } elseif (preg_match('/typedef\s*([^;]+);/', $line, $matches)) {
            $typedef = preg_split('/\s/', trim($matches[1]));

            $alias = array_pop($typedef);
            $symbols[$alias] = array(' typedef ' . implode(' ', $typedef), $file);

        }
    }
}
