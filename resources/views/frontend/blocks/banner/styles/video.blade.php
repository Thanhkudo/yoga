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


    <section id="fell" class="mb-5 pt-lg-5">
        <div class="box_title text-center mb-5">
            <h2 class="title text-uppercase">{{ $title }}</h2>
            <p class="bref">
                {!! $brief !!}
            </p>
        </div>
        <div class="box_list_video d-flex justify-content-center flex-wrap">
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
                    <div class="col-12 col-lg-5 mb-4 mb-lg-0">
                        <div class="item_video">
                            <div class="frame">
                                {!! $video !!}
                            </div>
                            <a href="{{ $url_link }}">
                                <p class="text-right">
                                    {{ $url_link_title }}
                                    <svg width="16" height="12" viewBox="0 0 16 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.8992 6.53367L2.92029 11.2292C2.57616 11.5537 2.0197 11.5537 1.67923 11.2292L0.851848 10.4489C0.507717 10.1243 0.507717 9.59955 0.851848 9.27846L4.38102 5.95019L0.851848 2.62191C0.507717 2.29737 0.507717 1.77258 0.851848 1.45149L1.67557 0.664305C2.0197 0.339763 2.57616 0.339763 2.91663 0.664305L7.89554 5.3598C8.24334 5.68434 8.24334 6.20913 7.8992 6.53367ZM14.9283 5.3598L9.94934 0.664305C9.60521 0.339763 9.04875 0.339763 8.70828 0.664305L7.8809 1.44459C7.53677 1.76913 7.53677 2.29392 7.8809 2.61501L11.4101 5.94328L7.8809 9.27156C7.53677 9.5961 7.53677 10.1209 7.8809 10.442L8.70828 11.2223C9.05241 11.5468 9.60887 11.5468 9.94934 11.2223L14.9283 6.52677C15.2724 6.20913 15.2724 5.68434 14.9283 5.3598Z"
                                            fill="#282829" />
                                    </svg>
                                </p>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
@endif
