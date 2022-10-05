<?php namespace Thaiminh\Diemban\Models;

use Model;
use Thaiminh\Diemban\Models\Settings;
use Illuminate\Support\Facades\Cache;

class DiemBan extends Model
{
    static function tm_diemban($province_id = 0, $district_id = 0){
        $product_setting = Settings::get('product_setting');
        if(!$product_setting){
            return;
        }
        $product_setting = collect($product_setting)->groupBy('product_code')->keys()->toArray();
        $product_code = implode('_', $product_setting);

        $data = self::get_diem_ban_data($product_code, $province_id, $district_id);

        $str = '';
        if (isset($data['data'])){
            $dist = $data['data']['districts'];
            if (!$dist) return '';
            $idx = 1;
            foreach ($dist as $quan_id => $value) {
                if (isset($value['stores']) && !empty($value['stores'])){
                    $name = $value['name'];
                    $stores = $value['stores'];
                    $str .= "<h2 class='sub_dist_title'>{$idx}. {$name}</h2>";
                    // insert heading
                    $str .= "<table class='diem_ban layout_3col'>";
                    $str .= "<tr>";
                    $str .= "<th class='dia_chi'>Địa chỉ</th>";
                    $str .= "<th class='ten_nha_thuoc'>Nhà thuốc</th>";
                    $str .= "<th class='sdt'>Điện thoại</th>";
                    $str .= "</tr>";
    
                    foreach ($stores as $street => $sub_stores) {
                        foreach ($sub_stores as $store) {
                            $vip = $store['is_vip'];
                            $store_name = self::normalize_store_name($store['name']);
                            $store_address = $store['address'];
                            $store_phone = $store['phone'];
    
                            // Thêm thông tin icons
                            $icons_value = $store['icons'];
                            $icons = self::get_icons($product_code, $icons_value);
    
                            $star = ($vip == 2) ? '⭐' : '';
                            $str .= "<tr class='nha_thuoc vip{$vip}'>";
                            $str .= "<td class='dia_chi'>{$store_address}</td>";
                            $str .= "<td class='ten_nha_thuoc'>{$store_name} {$star} {$icons}</td>";
                            if (isset($caia_detected_device) && ( $caia_detected_device == 'Mobile' || $caia_detected_device == 'Tablet') ){
                                // $str .= "<td class='sdt'><a href='tel:{$store_phone}'>{$store_phone}</a></td>";
                                $store_phone = self::phone_number_call_format($store_phone);
                                $str .= "<td class='sdt'>{$store_phone}</td>";
                            }else{
                                $store_phone = self::phone_number_format($store_phone);
                                $str .= "<td class='sdt'>{$store_phone}</td>";
                            }
    
                            $str .= "</tr>";
                        }
                    }
    
                    // insert body
                    $str .= '</table>';
                    $idx += 1;
                }
            }
        }
    
        $style = '<style>
        h2.sub_dist_title{
            margin-top: 20px;
        }
        table.diem_ban{
            width: 100%;	
        }
        table.diem_ban{
            border-collapse: collapse;
            border: 1px solid #aaa;
        }
        table.diem_ban th{
            border: 1px solid #aaa;
            padding: 2px;
            background-color: grey;
            color: white;
        }
        table.diem_ban td{
            border: 1px solid #aaa;
            padding: 2px; 
        }
        table.diem_ban tr.nha_thuoc.vip1 td,
        table.diem_ban tr.nha_thuoc.vip2 td{
            font-weight:bold;
        }
        table.diem_ban td,
        table.diem_ban th{	
            padding: 5px 10px !important;
        }
    
        table.diem_ban.layout_3col td.dia_chi,
        table.diem_ban.layout_3col th.dia_chi{
            width: 35%;		
        }
        table.diem_ban.layout_3col td.ten_nha_thuoc,
        table.diem_ban.layout_3col th.ten_nha_thuoc{
            width: 45%;		
        }
        table.diem_ban.layout_3col td.sdt,
        table.diem_ban.layout_3col th.sdt{
            width: 20%;		
        }
        table.diem_ban.layout_4col td,
        table.diem_ban.layout_4col th{
            width: 25%;
            padding: 5px 10px !important;
        }
        table.diem_ban .icons{
            float: right;
        }
        table.diem_ban .icons span{
            padding: 4px 10px;
            font-size: 13px;
            color: #fff;
            font-weight: 700;
            background: #19918e;
            margin-right: 5px;
            border-radius: 5px;
            float: right;
        }
        table.diem_ban .icons span.icon2{
            background: #ff6600;
        }
        @media screen and (max-width: 568px) {
            table.diem_ban td,
            table.diem_ban th{
                width: 33%;
            }
            table.diem_ban .icons{
                display: table;
                clear: both;
                float: none;
                margin: 5px 0;
            }
        }
        </style>';
    
        return $str.$style;

    }

    static function get_icons($product_code, $icons_value){
        $icons = '';
        if( !empty($icons_value) ){
    
            $array_number = explode(',', $icons_value);
            $args['msp1_box1'] = 'KTD';
            $args['msp1_number_box1'] = '30v';
            $args['msp1_box2'] = 'KTD120V';
            $args['msp1_number_box2'] = '120v';
            $infomap_opts = self::get_infomap_product_options($args);
    
            if ( !empty( $infomap_opts['msp1'] ) && !empty( $infomap_opts['msp2'] ) ){
                if( $product_code == $infomap_opts['msp1'] ){
                    if( in_array( $infomap_opts['msp1_box1'], $array_number) && in_array( $infomap_opts['msp1_box2'], $array_number) ){
                        $icons = '<span class="icons"><span class="icon1">'.$infomap_opts['msp1_number_box1'].'</span><span class="icon2">'.$infomap_opts['msp1_number_box2'].'</span></span>';
                    }else{
                        if ( in_array($infomap_opts['msp1_box1'], $array_number, true) ) {
                            $icons = '<span class="icons"><span class="icon1">'.$infomap_opts['msp1_number_box1'].'</span></span>';
                        }
                        if( in_array($infomap_opts['msp1_box2'], $array_number, true) ){
                            $icons = '<span class="icons"><span class="icon2">'.$infomap_opts['msp1_number_box2'].'</span></span>';
                        }
                    }
                }else if( $product_code == $infomap_opts['msp2'] ){
                    if( in_array( $infomap_opts['msp2_box1'], $array_number) && in_array( $infomap_opts['msp2_box2'], $array_number) ){
                        $icons = '<span class="icons"><span class="icon1">'.$infomap_opts['msp2_number_box1'].'</span><span class="icon2">'.$infomap_opts['msp2_number_box2'].'</span></span>';
                    }else{
                        if ( in_array($infomap_opts['msp2_box1'], $array_number, true) ) {
                            $icons = '<span class="icons"><span class="icon1">'.$infomap_opts['msp2_number_box1'].'</span></span>';
                        }
                        if( in_array($infomap_opts['msp1_box2'], $array_number, true) ){
                            $icons = '<span class="icons"><span class="icon2">'.$infomap_opts['msp2_number_box2'].'</span></span>';
                        }
                    }
                }
    
            }else{
                if( in_array( $infomap_opts['msp1_box1'], $array_number) && in_array( $infomap_opts['msp1_box2'], $array_number) ){
                    $icons = '<span class="icons"><span class="icon1">'.$infomap_opts['msp1_number_box1'].'</span><span class="icon2">'.$infomap_opts['msp1_number_box2'].'</span></span>';
                }else{
                    if ( in_array($infomap_opts['msp1_box1'], $array_number, true) ) {
                        $icons = '<span class="icons"><span class="icon1">'.$infomap_opts['msp1_number_box1'].'</span></span>';
                    }
                    if( in_array($infomap_opts['msp1_box2'], $array_number, true) ){
                        $icons = '<span class="icons"><span class="icon2">'.$infomap_opts['msp1_number_box2'].'</span></span>';
                    }
                }
            }
    
        }
        return $icons;
    }
    
    static function get_infomap_product_options($args){
        $get_infomap_product_defaults = array(
            'msp1'  			=> '',
            'msp1_box1'  		=> '',
            'msp1_number_box1' 	=> '',
            'msp1_box2' 		=> '',
            'msp1_number_box2'	=> '',
            // Sử dụng khi có 2 Mã SP riêng
            'msp2'  			=> '',
            'msp2_box1'  		=> '',
            'msp2_number_box1' 	=> '',
            'msp2_box2' 		=> '',
            'msp2_number_box2'	=> '',
        );

        return array_merge($get_infomap_product_defaults, $args);
    }
    
    
    static function get_diem_ban_data($product_code, $province_id, $district_id = 0){
        $source = Settings::get('company');
        $token = Settings::get('api_key');

        $api_url = 'https://api.nhathuoc.tmp.vn/api/stores/';
        $cache_key = "api_diem_ban_{$source}_{$product_code}_{$province_id}_{$district_id}";
        if ($province_id){
            $endpoint = $api_url."{$source}/{$product_code}/{$province_id}_{$district_id}";
        }else{
            return '';
        }
    
        $header = array(
            'Authorization: Bearer ' . $token,
            'Content-Type: application/json',
        );
    
        $cache_key = "api_diem_ban_{$source}_{$product_code}_{$province_id}_{$district_id}";
        
        return Cache::remember($cache_key, now()->addMinutes(60), function () use ($endpoint, $header) {
            return self::send($endpoint, 'POST', $header);    
        });
    
    }
    
    static function normalize_store_name($name){
        $cut = 'KEY ';
        $name = trim($name);
        if ( substr($name, 0, strlen($cut)) == $cut ){
            $name = substr($name, strlen($cut));
        }
    
        $cut2 = ' key';
        if ( strtolower(substr($name, strlen($name) - strlen($cut2) )) == $cut2 ){
            $name = substr( $name, 0, strlen($name) - strlen($cut2) );
        }
    
        $cut2 = '( key )';
        if ( strtolower( substr($name, strlen($name) - strlen($cut2) )) == $cut2 ){
            $name = substr( $name, 0, strlen($name) - strlen($cut2) );
        }
    
        $cut2 = '(key)';
        if ( strtolower( substr($name, strlen($name) - strlen($cut2) )) == $cut2 ){
            $name = substr( $name, 0, strlen($name) - strlen($cut2) );
        }
    
        return $name;
    }
    
    static function phone_number_call_format($number, $space = ' ') {
        // Allow only Digits, remove all other characters.
        // $number = preg_replace("/[^\d]/", '', $number);
        $number = trim($number);
    
        $numbers = array_map('trim', explode('/', trim($number)));
        $output = array();
        foreach ($numbers as $no) {
            $output[] = "<a href='tel:{$no}'>{$no}</a>";
        }
        $output = implode('<br>', $output);
        return $output;
    
    }
    
    static function phone_number_format($number, $space = ' ') {
        // Allow only Digits, remove all other characters.
        // $number = preg_replace("/[^\d]/", '', $number);
        $number = trim($number);
    
        // get number length.
        $length = strlen($number);
    
        if($length == 10) {
            $output = substr($number, 0, 4) . $space . substr($number, 4, 3) . $space . substr($number, -3);
        }else if ($length == 11){
            $output = substr($number, 0, 3) . $space . substr($number, 3, 4) . $space . substr($number, -4);
        }else{
            $output = $number;
        }
    
        return $output;
    
    }

    static function send($endpoint, $method = 'GET', $header, $post_fields = '')
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => rtrim($endpoint, '/'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => $post_fields,
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode(trim($response), true);
        return $response;
    }

}