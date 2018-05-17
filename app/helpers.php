<?php

if (!function_exists('merge_array_to_assoc_array')) {
    function merge_array_to_assoc_array($assocArray, $array, $expectedValue = null, $defaultValue = null)
    {
        $result = [];

        foreach ($array as $item) {
            if (in_array($item, array_keys($assocArray))) {
				$result[$item] = is_null($expectedValue) ? true : $expectedValue;
			}
			else {
				$result[$item] = is_null($defaultValue) ? false : $defaultValue;
			}
        }

        return $result;
    }
}
