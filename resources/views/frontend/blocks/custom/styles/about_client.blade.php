@if ($block)
    @php
        
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $image_background = $block->image_background != '' ? $block->image_background : '';
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

    <section class="slide_content mt_page_title">
        <div class="container">
            <div class="box_title text-center mb-3 mb-lg-5">
                <h2 class="title text-uppercase">{{ $title }}</h2>
                <p class="bref">{{ $brief }}</p>
            </div>
            <div class="d-flex flex-wrap justify-content-between mt-4">
                @if ($block_childs)
                    @foreach ($block_childs as $item)
                        @php
                            $title_child = $item->json_params->title->{$locale} ?? $item->title;
                            $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                            $content_child = $item->json_params->content->{$locale} ?? $item->content;
                            $image_child = $item->image != '' ? $item->image : null;
                            $url_link = $item->url_link != '' ? $item->url_link : 'javascript:void(0)';
                            $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                            $icon = $item->icon != '' ? $item->icon : '';
                            $style = $item->json_params->style ?? '';
                        @endphp

                        <div class="box-contact-item col-12 col-lg-4 text-center pb-3 mt-5">
                            <div class="d-flex justify-content-center align-items-center d-lg-block">
                                <div class="box_img mr-4 mr-lg-0">
                                    <img width="100" src="{{$image_child}}" alt="{{$title_child}}" />
                                </div>
                                <p class="title font-weight-bold mt-lg-4">{{$title_child}}</p>
                            </div>
                            <div class="ml-4 ml-lg-0 mt-4">
                                <p class="time">{!!$brief_child!!}</p>
                                <p class="day">{!!$content_child!!}</p>
                            </div>
                            <a href="{{$url_link}}"><div class="btn-contact btn bora-30 btn-dark mt-3">
                                {{$url_link_title}}
                            </div>
                          </a>
                        </div>
                    @endforeach
                @endif


            </div>
        </div>
    </section>
@endif
