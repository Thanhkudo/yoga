@if ($block)
    @php
        
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : null;
        $image_background = $block->image_background != '' ? $block->image_background : null;
        // $video = $block->json_params->video ?? null;
        // $video_background = $block->json_params->video_background ?? null;
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    @endphp
    
    <section id="slider" class="slider-element min-vh-60 min-vh-md-100 include-header">
        <div id="carouselBanner" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @if ($block_childs)
                    @foreach ($block_childs as $item)
                        @php
                            $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                            $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                            $content_childs = $item->json_params->content->{$locale} ?? $item->content;
                            $image = $item->image != '' ? $item->image : null;
                            $image_background = $item->image_background != '' ? $item->image_background : null;
                            $video = $item->json_params->video ?? '';
                            $icon = $item->icon ?? '';
                            
                            $url_link = $item->url_link != '' ? $item->url_link : '';
                            $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                            $image_for_screen = null;
                            if ($agent->isDesktop() && $image_background != null) {
                                $image_for_screen = $image_background;
                            } else {
                                $image_for_screen = $image;
                            }
                            
                        @endphp
                        <div class="carousel-item active" style=" background: url({{$image_for_screen}}); background-size: 100% 100%; height: 100%; ">
                            <div class="container">
                                <div class="frame">
                                    <p class="font-playball white">{{$title_childs}}</p>
                                    <h2 class="title">
                                        {!!$brief_childs!!}
                                    </h2>
                                    <p class="content">
                                        {!!$content_childs!!}
                                    </p>
                                </div>
                            </div>
                            <div class="btn-play">
                                <a class="image-link"
                                    href="{{$video}}"
                                    title="Video">
                                    <i class="{{$icon}}" style="color: #ffffff;"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif


            </div>
            <a class="carousel-control-prev" href="#carouselBanner" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#carouselBanner" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </section>
@endif
