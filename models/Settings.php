<?php namespace Thaiminh\Diemban\Models;

use Model;
use October\Rain\Database\Traits\Validation;

class Settings extends Model
{
    use Validation;

    public $implement = ['System.Behaviors.SettingsModel'];

    public $settingsCode = 'thaiminh_diemban_settings';

    public $settingsFields = 'fields.yaml';

    /**
     * Validation rules
     */
    public $rules = [
        'api_key'   => 'required',
        'products_code'   => 'required',
        'company'   => 'required',
        'product_setting.*.product_name'   => 'required',
        'product_setting.*.product_code'   => 'required',
        'product_setting.*.product_color'   => 'required',
    ];
}