<section id="sale_points" class="wrap-sale_points">
    <div class="sale_point_inner">
        <div class="heading">
            <?php

use Thaiminh\Diemban\Models\DiemBan;

 if ($f_province && !$f_district): ?>
                <h1 class="entry-title">
                    Điểm bán Khương Thảo Đan tại <?php echo $f_province['province_name']; ?>
                </h1>
            <?php elseif($f_province && $f_district): ?>
                <h1 class="entry-title">
                    Điểm bán Khương Thảo Đan tại <?php echo $f_district['district_name_with_type']; ?> - <?php echo $f_province['province_name']; ?>
                </h1>
            <?php endif; ?>
                <div class="desc">
                    {!! $heading !!}
                </div>
        </div>
        <?php if (!empty($f_province)): ?>
            <?php if (in_array($f_province['id'], $show_district)): ?>
                <?php if (!empty($f_district)): ?>
                    <?php echo DiemBan::tm_diemban($f_province['id'], $f_district['id']); ?>
                <?php endif; ?>
            <?php else: ?>
                <?php echo DiemBan::tm_diemban($f_province['id']); ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>