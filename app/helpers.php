<?php

if (!function_exists('merge_array_to_assoc_array')) {
    function merge_array_to_assoc_array($assocArray, $array, $expectedValue = null, $defaultValue = null)
    {
        $result = [];

        foreach ($array as $item) {
            if (in_array($item, array_keys($assocArray))) {
                $result[$item] = is_null($expectedValue) ? true : $expectedValue;
            } else {
                $result[$item] = is_null($defaultValue) ? false : $defaultValue;
            }
        }

        return $result;
    }
}

if (!function_exists('getYoutubeId')) {
    function getYoutubeId($url)
    {
        // if (strlen($url) > 11) {
        //     if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
        //         return $match[1];
        //     } else {
        //         return false;
        //     }
		// }
		preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
		$id = $matches[1];

        return $id;
    }
}

if (!function_exists('subdomainRoute')){
    function subdomainRoute($name, $params = [])
    {
        if (! isset($params['subdomain'])){
            $params['subdomain'] = env('APP_SUBDOMAIN');
        }
        return route($name, $params);
    }
}
