<?php namespace Thaiminh\Diemban;

use Backend;
use System\Classes\PluginBase;
use Illuminate\Foundation\AliasLoader;

/**
 * diemban Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'diemban',
            'description' => '1 san pham cua Thai Minh Group',
            'author'      => 'thaiminh',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return void
     */
    public function boot()
    {
        $alias = AliasLoader::getInstance();
        $alias->alias('Inspiring', 'Illuminate\Foundation\Inspiring');
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {

        return [
            'Thaiminh\Diemban\Components\DiemBan' => 'diemBan',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'thaiminh.diemban.some_permission' => [
                'tab' => 'diemban',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'diemban' => [
                'label'       => 'diemban',
                'url'         => Backend::url('thaiminh/diemban/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['thaiminh.diemban.*'],
                'order'       => 500,
            ],
        ];
    }

    public function registerSettings()
    {
        return [
            'config' => [
                'label'       => 'ThaiMinh DiemBan',
                'icon'        => 'icon-leaf',
                'description' => 'thaiminh.diemban::lang.strings.settings_desc',
                'class'       => 'Thaiminh\Diemban\Models\Settings',
                'permissions' => ['rainlab.googleanalytics.access_settings'],
                'order'       => 600
            ]
        ];
    }

}
