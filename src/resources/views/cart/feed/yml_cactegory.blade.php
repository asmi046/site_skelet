@php
    echo '<?xml version="1.0" encoding="UTF-8"?>';
@endphp

<yml_catalog date="{{ date("Y-m-d\TH:i:sP") }}">
<shop>
    <name>KartaSveta</name>
    <company>Магазин "Краски и штукатурки"</company>
    <url>https://xn--80aaxbgbbb2cfgocld8e.xn--p1ai/</url>
    <currencies>
        <currency id="RUR" rate="1"/>
    </currencies>

    <categories>
        @foreach ($all_cat as $item)
            <category id="{{$item->id}}">{{$item->name}}</category>
        @endforeach
    </categories>

    <offers>
        @foreach ($cat_product as $item)
            @php

                if (empty($category)) {
                    $cat = $item->category_tovars()->first();
                    if (!empty($cat))
                        $cat = $cat["id"];
                    else
                        continue;
                } else {
                    $cat = $category->id;
                }

            @endphp

            @foreach ($item->tovar_prices as $price_item)
                <offer id="{{$item->sku}}_{{$price_item->id}}" available="true">
                    <name>{{$item->title}} {{$price_item->volume}}{{$price_item->ed_izm}}</name>
                    <url>{{route('product', $item->slug)}}</url>

                    @if(Storage::disk('local')->exists('public/products_galery/'.$item->img))
                        <picture>{{((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') ."://". $_SERVER['HTTP_HOST']}}{{Storage::url('public/products_galery/'.$item->img)}}</picture>
                    @endif

                    <picture>{{route('home').$item->img}}</picture>

                    <price>{{$price_item->price}}</price>

                    @if (!empty($price_item->price_old))
                        <oldprice>{{$price_item->price_old}}</oldprice>
                    @endif

                    <description>{{$item->description}}</description>
                    <currencyId>RUR</currencyId>

                    <categoryId>{{ $cat }}</categoryId>



                    <delivery>true</delivery>
                    <store>true</store>
                    <pickup>true</pickup>
                </offer>
            @endforeach


        @endforeach
    </offers>
    <gifts>
        <!-- подарки не из прайс‑листа -->
    </gifts>

</shop>

</yml_catalog>
