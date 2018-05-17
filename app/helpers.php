<?php

if (!function_exists('merge_array_to_assoc_array')) {
    function merge_array_to_assoc_array($assocArray, $array, $defaultValue = null)
    {
        $result = [];

        foreach ($array as $item) {
            if (in_array($item, array_keys($assocArray))) {
                $result[$item] = true;
            } else {
                $result[$item] = $defaultValue;
            }
        }

        return $result;
    }
}
