<?php namespace SIKessEm;

class DotIni implements StringParsable
{
    public function parseFile(string $file, ?int $options = null, bool $grouped = false)
    {
        if(!is_file($file))
            throw new \InvalidArgumentException('No such file "' . $file . '"', Exception::NO_SUCH_FILE);

        $options ??= INI_SCANNER_TYPED;
        if($options ^ INI_SCANNER_TYPED)
            $options |= INI_SCANNER_TYPED;

        if(!function_exists('parse_ini_file'))
            return self::parse(@file_get_contents($file), $options, $grouped);

        return parse_ini_file($file, $grouped, $options);
    }

    public function parse(string $source, ?int $options = null, bool $grouped = false)
    {
        $options ??= INI_SCANNER_TYPED;
        if($options ^ INI_SCANNER_TYPED)
            $options |= INI_SCANNER_TYPED;

            return parse_ini_string($source, $grouped, $options);
    }
}