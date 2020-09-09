<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
//use App\Traits\TapActivity;

class Permission extends Model
{
//    use TapActivity;

    /**
     * @var bool
     */
    protected static $logFillable = true;

    /**
     * @param string $eventName
     * @return string
     */
    public function getDescriptionForEvent(string $eventName): string
    {
        $item = $this->attributesToArray();

        return $item['name'] . ' from ' . get_class($this) . ' has been ' . $eventName . '.';
    }
}
