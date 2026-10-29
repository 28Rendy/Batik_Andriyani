<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $table = 'site_settings';
    protected $primaryKey = 'key';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['key', 'value', 'type', 'label'];

    /**
     * Ambil nilai setting berdasarkan key.
     *
     * @param string $key
     * @param string $default
     * @return string
     */
    public static function getSetting($key, $default = '')
    {
        $setting = static::find($key);
        return $setting ? $setting->value : $default;
    }

    /**
     * Set atau update nilai setting.
     *
     * @param string $key
     * @param string $value
     * @return void
     */
    public static function setSetting($key, $value)
    {
        static::updateOrCreate(['key' => $key], ['value' => $value]);
    }
}

