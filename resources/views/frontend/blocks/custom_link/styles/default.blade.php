@if ($block)
    @php
        
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $image_background = $block->image_background != '' ? $block->image_background : '';
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->url_link_title != '' ? $block->url_link_title:'';
        $url_link_more = $block->json_params->url_link ?? '';
        $url_link_title_more = $block->json_params->url_link_title ?? '';
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
    <section id="introduce" class="introduce mb-5 mb-lg-0">
        <div class="bg d-flex flex-wrap justify-content-lg-center" style="background: url({{$image_background}});
        background-size: 100%; background-repeat: no-repeat">
          <div class="col-12 col-lg-6 img position-relative">
            <img class="lazyload" src="{{ asset('images/load.gif') }}" data-src="{{$image}}"
                                alt="{{ $title }}"/>
          </div>
          <div class="col-12 col-lg-6">
            <div class="content">
              <h3 class="title">
                {!!$title!!}
              </h3>
              <p class="text-justify mb-5 bref">
                {!!$content!!}
              </p>
              <div class="box_btn text-center">
                
                <a href="{{$url_link}}"
                  ><button
                    class="mr-lg-4 mb-3 mb-lg-0 bora-30 font-weight-bold text-uppercase btn btn-light"
                  >
                    {{$url_link_title}}
                  </button></a
                >
                <a href="{{$url_link_more}}"
                  ><button
                    class="mr-lg-4 mb-3 mb-lg-0 bora-30 font-weight-bold text-uppercase btn btn-dark"
                  >
                  {{$url_link_title_more}}
                  </button></a
                >
              </div>
            </div>
          </div>
        </div>
      </section>
@endif
