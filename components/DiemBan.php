<?php namespace ThaiMinh\DiemBan\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Theme;
use Cms\Classes\Page;

/**
 * DiemBan Component
 */
class DiemBan extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'DiemBan Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun() {

        $show_district = [1, 79];
        // $query_province = get_query_var('province');
        // $query_district = get_query_var('district');
        // $query_location = get_query_var('location');
        $theme = Theme::getActiveTheme();
        // dd($theme);
        $page = Page::load($theme,$this->page->baseFileName);
        dd($page);
        if($page->hasComponent("diemBan")){

        }
    }

    protected function provinces()
    {
        return array(
            array('id' => '1','province_name' => 'Hà Nội','province_slug' => 'ha-noi','province_type' => 'thanh-pho','province_name_with_type' => 'Thành phố Hà Nội','province_id' => '1','local_region_id' => '1','province_code' => 'HNO'),
            array('id' => '2','province_name' => 'Hà Giang','province_slug' => 'ha-giang','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Hà Giang','province_id' => '2','local_region_id' => '1','province_code' => 'HGI'),
            array('id' => '4','province_name' => 'Cao Bằng','province_slug' => 'cao-bang','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Cao Bằng','province_id' => '4','local_region_id' => '1','province_code' => 'CBA'),
            array('id' => '6','province_name' => 'Bắc Kạn','province_slug' => 'bac-kan','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Bắc Kạn','province_id' => '6','local_region_id' => '1','province_code' => 'BKA'),
            array('id' => '8','province_name' => 'Tuyên Quang','province_slug' => 'tuyen-quang','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Tuyên Quang','province_id' => '8','local_region_id' => '1','province_code' => 'TQU'),
            array('id' => '10','province_name' => 'Lào Cai','province_slug' => 'lao-cai','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Lào Cai','province_id' => '10','local_region_id' => '1','province_code' => 'LCA'),
            array('id' => '11','province_name' => 'Điện Biên','province_slug' => 'dien-bien','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Điện Biên','province_id' => '11','local_region_id' => '1','province_code' => 'DBI'),
            array('id' => '12','province_name' => 'Lai Châu','province_slug' => 'lai-chau','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Lai Châu','province_id' => '12','local_region_id' => '1','province_code' => 'LCH'),
            array('id' => '14','province_name' => 'Sơn La','province_slug' => 'son-la','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Sơn La','province_id' => '14','local_region_id' => '1','province_code' => 'SL'),
            array('id' => '15','province_name' => 'Yên Bái','province_slug' => 'yen-bai','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Yên Bái','province_id' => '15','local_region_id' => '1','province_code' => 'YB'),
            array('id' => '17','province_name' => 'Hoà Bình','province_slug' => 'hoa-binh','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Hoà Bình','province_id' => '17','local_region_id' => '1','province_code' => 'HBI'),
            array('id' => '19','province_name' => 'Thái Nguyên','province_slug' => 'thai-nguyen','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Thái Nguyên','province_id' => '19','local_region_id' => '1','province_code' => 'TNG'),
            array('id' => '20','province_name' => 'Lạng Sơn','province_slug' => 'lang-son','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Lạng Sơn','province_id' => '20','local_region_id' => '1','province_code' => 'LSO'),
            array('id' => '22','province_name' => 'Quảng Ninh','province_slug' => 'quang-ninh','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Quảng Ninh','province_id' => '22','local_region_id' => '1','province_code' => 'QNI'),
            array('id' => '24','province_name' => 'Bắc Giang','province_slug' => 'bac-giang','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Bắc Giang','province_id' => '24','local_region_id' => '1','province_code' => 'BGI'),
            array('id' => '25','province_name' => 'Phú Thọ','province_slug' => 'phu-tho','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Phú Thọ','province_id' => '25','local_region_id' => '1','province_code' => 'PTH'),
            array('id' => '26','province_name' => 'Vĩnh Phúc','province_slug' => 'vinh-phuc','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Vĩnh Phúc','province_id' => '26','local_region_id' => '1','province_code' => 'VPH'),
            array('id' => '27','province_name' => 'Bắc Ninh','province_slug' => 'bac-ninh','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Bắc Ninh','province_id' => '27','local_region_id' => '1','province_code' => 'BNI'),
            array('id' => '30','province_name' => 'Hải Dương','province_slug' => 'hai-duong','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Hải Dương','province_id' => '30','local_region_id' => '1','province_code' => 'HDU'),
            array('id' => '31','province_name' => 'Hải Phòng','province_slug' => 'hai-phong','province_type' => 'thanh-pho','province_name_with_type' => 'Thành phố Hải Phòng','province_id' => '31','local_region_id' => '1','province_code' => 'HPH'),
            array('id' => '33','province_name' => 'Hưng Yên','province_slug' => 'hung-yen','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Hưng Yên','province_id' => '33','local_region_id' => '1','province_code' => 'HYE'),
            array('id' => '34','province_name' => 'Thái Bình','province_slug' => 'thai-binh','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Thái Bình','province_id' => '34','local_region_id' => '1','province_code' => 'TBI'),
            array('id' => '35','province_name' => 'Hà Nam','province_slug' => 'ha-nam','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Hà Nam','province_id' => '35','local_region_id' => '1','province_code' => 'HNA'),
            array('id' => '36','province_name' => 'Nam Định','province_slug' => 'nam-dinh','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Nam Định','province_id' => '36','local_region_id' => '1','province_code' => 'NDI'),
            array('id' => '37','province_name' => 'Ninh Bình','province_slug' => 'ninh-binh','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Ninh Bình','province_id' => '37','local_region_id' => '1','province_code' => 'NBI'),
            array('id' => '38','province_name' => 'Thanh Hóa','province_slug' => 'thanh-hoa','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Thanh Hóa','province_id' => '38','local_region_id' => '2','province_code' => 'THA'),
            array('id' => '40','province_name' => 'Nghệ An','province_slug' => 'nghe-an','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Nghệ An','province_id' => '40','local_region_id' => '2','province_code' => 'NAN'),
            array('id' => '42','province_name' => 'Hà Tĩnh','province_slug' => 'ha-tinh','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Hà Tĩnh','province_id' => '42','local_region_id' => '2','province_code' => 'HTI'),
            array('id' => '44','province_name' => 'Quảng Bình','province_slug' => 'quang-binh','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Quảng Bình','province_id' => '44','local_region_id' => '2','province_code' => 'QBI'),
            array('id' => '45','province_name' => 'Quảng Trị','province_slug' => 'quang-tri','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Quảng Trị','province_id' => '45','local_region_id' => '2','province_code' => 'QTR'),
            array('id' => '46','province_name' => 'Thừa Thiên Huế','province_slug' => 'thua-thien-hue','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Thừa Thiên Huế','province_id' => '46','local_region_id' => '2','province_code' => 'TTH'),
            array('id' => '48','province_name' => 'Đà Nẵng','province_slug' => 'da-nang','province_type' => 'thanh-pho','province_name_with_type' => 'Thành phố Đà Nẵng','province_id' => '48','local_region_id' => '2','province_code' => 'DDN'),
            array('id' => '49','province_name' => 'Quảng Nam','province_slug' => 'quang-nam','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Quảng Nam','province_id' => '49','local_region_id' => '2','province_code' => 'QNA'),
            array('id' => '51','province_name' => 'Quảng Ngãi','province_slug' => 'quang-ngai','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Quảng Ngãi','province_id' => '51','local_region_id' => '2','province_code' => 'QNG'),
            array('id' => '52','province_name' => 'Bình Định','province_slug' => 'binh-dinh','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Bình Định','province_id' => '52','local_region_id' => '2','province_code' => 'BDD'),
            array('id' => '54','province_name' => 'Phú Yên','province_slug' => 'phu-yen','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Phú Yên','province_id' => '54','local_region_id' => '2','province_code' => 'PYE'),
            array('id' => '56','province_name' => 'Khánh Hòa','province_slug' => 'khanh-hoa','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Khánh Hòa','province_id' => '56','local_region_id' => '2','province_code' => 'KHO'),
            array('id' => '58','province_name' => 'Ninh Thuận','province_slug' => 'ninh-thuan','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Ninh Thuận','province_id' => '58','local_region_id' => '3','province_code' => 'NTH'),
            array('id' => '60','province_name' => 'Bình Thuận','province_slug' => 'binh-thuan','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Bình Thuận','province_id' => '60','local_region_id' => '3','province_code' => 'BTH'),
            array('id' => '62','province_name' => 'Kon Tum','province_slug' => 'kon-tum','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Kon Tum','province_id' => '62','local_region_id' => '2','province_code' => 'KTU'),
            array('id' => '64','province_name' => 'Gia Lai','province_slug' => 'gia-lai','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Gia Lai','province_id' => '64','local_region_id' => '2','province_code' => 'GLI'),
            array('id' => '66','province_name' => 'Đắk Lắk','province_slug' => 'dak-lak','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Đắk Lắk','province_id' => '66','local_region_id' => '2','province_code' => 'DLA'),
            array('id' => '67','province_name' => 'Đắk Nông','province_slug' => 'dak-nong','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Đắk Nông','province_id' => '67','local_region_id' => '2','province_code' => 'DNO'),
            array('id' => '68','province_name' => 'Lâm Đồng','province_slug' => 'lam-dong','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Lâm Đồng','province_id' => '68','local_region_id' => '3','province_code' => 'LDO'),
            array('id' => '70','province_name' => 'Bình Phước','province_slug' => 'binh-phuoc','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Bình Phước','province_id' => '70','local_region_id' => '3','province_code' => 'BPH'),
            array('id' => '72','province_name' => 'Tây Ninh','province_slug' => 'tay-ninh','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Tây Ninh','province_id' => '72','local_region_id' => '3','province_code' => 'TNI'),
            array('id' => '74','province_name' => 'Bình Dương','province_slug' => 'binh-duong','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Bình Dương','province_id' => '74','local_region_id' => '3','province_code' => 'BDU'),
            array('id' => '75','province_name' => 'Đồng Nai','province_slug' => 'dong-nai','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Đồng Nai','province_id' => '75','local_region_id' => '3','province_code' => 'DNA'),
            array('id' => '77','province_name' => 'Bà Rịa - Vũng Tàu','province_slug' => 'ba-ria-vung-tau','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Bà Rịa - Vũng Tàu','province_id' => '77','local_region_id' => '3','province_code' => 'VTA'),
            array('id' => '79','province_name' => 'Hồ Chí Minh','province_slug' => 'ho-chi-minh','province_type' => 'thanh-pho','province_name_with_type' => 'Thành phố Hồ Chí Minh','province_id' => '79','local_region_id' => '3','province_code' => 'HCM'),
            array('id' => '80','province_name' => 'Long An','province_slug' => 'long-an','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Long An','province_id' => '80','local_region_id' => '3','province_code' => 'LAN'),
            array('id' => '82','province_name' => 'Tiền Giang','province_slug' => 'tien-giang','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Tiền Giang','province_id' => '82','local_region_id' => '3','province_code' => 'TGI'),
            array('id' => '83','province_name' => 'Bến Tre','province_slug' => 'ben-tre','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Bến Tre','province_id' => '83','local_region_id' => '3','province_code' => 'BTR'),
            array('id' => '84','province_name' => 'Trà Vinh','province_slug' => 'tra-vinh','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Trà Vinh','province_id' => '84','local_region_id' => '3','province_code' => 'TVI'),
            array('id' => '86','province_name' => 'Vĩnh Long','province_slug' => 'vinh-long','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Vĩnh Long','province_id' => '86','local_region_id' => '3','province_code' => 'VLO'),
            array('id' => '87','province_name' => 'Đồng Tháp','province_slug' => 'dong-thap','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Đồng Tháp','province_id' => '87','local_region_id' => '3','province_code' => 'DTH'),
            array('id' => '89','province_name' => 'An Giang','province_slug' => 'an-giang','province_type' => 'tinh','province_name_with_type' => 'Tỉnh An Giang','province_id' => '89','local_region_id' => '3','province_code' => 'AGI'),
            array('id' => '91','province_name' => 'Kiên Giang','province_slug' => 'kien-giang','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Kiên Giang','province_id' => '91','local_region_id' => '3','province_code' => 'KGI'),
            array('id' => '92','province_name' => 'Cần Thơ','province_slug' => 'can-tho','province_type' => 'thanh-pho','province_name_with_type' => 'Thành phố Cần Thơ','province_id' => '92','local_region_id' => '3','province_code' => 'CTH'),
            array('id' => '93','province_name' => 'Hậu Giang','province_slug' => 'hau-giang','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Hậu Giang','province_id' => '93','local_region_id' => '3','province_code' => 'HAG'),
            array('id' => '94','province_name' => 'Sóc Trăng','province_slug' => 'soc-trang','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Sóc Trăng','province_id' => '94','local_region_id' => '3','province_code' => 'STR'),
            array('id' => '95','province_name' => 'Bạc Liêu','province_slug' => 'bac-lieu','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Bạc Liêu','province_id' => '95','local_region_id' => '3','province_code' => 'BLI'),
            array('id' => '96','province_name' => 'Cà Mau','province_slug' => 'ca-mau','province_type' => 'tinh','province_name_with_type' => 'Tỉnh Cà Mau','province_id' => '96','local_region_id' => '3','province_code' => 'CMA')
        );
    }

    protected function districts()
    {
        return array(
            array('id' => '1','district_name' => 'Ba Đình','district_slug' => 'ba-dinh','district_type' => 'quan','district_name_with_type' => 'Quận Ba Đình','district_path' => 'Ba Đình, Hà Nội','district_path_with_type' => 'Quận Ba Đình, Thành phố Hà Nội','district_code' => '1','province_id' => '1'),
            array('id' => '2','district_name' => 'Hoàn Kiếm','district_slug' => 'hoan-kiem','district_type' => 'quan','district_name_with_type' => 'Quận Hoàn Kiếm','district_path' => 'Hoàn Kiếm, Hà Nội','district_path_with_type' => 'Quận Hoàn Kiếm, Thành phố Hà Nội','district_code' => '2','province_id' => '1'),
            array('id' => '3','district_name' => 'Tây Hồ','district_slug' => 'tay-ho','district_type' => 'quan','district_name_with_type' => 'Quận Tây Hồ','district_path' => 'Tây Hồ, Hà Nội','district_path_with_type' => 'Quận Tây Hồ, Thành phố Hà Nội','district_code' => '3','province_id' => '1'),
            array('id' => '4','district_name' => 'Long Biên','district_slug' => 'long-bien','district_type' => 'quan','district_name_with_type' => 'Quận Long Biên','district_path' => 'Long Biên, Hà Nội','district_path_with_type' => 'Quận Long Biên, Thành phố Hà Nội','district_code' => '4','province_id' => '1'),
            array('id' => '5','district_name' => 'Cầu Giấy','district_slug' => 'cau-giay','district_type' => 'quan','district_name_with_type' => 'Quận Cầu Giấy','district_path' => 'Cầu Giấy, Hà Nội','district_path_with_type' => 'Quận Cầu Giấy, Thành phố Hà Nội','district_code' => '5','province_id' => '1'),
            array('id' => '6','district_name' => 'Đống Đa','district_slug' => 'dong-da','district_type' => 'quan','district_name_with_type' => 'Quận Đống Đa','district_path' => 'Đống Đa, Hà Nội','district_path_with_type' => 'Quận Đống Đa, Thành phố Hà Nội','district_code' => '6','province_id' => '1'),
            array('id' => '7','district_name' => 'Hai Bà Trưng','district_slug' => 'hai-ba-trung','district_type' => 'quan','district_name_with_type' => 'Quận Hai Bà Trưng','district_path' => 'Hai Bà Trưng, Hà Nội','district_path_with_type' => 'Quận Hai Bà Trưng, Thành phố Hà Nội','district_code' => '7','province_id' => '1'),
            array('id' => '8','district_name' => 'Hoàng Mai','district_slug' => 'hoang-mai','district_type' => 'quan','district_name_with_type' => 'Quận Hoàng Mai','district_path' => 'Hoàng Mai, Hà Nội','district_path_with_type' => 'Quận Hoàng Mai, Thành phố Hà Nội','district_code' => '8','province_id' => '1'),
            array('id' => '9','district_name' => 'Thanh Xuân','district_slug' => 'thanh-xuan','district_type' => 'quan','district_name_with_type' => 'Quận Thanh Xuân','district_path' => 'Thanh Xuân, Hà Nội','district_path_with_type' => 'Quận Thanh Xuân, Thành phố Hà Nội','district_code' => '9','province_id' => '1'),
            array('id' => '16','district_name' => 'Sóc Sơn','district_slug' => 'soc-son','district_type' => 'huyen','district_name_with_type' => 'Huyện Sóc Sơn','district_path' => 'Sóc Sơn, Hà Nội','district_path_with_type' => 'Huyện Sóc Sơn, Thành phố Hà Nội','district_code' => '16','province_id' => '1'),
            array('id' => '17','district_name' => 'Đông Anh','district_slug' => 'dong-anh','district_type' => 'huyen','district_name_with_type' => 'Huyện Đông Anh','district_path' => 'Đông Anh, Hà Nội','district_path_with_type' => 'Huyện Đông Anh, Thành phố Hà Nội','district_code' => '17','province_id' => '1'),
            array('id' => '18','district_name' => 'Gia Lâm','district_slug' => 'gia-lam','district_type' => 'huyen','district_name_with_type' => 'Huyện Gia Lâm','district_path' => 'Gia Lâm, Hà Nội','district_path_with_type' => 'Huyện Gia Lâm, Thành phố Hà Nội','district_code' => '18','province_id' => '1'),
            array('id' => '19','district_name' => 'Nam Từ Liêm','district_slug' => 'nam-tu-liem','district_type' => 'quan','district_name_with_type' => 'Quận Nam Từ Liêm','district_path' => 'Nam Từ Liêm, Hà Nội','district_path_with_type' => 'Quận Nam Từ Liêm, Thành phố Hà Nội','district_code' => '19','province_id' => '1'),
            array('id' => '20','district_name' => 'Thanh Trì','district_slug' => 'thanh-tri','district_type' => 'huyen','district_name_with_type' => 'Huyện Thanh Trì','district_path' => 'Thanh Trì, Hà Nội','district_path_with_type' => 'Huyện Thanh Trì, Thành phố Hà Nội','district_code' => '20','province_id' => '1'),
            array('id' => '21','district_name' => 'Bắc Từ Liêm','district_slug' => 'bac-tu-liem','district_type' => 'quan','district_name_with_type' => 'Quận Bắc Từ Liêm','district_path' => 'Bắc Từ Liêm, Hà Nội','district_path_with_type' => 'Quận Bắc Từ Liêm, Thành phố Hà Nội','district_code' => '21','province_id' => '1'),
            array('id' => '250','district_name' => 'Mê Linh','district_slug' => 'me-linh','district_type' => 'huyen','district_name_with_type' => 'Huyện Mê Linh','district_path' => 'Mê Linh, Hà Nội','district_path_with_type' => 'Huyện Mê Linh, Thành phố Hà Nội','district_code' => '250','province_id' => '1'),
            array('id' => '268','district_name' => 'Hà Đông','district_slug' => 'ha-dong','district_type' => 'quan','district_name_with_type' => 'Quận Hà Đông','district_path' => 'Hà Đông, Hà Nội','district_path_with_type' => 'Quận Hà Đông, Thành phố Hà Nội','district_code' => '268','province_id' => '1'),
            array('id' => '269','district_name' => 'Sơn Tây','district_slug' => 'son-tay','district_type' => 'thi-xa','district_name_with_type' => 'Thị xã Sơn Tây','district_path' => 'Sơn Tây, Hà Nội','district_path_with_type' => 'Thị xã Sơn Tây, Thành phố Hà Nội','district_code' => '269','province_id' => '1'),
            array('id' => '271','district_name' => 'Ba Vì','district_slug' => 'ba-vi','district_type' => 'huyen','district_name_with_type' => 'Huyện Ba Vì','district_path' => 'Ba Vì, Hà Nội','district_path_with_type' => 'Huyện Ba Vì, Thành phố Hà Nội','district_code' => '271','province_id' => '1'),
            array('id' => '272','district_name' => 'Phúc Thọ','district_slug' => 'phuc-tho','district_type' => 'huyen','district_name_with_type' => 'Huyện Phúc Thọ','district_path' => 'Phúc Thọ, Hà Nội','district_path_with_type' => 'Huyện Phúc Thọ, Thành phố Hà Nội','district_code' => '272','province_id' => '1'),
            array('id' => '273','district_name' => 'Đan Phượng','district_slug' => 'dan-phuong','district_type' => 'huyen','district_name_with_type' => 'Huyện Đan Phượng','district_path' => 'Đan Phượng, Hà Nội','district_path_with_type' => 'Huyện Đan Phượng, Thành phố Hà Nội','district_code' => '273','province_id' => '1'),
            array('id' => '274','district_name' => 'Hoài Đức','district_slug' => 'hoai-duc','district_type' => 'huyen','district_name_with_type' => 'Huyện Hoài Đức','district_path' => 'Hoài Đức, Hà Nội','district_path_with_type' => 'Huyện Hoài Đức, Thành phố Hà Nội','district_code' => '274','province_id' => '1'),
            array('id' => '275','district_name' => 'Quốc Oai','district_slug' => 'quoc-oai','district_type' => 'huyen','district_name_with_type' => 'Huyện Quốc Oai','district_path' => 'Quốc Oai, Hà Nội','district_path_with_type' => 'Huyện Quốc Oai, Thành phố Hà Nội','district_code' => '275','province_id' => '1'),
            array('id' => '276','district_name' => 'Thạch Thất','district_slug' => 'thach-that','district_type' => 'huyen','district_name_with_type' => 'Huyện Thạch Thất','district_path' => 'Thạch Thất, Hà Nội','district_path_with_type' => 'Huyện Thạch Thất, Thành phố Hà Nội','district_code' => '276','province_id' => '1'),
            array('id' => '277','district_name' => 'Chương Mỹ','district_slug' => 'chuong-my','district_type' => 'huyen','district_name_with_type' => 'Huyện Chương Mỹ','district_path' => 'Chương Mỹ, Hà Nội','district_path_with_type' => 'Huyện Chương Mỹ, Thành phố Hà Nội','district_code' => '277','province_id' => '1'),
            array('id' => '278','district_name' => 'Thanh Oai','district_slug' => 'thanh-oai','district_type' => 'huyen','district_name_with_type' => 'Huyện Thanh Oai','district_path' => 'Thanh Oai, Hà Nội','district_path_with_type' => 'Huyện Thanh Oai, Thành phố Hà Nội','district_code' => '278','province_id' => '1'),
            array('id' => '279','district_name' => 'Thường Tín','district_slug' => 'thuong-tin','district_type' => 'huyen','district_name_with_type' => 'Huyện Thường Tín','district_path' => 'Thường Tín, Hà Nội','district_path_with_type' => 'Huyện Thường Tín, Thành phố Hà Nội','district_code' => '279','province_id' => '1'),
            array('id' => '280','district_name' => 'Phú Xuyên','district_slug' => 'phu-xuyen','district_type' => 'huyen','district_name_with_type' => 'Huyện Phú Xuyên','district_path' => 'Phú Xuyên, Hà Nội','district_path_with_type' => 'Huyện Phú Xuyên, Thành phố Hà Nội','district_code' => '280','province_id' => '1'),
            array('id' => '281','district_name' => 'Ứng Hòa','district_slug' => 'ung-hoa','district_type' => 'huyen','district_name_with_type' => 'Huyện Ứng Hòa','district_path' => 'Ứng Hòa, Hà Nội','district_path_with_type' => 'Huyện Ứng Hòa, Thành phố Hà Nội','district_code' => '281','province_id' => '1'),
            array('id' => '282','district_name' => 'Mỹ Đức','district_slug' => 'my-duc','district_type' => 'huyen','district_name_with_type' => 'Huyện Mỹ Đức','district_path' => 'Mỹ Đức, Hà Nội','district_path_with_type' => 'Huyện Mỹ Đức, Thành phố Hà Nội','district_code' => '282','province_id' => '1'),
            array('id' => '760','district_name' => '1','district_slug' => '1','district_type' => 'quan','district_name_with_type' => 'Quận 1','district_path' => '1, Hồ Chí Minh','district_path_with_type' => 'Quận 1, Thành phố Hồ Chí Minh','district_code' => '760','province_id' => '79'),
            array('id' => '761','district_name' => '12','district_slug' => '12','district_type' => 'quan','district_name_with_type' => 'Quận 12','district_path' => '12, Hồ Chí Minh','district_path_with_type' => 'Quận 12, Thành phố Hồ Chí Minh','district_code' => '761','province_id' => '79'),
            array('id' => '762','district_name' => 'Thủ Đức','district_slug' => 'thu-duc','district_type' => 'quan','district_name_with_type' => 'Quận Thủ Đức','district_path' => 'Thủ Đức, Hồ Chí Minh','district_path_with_type' => 'Quận Thủ Đức, Thành phố Hồ Chí Minh','district_code' => '762','province_id' => '79'),
            array('id' => '763','district_name' => '9','district_slug' => '9','district_type' => 'quan','district_name_with_type' => 'Quận 9','district_path' => '9, Hồ Chí Minh','district_path_with_type' => 'Quận 9, Thành phố Hồ Chí Minh','district_code' => '763','province_id' => '79'),
            array('id' => '764','district_name' => 'Gò Vấp','district_slug' => 'go-vap','district_type' => 'quan','district_name_with_type' => 'Quận Gò Vấp','district_path' => 'Gò Vấp, Hồ Chí Minh','district_path_with_type' => 'Quận Gò Vấp, Thành phố Hồ Chí Minh','district_code' => '764','province_id' => '79'),
            array('id' => '765','district_name' => 'Bình Thạnh','district_slug' => 'binh-thanh','district_type' => 'quan','district_name_with_type' => 'Quận Bình Thạnh','district_path' => 'Bình Thạnh, Hồ Chí Minh','district_path_with_type' => 'Quận Bình Thạnh, Thành phố Hồ Chí Minh','district_code' => '765','province_id' => '79'),
            array('id' => '766','district_name' => 'Tân Bình','district_slug' => 'tan-binh','district_type' => 'quan','district_name_with_type' => 'Quận Tân Bình','district_path' => 'Tân Bình, Hồ Chí Minh','district_path_with_type' => 'Quận Tân Bình, Thành phố Hồ Chí Minh','district_code' => '766','province_id' => '79'),
            array('id' => '767','district_name' => 'Tân Phú','district_slug' => 'tan-phu','district_type' => 'quan','district_name_with_type' => 'Quận Tân Phú','district_path' => 'Tân Phú, Hồ Chí Minh','district_path_with_type' => 'Quận Tân Phú, Thành phố Hồ Chí Minh','district_code' => '767','province_id' => '79'),
            array('id' => '768','district_name' => 'Phú Nhuận','district_slug' => 'phu-nhuan','district_type' => 'quan','district_name_with_type' => 'Quận Phú Nhuận','district_path' => 'Phú Nhuận, Hồ Chí Minh','district_path_with_type' => 'Quận Phú Nhuận, Thành phố Hồ Chí Minh','district_code' => '768','province_id' => '79'),
            array('id' => '769','district_name' => '2','district_slug' => '2','district_type' => 'quan','district_name_with_type' => 'Quận 2','district_path' => '2, Hồ Chí Minh','district_path_with_type' => 'Quận 2, Thành phố Hồ Chí Minh','district_code' => '769','province_id' => '79'),
            array('id' => '770','district_name' => '3','district_slug' => '3','district_type' => 'quan','district_name_with_type' => 'Quận 3','district_path' => '3, Hồ Chí Minh','district_path_with_type' => 'Quận 3, Thành phố Hồ Chí Minh','district_code' => '770','province_id' => '79'),
            array('id' => '771','district_name' => '10','district_slug' => '10','district_type' => 'quan','district_name_with_type' => 'Quận 10','district_path' => '10, Hồ Chí Minh','district_path_with_type' => 'Quận 10, Thành phố Hồ Chí Minh','district_code' => '771','province_id' => '79'),
            array('id' => '772','district_name' => '11','district_slug' => '11','district_type' => 'quan','district_name_with_type' => 'Quận 11','district_path' => '11, Hồ Chí Minh','district_path_with_type' => 'Quận 11, Thành phố Hồ Chí Minh','district_code' => '772','province_id' => '79'),
            array('id' => '773','district_name' => '4','district_slug' => '4','district_type' => 'quan','district_name_with_type' => 'Quận 4','district_path' => '4, Hồ Chí Minh','district_path_with_type' => 'Quận 4, Thành phố Hồ Chí Minh','district_code' => '773','province_id' => '79'),
            array('id' => '774','district_name' => '5','district_slug' => '5','district_type' => 'quan','district_name_with_type' => 'Quận 5','district_path' => '5, Hồ Chí Minh','district_path_with_type' => 'Quận 5, Thành phố Hồ Chí Minh','district_code' => '774','province_id' => '79'),
            array('id' => '775','district_name' => '6','district_slug' => '6','district_type' => 'quan','district_name_with_type' => 'Quận 6','district_path' => '6, Hồ Chí Minh','district_path_with_type' => 'Quận 6, Thành phố Hồ Chí Minh','district_code' => '775','province_id' => '79'),
            array('id' => '776','district_name' => '8','district_slug' => '8','district_type' => 'quan','district_name_with_type' => 'Quận 8','district_path' => '8, Hồ Chí Minh','district_path_with_type' => 'Quận 8, Thành phố Hồ Chí Minh','district_code' => '776','province_id' => '79'),
            array('id' => '777','district_name' => 'Bình Tân','district_slug' => 'binh-tan','district_type' => 'quan','district_name_with_type' => 'Quận Bình Tân','district_path' => 'Bình Tân, Hồ Chí Minh','district_path_with_type' => 'Quận Bình Tân, Thành phố Hồ Chí Minh','district_code' => '777','province_id' => '79'),
            array('id' => '778','district_name' => '7','district_slug' => '7','district_type' => 'quan','district_name_with_type' => 'Quận 7','district_path' => '7, Hồ Chí Minh','district_path_with_type' => 'Quận 7, Thành phố Hồ Chí Minh','district_code' => '778','province_id' => '79'),
            array('id' => '783','district_name' => 'Củ Chi','district_slug' => 'cu-chi','district_type' => 'huyen','district_name_with_type' => 'Huyện Củ Chi','district_path' => 'Củ Chi, Hồ Chí Minh','district_path_with_type' => 'Huyện Củ Chi, Thành phố Hồ Chí Minh','district_code' => '783','province_id' => '79'),
            array('id' => '784','district_name' => 'Hóc Môn','district_slug' => 'hoc-mon','district_type' => 'huyen','district_name_with_type' => 'Huyện Hóc Môn','district_path' => 'Hóc Môn, Hồ Chí Minh','district_path_with_type' => 'Huyện Hóc Môn, Thành phố Hồ Chí Minh','district_code' => '784','province_id' => '79'),
            array('id' => '785','district_name' => 'Bình Chánh','district_slug' => 'binh-chanh','district_type' => 'huyen','district_name_with_type' => 'Huyện Bình Chánh','district_path' => 'Bình Chánh, Hồ Chí Minh','district_path_with_type' => 'Huyện Bình Chánh, Thành phố Hồ Chí Minh','district_code' => '785','province_id' => '79'),
            array('id' => '786','district_name' => 'Nhà Bè','district_slug' => 'nha-be','district_type' => 'huyen','district_name_with_type' => 'Huyện Nhà Bè','district_path' => 'Nhà Bè, Hồ Chí Minh','district_path_with_type' => 'Huyện Nhà Bè, Thành phố Hồ Chí Minh','district_code' => '786','province_id' => '79'),
            array('id' => '787','district_name' => 'Cần Giờ','district_slug' => 'can-gio','district_type' => 'huyen','district_name_with_type' => 'Huyện Cần Giờ','district_path' => 'Cần Giờ, Hồ Chí Minh','district_path_with_type' => 'Huyện Cần Giờ, Thành phố Hồ Chí Minh','district_code' => '787','province_id' => '79')
        );
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
