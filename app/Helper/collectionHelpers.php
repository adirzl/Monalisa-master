<?php
/**
 * Created by PhpStorm.
 * User: TantanSuryana
 * Date: 1/29/2020
 * Time: 6:07 AM
 */

if (!function_exists('to_dropdown')) {
    /**
     * @param \Illuminate\Database\Eloquent\Collection|array $collections
     * @param string $key
     * @param string $value
     * @param bool $blank_option
     * @return array
     */
    function to_dropdown($collections, string $key = 'id', string $value = 'name', bool $blank_option = true)
    {
        if ($blank_option)
            $options[''] = trans('label.choose_one');

        if (!is_array($collections)) {
            foreach ($collections as $collection)
                $options[$collection->$key] = $collection->$value;
        } else {
            foreach ($collections as $key => $value)
                $options[$key] = $value;
        }

        return $options;
    }
}

if(!function_exists('getOptionGroup')){
    /**
     * @param string $optGroupName
     */
    function getOptionGroup($optGroupName){
        $optGroup = \App\Models\Optgroup::where('name', $optGroupName)->first();
        $result = \App\Models\Optvalue::where('opt_group_id', $optGroup->id)->get();
        return $result;
    }
}
