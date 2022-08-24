<?php
    use Thaiminh\Diemban\Models\DiemBan;
?>
<?php if (!empty($f_province)): ?>
    <?php if (in_array($f_province['id'], $show_district)): ?>
        <?php if (!empty($f_district)): ?>
            <?php echo DiemBan::tm_diemban($f_province['id'], $f_district['id']); ?>
        <?php else: ?>
            <table class="table-province" style="border-collapse: collapse; width: 100%;">
                <?php foreach ($provinces as $_province): ?>
                    <?php if (in_array($_province['id'], $show_district) && $_province['id'] == $f_province['id'] ): ?>
                        <?php foreach ($_province['districts'] as $districts): ?>
                            <tr>
                                <?php foreach ($districts as $district): ?>
                                    <td>
                                        <ul>
                                            <li>
                                                <a href="<?php echo $district['url']; ?>">
                                                    <?php echo $district['full_name'] ?>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    <?php else: ?>
        <?php echo DiemBan::tm_diemban($f_province['id']); ?>
    <?php endif; ?>
<?php else: ?>
    <?php foreach ($provinces as $province): ?>
        <?php if (in_array($province['id'], $show_district)): ?>
            <h3 class="title-location" style="color:#ff6600;">
                <?php echo $province['province_name']; ?>
            </h3>
            <table class="table-province" style="border-collapse: collapse; width: 100%;">
                <?php foreach ($province['districts'] as $districts): ?>
                    <tr>
                        <?php foreach ($districts as $district): ?>
                            <td>
                                <ul>
                                    <li>
                                        <a href="<?php echo $district['url']; ?>">
                                            <?php echo $district['full_name'] ?>
                                        </a>
                                    </li>
                                </ul>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    <?php endforeach; ?>
    
    <?php foreach ($regions as $key => $region): ?>
        <h3 class="title-location">
            <?php echo $region['name']; ?>
        </h3>
        <table class="table-province" style="border-collapse: collapse; width: 100%;">
            <?php foreach ($region['provinces'] as $provinces): ?>
                <tr>
                    <?php foreach ($provinces as $province): ?>
                        <td>
                            <ul>
                                <li>
                                    <a href="<?php echo $province['url']; ?>"><?php echo $province['name']; ?></a>
                                </li>
                            </ul>
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endforeach; ?>
<?php endif; ?>