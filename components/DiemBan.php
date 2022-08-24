<?php namespace ThaiMinh\DiemBan\Components;

use Cms\Classes\ComponentBase;
use Thaiminh\Diemban\Models\Settings;
use Illuminate\Support\Facades\Storage;

/**
 * DiemBan Component
 */
class DiemBan extends ComponentBase
{

    public $heading;
    public $heading_deail;
    public $provinces;
    public $regions;
    public $show_district;
    public $base_url;
    public $local_region_map;

    public $location;
    public $f_province;
    public $f_district;

    public $title;
    public $desc;
    public $body;

    public function componentDetails()
    {
        return [
            'name' => 'DiemBan Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function onRun() {

        $this->page->addCss('/plugins/thaiminh/diemban/assets/css/thaiminh.diemban-style.css', 'core');

        $query_location = $this->property('location');
        $this->location = $this->get_location_by_slug($query_location);;

        $this->f_province = isset($this->location) && !empty($this->location['data']['province']) ? $this->location['data']['province'] : '';
        $this->f_district = isset($this->location) && !empty($this->location['data']['province']) && !empty($this->location['data']['district']) ? $this->location['data']['district'] : '';

        $this->show_district = [1, 79];
        $this->local_region_map = [
            1 => [
                'slug' => 'mien-bac',
                'name' => 'Miền Bắc'
            ],
            2 => [
                'slug' => 'mien-trung',
                'name' => 'Miền Trung'
            ],
            3 => [
                'slug' => 'mien-nam',
                'name' => 'Miền Nam'
            ]
        ];

        $this->heading = Settings::get('heading_page');
        $this->heading_deail = Settings::get('heading_page_detail');
        $this->base_url = config('app.url');

        $this->provinces = array_map(function ($province) {
            if(in_array($province['id'], $this->show_district)){
                $districts = array_map(function($_district) use ($province) {
                    $url = sprintf('%s/%s/%s-%d',
                        $this->base_url,
                        $this->local_region_map[$province['local_region_id']]['slug'],
                        $_district['district_slug'],
                        $_district['id']);
                    $_district['url'] = $url;
                    $_district['full_name'] = is_numeric($_district['district_name']) ? $_district['district_name_with_type'] : $_district['district_name'];
                    return $_district;
                }, $this->get_district_by_province_id($province['id']));

                //
                $_districts = [];
                foreach(array_chunk($districts, 4) as $key => $chunk){
                    foreach($chunk as $item){
                        $_districts[$key][] = $item;
                    }
                }

                $province['districts'] = $_districts;
            }
            return $province;
        }, $this->provinces());

        foreach ($this->provinces as $province) {
            $this->regions[$province['local_region_id']]['name'] = $this->local_region_map[$province['local_region_id']]['name'];
            $this->regions[$province['local_region_id']]['provinces'][$province['id']] = [
                'id' => $province['id'],
                'name' => $province['province_name'],
                'slug' => $province['province_slug']
            ];
        }

        $this->regions = array_map(function($key, $region){
            $_provinces = [];
            foreach(array_chunk($region['provinces'], 4) as $key2 => $chunk){
                foreach($chunk as $item){
                    $url = sprintf('%s/%s/%s-%d',
                        $this->base_url,
                        $this->local_region_map[$key]['slug'],
                        $item['slug'],
                        $item['id']
                    );
                    $item['url'] = $url;
                    $_provinces[$key2][] = $item;
                }
            }
            $region['provinces'] = $_provinces;
            return $region;
        }, array_keys($this->regions), $this->regions);

        if($this->f_province && !$this->f_district){
            $this->title = 'Điểm bán Khương Thảo Đan tại '.$this->f_province['province_name'];
            $this->desc = $this->heading_deail;
        }elseif($this->f_province && $this->f_district){
            $this->title = 'Điểm bán Khương Thảo Đan tại '. $this->f_district['district_name_with_type'] .' - '. $this->f_province['province_name'];
            $this->desc = $this->heading_deail;
        }else{
            $this->title = 'Điểm bán Khương Thảo Đan';
            $this->desc = $this->heading;
        }

        //
        $heading = Settings::get('heading_page_detail');
        $base_url = config('app.url');
        $f_location = $this->location;
        $f_province = $this->f_province;
        $f_district = $this->f_district;
        $show_district = $this->show_district;
        $provinces = $this->provinces;
        $regions = $this->regions;
        $local_region_map = $this->local_region_map;

        $this->body = view('thaiminh.diemban::index', compact(
            'base_url',
            'f_province',
            'f_district',
            'show_district',
            'provinces',
            'regions',
            'local_region_map'
        ))->render();
    }

    protected function provinces()
    {
        $file = plugins_path('thaiminh/diemban/assets/json/provinces.json');
        $provinces = json_decode(file_get_contents($file), true);
        return $provinces;
    }

    protected function districts(){
        $file = plugins_path('thaiminh/diemban/assets/json/districts.json');
        $districts = json_decode(file_get_contents($file), true);
        return $districts;
    }

    protected function get_location_by_slug($location){
        if(!$location){
            return;
        }
        $locationArr = explode('-', $location);
        $location_id = array_pop($locationArr);
        $slug = implode('-', $locationArr);
    
        $provinces = $this->provinces();
        $districts = $this->districts();
    
        $province = array_filter($provinces, function($province) use ($location_id, $slug) {
            return $slug == $province['province_slug'] && $location_id == $province['id'];
        }, ARRAY_FILTER_USE_BOTH);
    
        $province = array_values($province);
    
        if(!empty($province)){
            return [
                'type' => 'province',
                'data' => [
                    'province' => $province[0],
                    'district' => []
                ]
            ];
        }
    
        $district = array_filter($districts, function($district) use ($location_id, $slug) {
            return $slug == $district['district_slug'] && $location_id == $district['id'];
        }, ARRAY_FILTER_USE_BOTH);
    
        $district = array_values($district);
        if(!empty($district)){
            $province = array_filter($provinces, function($province) use ($district) {
                return $district[0]['province_id'] == $province['id'];
            }, ARRAY_FILTER_USE_BOTH);
    
            $province = array_values($province);
            return [
                'type' => 'district',
                'data' => [
                    'province' => $province[0],
                    'district' => $district[0]
                ]
            ];
    
        }
    
        return [];
    }

    protected function get_province_by_slug($slug = '') {
        if(!$slug){
            return null;
        }
        $provinces = $this->provinces();
        $province = array();
        foreach ($provinces as $_p){
            if($_p['province_slug'] == $slug){
                $province = $_p;
                break;
            }
        }
        return $province;
    }
    
    protected function get_district_by_slug($province_id = 0, $slug = '') {
        if(!$province_id && !$slug){
            return null;
        }
        $districts = $this->districts();
        $district = array();
        foreach ($districts as $_d){
            if($_d['district_slug'] == $slug && $_d['province_id'] == $province_id){
                $district = $_d;
                break;
            }
        }
        return $district;
    }
    
    protected function get_district_by_province_id($province_id = 0) {
        $districts = $this->districts();
        $districtArr = array();
        foreach ($districts as $_d){
            if($_d['province_id'] == $province_id){
                $districtArr[] = $_d;
            }
        }
        return $districtArr;
    }
}
