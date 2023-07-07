@if ($block)
    @php
        
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : null;
        $image_background = $block->image_background != '' ? $block->image_background : null;
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    @endphp

    <section id="find_more">
        <div class="box_title text-center mb-3 mb-lg-5">
            <h2 class="title text-uppercase">{{ $title }}</h2>
            <p class="bref">
                {{ $brief }}
            </p>
        </div>
        <div class="col-12 col-md-10 m-auto row">

            @if ($block_childs)
                @foreach ($block_childs as $items)
                    @php
                        $title_childs = $items->json_params->title->{$locale} ?? $items->title;
                        $brief_childs = $items->json_params->brief->{$locale} ?? $items->brief;
                        $content_childs = $items->json_params->content->{$locale} ?? $items->content;
                        $image = $items->image != '' ? $items->image : null;
                        $image_background = $items->image_background != '' ? $items->image_background : null;
                        $video = $items->json_params->video ?? '';
                        $icon = $items->icon ?? '';
                        
                        $url_link = $items->url_link != '' ? $items->url_link : '';
                        $url_link_title = $items->json_params->url_link_title->{$locale} ?? $items->url_link_title;
                        $image_for_screen = null;
                        if ($agent->isDesktop() && $image_background != null) {
                            $image_for_screen = $image_background;
                        } else {
                            $image_for_screen = $image;
                        }
                        // Filter all blocks by parent_id
                        $block_childs2 = $blocks->filter(function ($item, $key) use ($items) {
                            return $item->parent_id == $items->id;
                        });
                    @endphp
                    <div class="item col-12 col-lg-4 pl-md-5 pr-md-5 mb-3">
                        <div class="logo d-flex align-items-center mb-3">
                            <div class="img mr-2">
                                <img src="{{ $image }}" alt="Instagram" />
                            </div>
                            <div class="text">
                                <p>{{ $title_childs }}</p>
                                <p class="text-uppercase">
                                    {!! $brief_childs !!}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            @if ($block_childs2)
                                @foreach ($block_childs2 as $items2)
                                    @php
                                        $title_childs2 = $items2->json_params->title->{$locale} ?? $items2->title;
                                        $brief_childs2 = $items2->json_params->brief->{$locale} ?? $items2->brief;
                                        $content_childs2 = $items2->json_params->content->{$locale} ?? $items2->content;
                                        $image2 = $items2->image != '' ? $items2->image : null;
                                        $image_background2 = $items2->image_background != '' ? $items2->image_background : null;
                                        $video2 = $items2->json_params->video ?? '';
                                        $icon2 = $items2->icon ?? '';
                                        $url_link2 = $items2->url_link != '' ? $items2->url_link : '';
                                        $url_link_title2 = $items2->json_params->url_link_title->{$locale} ?? $items2->url_link_title;
                                    @endphp
                                    <div class="col-6">
                                        {!!$video2!!}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <a href="{{ $url_link }}">
                            <p class="text-right">
                                {{ $url_link_title }}
                                <svg width="19" height="9" viewBox="0 0 19 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.6364 0L13 1.63636L15.7273 4.36364L13 7.09091L14.6364 8.72727L19 4.36364L14.6364 0Z"
                                        fill="#282829" />
                                    <path
                                        d="M4.36364 8.72705L6 7.09069L3.27273 4.36341L6 1.63614L4.36364 -0.000221395L3.81481e-07 4.36341L4.36364 8.72705Z"
                                        fill="#282829" />
                                </svg>
                            </p>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
@endif
