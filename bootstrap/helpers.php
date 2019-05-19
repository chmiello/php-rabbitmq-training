<?php
/**
 * Created by PhpStorm.
 * User: chmiello
 * Date: 19.05.19
 * Time: 22:07
 */

if (!function_exists('config')) {
    /**
     * @param $name
     *
     * @return bool|mixed
     */
    function config($name)
    {
        $nameArray = explode('.', $name);

        // first element - file name

        if (file_exists(HOME . 'config/' . $nameArray[0] . PHP_EXT)) {

            $fileConfig = require_once HOME . 'config/' . $nameArray[0] . PHP_EXT;

            $nameArray = array_slice($nameArray, 1);
            $configItem = false;
            foreach ($nameArray as $item) {
                if (isset($fileConfig[$item])) {
                    $configItem = $fileConfig[$item];
                } else {
                    $configItem = false;
                }
            }

            return $configItem;
        }

        return false;
    }
}