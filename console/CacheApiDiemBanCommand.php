<?php namespace ThaiMinh\DiemBan\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Thaiminh\Diemban\Models\Settings;
use Illuminate\Support\Facades\Cache;
use Thaiminh\Diemban\Models\DiemBan;

/**
 * CacheApiDiemBanCommand Command
 */
class CacheApiDiemBanCommand extends Command
{
    /**
     * @var string name is the console command name
     */
    protected $name = 'diemban:cacheapidiembancommand';

    /**
     * @var string description is the console command description
     */
    protected $description = 'No description provided yet...';

    /**
     * handle executes the console command
     */
    public function handle()
    {
        $product_setting = Settings::get('product_setting');
        if(!$product_setting){
            return;
        }
        $product_setting = collect($product_setting)->groupBy('product_code')->keys()->toArray();
        $product_code = implode('_', $product_setting);

        foreach($this->provinces() as $province) {
            $this->output->writeln($province['province_name']);
            if(in_array(intval($province['id']), [1, 79])) {
                $districts = self::get_district_by_province_id($province['id']);
                foreach($districts as $district) {
                    $this->output->writeln($district['district_name']);
                    DiemBan::cache_diem_ban_data($product_code, $province['id'], $district['id']);
                }
            } else {
                DiemBan::cache_diem_ban_data($product_code, $province['id'], 0);
            }
        }
        return 0;
    }

    /**
     * getArguments get the console command arguments
     */
    protected function getArguments()
    {
        return [];
    }

    /**
     * getOptions get the console command options
     */
    protected function getOptions()
    {
        return [];
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

    private function get_district_by_province_id($province_id = 0) {
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
