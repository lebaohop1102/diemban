
<section id="sale_points" class="wrap-sale_points">
    <div class="sale_point_inner">
        <div class="heading">
            <h1 class="entry-title">Điểm bán Khương Thảo Đan</h1>
            <div class="desc">
                {!! $heading !!}
            </div>
        </div>
        @foreach($provinces as $province)
            @if(in_array($province['id'], $show_district))
                <h3 class="title-location" style="color:#ff6600;">
                    {{ $province['province_name'] }}
                </h3>
                <table class="table-province" style="border-collapse: collapse; width: 100%;">
                    @foreach(array_chunk($province['districts'], 4) as $chunk)
                        <tr>
                            @foreach($chunk as $item)
                                @php
                                    $url = sprintf('%s/%s/%s-%d',
                                        $base_url,
                                        $local_region_map[$province['local_region_id']]['slug'],
                                        $item['district_slug'],
                                        $item['id']
                                    );
                                @endphp
                                <td>
                                    <ul>
                                        <li>
                                            <a href="{{ $url }}"><?php echo is_numeric($item['district_name']) ? $item['district_name_with_type'] : $item['district_name']; ?></a>
                                        </li>
                                    </ul>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </table>
            @endif
        @endforeach

        @foreach($regions as $key => $region)
            <h3 class="title-location">
                {{ $region['name'] }}
            </h3>
            <table class="table-province" style="border-collapse: collapse; width: 100%;">
                @foreach(array_chunk($region['provinces'], 4) as $chunk)
                    <tr>
                        @foreach($chunk as $province)
                            @php
                                $url = sprintf('%s/%s/%s-%d',
                                    $base_url,
                                    $local_region_map[$key]['slug'],
                                    $province['slug'],
                                    $province['id']
                                );
                            @endphp
                            <td>
                                <ul>
                                    <li>
                                        <a href="{{ $url }}">{{ $province['name'] }}</a>
                                    </li>
                                </ul>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
        @endforeach
    </div>
</section>