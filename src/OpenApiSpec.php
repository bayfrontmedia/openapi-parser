<?php /** @noinspection PhpUnused */

namespace Bayfront\OpenApi;

use Bayfront\ArrayHelpers\Arr;

class OpenApiSpec
{

    /**
     * Parse JSON to an array.
     *
     * @param string $json
     * @return array
     */
    public static function parseJson(string $json): array
    {
        return json_decode($json, true);
    }

    /**
     * Parse YAML to an array.
     *
     * @param string $yaml
     * @return array
     */
    public static function parseYaml(string $yaml): array
    {
        return yaml_parse($yaml);
    }

    /**
     * Resolve OpenAPI references.
     *
     * @param array $array
     * @return array
     */
    public static function resolve(array $array): array
    {

        $dot = Arr::dot($array);

        foreach ($dot as $k => $v) {

            if (str_ends_with($k, '.$ref') && is_string($v) && str_starts_with($v, '#/')) {

                $key = str_replace('.$ref', '', $k);
                $reference = substr(str_replace('/', '.', $v), 2); // Remove first two characters

                unset($dot[$k]); // Remove reference
                $resolved = Arr::get($array, $reference); // Resolve from original array

                if (is_array($resolved)) { // Resolved value may have other references
                    $resolved = self::resolve($resolved);
                }

                $dot[$key] = $resolved; // Set resolved value

            }

        }

        return Arr::undot($dot);

    }

}