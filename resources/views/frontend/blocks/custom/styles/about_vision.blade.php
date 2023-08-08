@if ($block)
    @php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $image_background = $block->image_background != '' ? $block->image_background : '';
        // $icon = $block->icon != '' ? $block->icon : '';
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
        
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
        // dd($block_childs)
    @endphp

    <div class="our-policy">
        <div class="container px-0">
            <div class="d-flex scroll-box-mb row px-2" style="flex-wrap: nowrap;">
                @if ($block_childs)
                    @foreach ($block_childs as $item)
                        @php
                            $title_child = $item->json_params->title->{$locale} ?? $item->title;
                            $icon = $item->json_params->icon->{$locale} ?? $item->icon;
                            $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                            $content_child = $item->json_params->content->{$locale} ?? $item->content;
                            $image_child = $item->image != '' ? $item->image : null;
                            $url_link = $item->url_link != '' ? $item->url_link : 'javascript:void(0)';
                            $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                            $icon = $item->icon != '' ? $item->icon : '';
                            $style = $item->json_params->style ?? '';
                        @endphp
                        <div class="col-6 col-md-4 col-lg-3 col-xl-3 box-policy d-flex py-0 py-md-3 py-lg-3 px-3">
                            <div class="icon me-2">
                                {!! $icon !!}
                            </div>
                            <div class="vertical-line mx-2"></div>
                            <p class="ms-2">{{ $title_child }}</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endif
