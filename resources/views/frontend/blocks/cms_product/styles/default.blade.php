@if ($block)
    @php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $image = $block->image != '' ? $block->image : url('demos/barber/images/icons/comb3.svg');
        $background = $block->image_background != '' ? $block->image_background : url('demos/seo/images/sections/5.jpg');
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        
        $params['status'] = App\Consts::TAXONOMY_STATUS['active'];
        $params['taxonomy'] = App\Consts::TAXONOMY['product'];
        $params['is_featured'] = true;
        $params['is_type'] = App\Consts::TAXONOMY['product'];
        $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params)->get();
        $rows = App\Http\Services\ContentService::getCmsPost($params)
            ->limit(6)
            ->get();
        
    @endphp

    <section id="course" class="mb-5">
        <div class="box_title text-center mb-3 mb-lg-5">
            <h2 class="title text-uppercase">{{ $title }}</h2>
            <p class="bref">
                {{ $brief }}
            </p>
        </div>
        <div class="box_slick" style="background: url({{ $background }}) 100% 100% no-repeat">
            <div class="slick_lists">
                @foreach ($rows as $item)
                    @php
                        $title = $item->json_params->title->{$locale} ?? $item->title;
                        $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                        $price = $item->json_params->price ?? null;
                        $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                        // Viet ham xu ly lay slug
                        $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->taxonomy_title, $item->taxonomy_id);
                        $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item->id, 'detail', $item->taxonomy_title);
                    @endphp
                    <div class="slick_items">
                        <div class="box bora-30">
                            <h3 class="title text-center text-uppercase">
                                {{$title}}
                            </h3>
                            <hr class="line" />
                            <div class="money text-center"><sup>$</sup>{{$price}}</div>
                            <div class="content">
                                {!!$brief!!}
                            </div>
                            
                            <div class="box_btn text-center">
                                <a href="{{$alias}}"><button class="btn bg_green text-uppercase bora-30 text-uppercase">
                                    xem chi tiêt
                                    <svg class="cl_svg" width="16" height="12" viewBox="0 0 16 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.74295 6.32127L2.76404 11.0168C2.41991 11.3413 1.86345 11.3413 1.52298 11.0168L0.695598 10.2365C0.351467 9.91194 0.351467 9.38715 0.695598 9.06606L4.22477 5.73778L0.695598 2.40951C0.351467 2.08497 0.351467 1.56018 0.695598 1.23909L1.51932 0.451902C1.86345 0.127361 2.41991 0.127361 2.76038 0.451902L7.73929 5.1474C8.08709 5.47194 8.08709 5.99673 7.74295 6.32127ZM14.772 5.1474L9.79309 0.451902C9.44896 0.127361 8.8925 0.127361 8.55203 0.451902L7.72465 1.23218C7.38052 1.55672 7.38052 2.08151 7.72465 2.4026L11.2538 5.73088L7.72465 9.05915C7.38052 9.3837 7.38052 9.90849 7.72465 10.2296L8.55203 11.0099C8.89616 11.3344 9.45262 11.3344 9.79309 11.0099L14.772 6.31436C15.1161 5.99673 15.1161 5.47194 14.772 5.1474Z"
                                            fill="white" />
                                    </svg>
                                </button>
                            </a>
                            </div>
                        </div>
                    </div>
                @endforeach

                
            </div>
        </div>
    </section>

@endif
