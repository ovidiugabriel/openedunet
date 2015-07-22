<?php

error_reporting(E_ALL|E_STRICT);
ini_set('display_errors', 1);

define ('TYPE',         0);
define ('DESCRIPTION',  1);

define ('DIR_PROJECT_BBMVC', dirname(__FILE__) . '/bbmvc-0.2.0');

//
// Adds a little description to constants we generate
//
$types_labels = array(
    "_URL_MAIN"                 => ["string", "Main URL"],
    "_FILE_MAIN"                => ["string", "Main File"],
    "_DIR_PROJECT"              => ["string", "Project Directory"],
    "_DIR_MODULES"              => ["string", "Modules Directory"],
    "_DIR_LIBRARIES"            => ["string", "Libraries Directory"],
    "_DIR_TEMPLATES"            => ["string", "Templates Directory"],
    "_DIR_LANGUAGES"            => ["string", "Languages Directory"],
    "_DIR_CACHE"                => ["string", "Cache Directory"],
    "_DEBUG"                    => ["enum:_DEBUG_OFF:_DEBUG_BROWSER:_DEBUG_LOG", "Debug option"],
    "_SMARTY_VERSION"           => ["string", "Smarty Version"],
    "_SMARTY_CACHING"           => ["boolean", "Smarty Caching"],
    "_SECURITY_ENFORCE"         => ["boolean", "Use Security Engine"],
    "_SECURITY_ENFORCE_GET"     => ["boolean","Enforce Security on GET"],
    "_SECURITY_ENFORCE_POST"    => ["boolean", "Enforce Security on POST"],
    "_SECURITY_ENFORCE_COOKIE"  => ["boolean", "Enforce Security on COOKIE"],
    "_DEFAULT_MODULE"           => ["string", "Default Module"],
    "_DEFAULT_ACTION"           => ["string", "Default Action"],
    "_LANGUAGE_DEFAULT"         => ["string", "Default Language"],
    "_DB_USER"                  => ["string", "Database User"],
    "_DB_PASS"                  => ["string", "Database Password"],
    "_DB_HOST"                  => ["string", "Database Host"],
    "_DB_NAME"                  => ["string", "Database Name"],
    "_USE_SEO_LINKS"            => ["boolean", "Use SEO Links Engine"],
);

function get_cfg_file_path() {
    $profile = file_get_contents(DIR_PROJECT_BBMVC . '/profile');
    $cfg_file = DIR_PROJECT_BBMVC . "/config/config_{$profile}.php";
    return array($profile, $cfg_file);
}

function on_files_extracted() {
    $vars = array();

    list($profile, $cfg_file) = get_cfg_file_path();
    $vars['profile'] = $profile;
    $contents = file_get_contents ($cfg_file);
    $matches = array();

    preg_match_all('/define\((.*),(.*)\)/', $contents, $matches);
    define ('_VALID_ACCESS', 1);
    require_once DIR_PROJECT_BBMVC . '/includes/constdef.php';
    require_once $cfg_file;

    $cfg = array();
    foreach ($matches[1] as $m) {
        $m = trim($m, "'\"");

        // TODO: Must use reflection to get the real value of constants
        $cfg[$m] = constant($m);
    }
    $vars["cfg"] = $cfg;
    return $vars;
}

function config_submitted() {
    global $types_labels;

    list($profile, $filepath) = get_cfg_file_path();

    $fp = fopen($filepath, 'w');

    if (!$fp) { return ; }

    fwrite($fp, "<?php \n\n");
    date_default_timezone_set('Europe/London');
    fwrite($fp, "// Saved by installer at " . date(DATE_ISO8601) . "\n\n");
    foreach ($types_labels as $k => $type) {
        $type = explode(':', $type[0]);

        fwrite($fp, '// ' . $types_labels[$k][DESCRIPTION] . "\n");

        if (isset($_POST[$k])) {
            $v  = $_POST[$k];
        } else {
            // Default values for some types
            if ($type[TYPE] == 'boolean') {
                $v = '0'; // false
            }
        }

        switch ($type[TYPE]) {
            case 'enum':
                fwrite($fp, "define('$k', $v); \n\n");
                break;

            case 'boolean':
                fwrite($fp, "define('$k', (bool) $v); \n\n");
            break;

            case 'string':
                fwrite($fp, "define('$k', '$v'); \n\n");
            break;

            default:
                # code...
            break;
        }
    }
    fclose($fp);
    return true;
}

function typed_field($name, $value) {
    global $types_labels;

    $type = explode(':', $types_labels[$name][TYPE]);

    switch (array_shift($type)) {
        case "string": return "<input name=\"{$name}\" value=\"{$value}\" style=\"width: 100%;\" size=\"".strlen($value)."\" type=\"text\" />";
        case "enum":
            $str = '<select name="'.$name.'">';
            $v = constant($name);
            foreach ($type as $t) {
                $selected =  (constant($t) == $v) ? ' selected="selected"' : '';
                $str .= '<option value="'.constant($t).'"'.$selected.'>'.$t.'</option>';
            }
            $str .= '</select>';
            return $str;
        break;

        case "boolean":
            $checked = (constant($name)) ? 'checked="checked"' : '';
            return '<input name="'. $name .'" type="checkbox" '.$checked.' value="1" />';
        default: die("Invalid type for {$name}");
    }
}

$vars = array();

//
// First extracts all files from the archive
//
if (!file_exists(DIR_PROJECT_BBMVC)) {
    $zip = new ZipArchive;
    $res = $zip->open('bbmvc-0.2.0.zip');
    if ($res === TRUE) {
        $zip->extractTo(dirname(__FILE__));
        $zip->close();
    }
}

if (!empty($_POST)) {
    if (config_submitted()) {
        echo '<div style="width: 650px; 
            border: 1px solid orange; 
            background-color: #FFFACD; 
            padding: 10px; 
            margin-bottom: 5px;">Configuration file saved.</div>';
    }
}

// Extract variables on global space
extract(on_files_extracted());

echo "<style>input[type=text] { 
    font-family: monospace; 
    font-size: 12px; 
    border: 1px solid #CCCCCC; 
    padding: 5px; 
    background: ivory; 
}

td {
    /* font-family: Arial;  */
    height: 26px;
}
</style>";
echo "<form method=\"post\"><table>
    <tr><td>Profile name:</td><td><input type=\"text\" value=\"{$profile}\" /></td></tr>
";

foreach ($cfg as $def_name => $def_value) {
    echo "<tr><td>" . $types_labels[$def_name][1]. ":</td><td>" . typed_field($def_name, $def_value) . "</td></tr>\n";
}
echo "</table>";

echo "  <div><input type=\"submit\" value=\"Save Preferences\" /></div>
</form>
";
