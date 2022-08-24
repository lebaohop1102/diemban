<?php namespace Thaiminh\Diemban\Models;

use Model;
use Illuminate\Support\Facades\Validator;

class Settings extends Model
{
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
    ];
}