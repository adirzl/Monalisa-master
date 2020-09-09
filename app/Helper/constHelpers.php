<?php
/**
 * Created by PhpStorm.
 * User: TantanSuryana
 * Date: 2/16/2020
 * Time: 5:02 PM
 */

if (!function_exists('getArrayConst')) {
    /**
     * @param \Illuminate\Database\Eloquent\Collection|array $collections
     * @param string $key
     * @param string $value
     * @param bool $blank_option
     * @return array
     */
    function getArrayConst($key = null)
    {
        $listConst = [
            'opt.YesNo' => [
                '0' => __('label.no'),
                '1' => __('label.yes')
            ]
        ];
        return $key ? $listConst[$key] : null;
    }
}