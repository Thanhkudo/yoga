@if ($block)
    @php
        
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $icon = $block->json_params->icon->{$locale} ?? $block->icon;
        $image = $block->image != '' ? $block->image : '';
        $image_background = $block->image_background != '' ? $block->image_background : $web_information->image->background_breadcrumbs ?? '';
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $image_for_screen = null;
        if ($agent->isDesktop() && $image_background != null) {
            $image_for_screen = $image_background;
        } else {
            $image_for_screen = $image;
        }
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
        
    @endphp

    <div class="row m-0 subscription-new-offe">
        <div class="col-12 col-md-6 subscription-new-offe-right" style="background: url({{ $image }});background-size: cover;"></div>
        <div class="col-12 col-md-6 subscription-new-offe-left">
            <div class="title">
                <span class="title-top">{{ $url_link_title }}</span>
                <span class="title-bottom"> {{ $brief }} </span>
                {!! $content !!}
            </div>
            <div class="form-send-mail" style="margin-top: 30px;">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">
                        {!! $icon !!}
                    </span>
                    <input type="text" class="form-control ps-0" placeholder="Your Email..." />
                    <button class="btn btn-outline-secondary py-3" type="button">
                        Subscribe
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif
