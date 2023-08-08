@if ($block)
    @php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $title_top = $block->json_params->title_top->{$locale} ?? $block->title_top;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $price = $block->json_params->price->{$locale} ?? $block->price;
        $price_old = $block->json_params->price_old->{$locale} ?? $block->price_old;
        $image = $block->image != '' ? $block->image : url('demos/barber/images/icons/comb3.svg');
        $background = $block->image_background != '' ? $block->image_background : url('demos/seo/images/sections/5.jpg');
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        
        $params['status'] = App\Consts::TAXONOMY_STATUS['active'];
        $params['taxonomy'] = App\Consts::TAXONOMY['product'];
        $params['is_type'] = App\Consts::TAXONOMY['product'];
        $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params)->get();
        $rows = App\Http\Services\ContentService::getCmsPost($params)->get();
        // dd($rows);
    @endphp

    <div class="product-popular">
        <div class="product-popular-banner">
            <div class="container">
                <div class="d-flex flex-column product-popular-banner-content">
                    <span class="product-popular-banner-content-top">{{ $title }}</span>
                    <span class="product-popular-banner-content-bottom">{{ $brief }}</span>
                    {{ $content }}
                </div>
            </div>
            <img src="{{ $background }}" alt="" />
        </div>
        <div class="list-product">
            <div class="container d-flex justify-content-between flex-wrap">
                @foreach ($rows as $item)
                                    @php
                                        $title = $item->json_params->title->{$locale} ?? $item->title;
                                        $title_top = $item->json_params->title_top->{$locale} ?? $item->title_top;
                                        $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                                        $price = $item->json_params->price ?? null;
                                        $price_old = $item->json_params->price_old ?? null;
                                        $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                                        // Viet ham xu ly lay slug
                                        $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->taxonomy_title, $item->taxonomy_id);
                                        $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item->id, 'detail', $item->taxonomy_title);
                                    @endphp
                <div class="product-item p-md-3">
                    <div class="position-relative">
                        <img class="product-best-seller-image" width="" src="{{$image}}"
                            alt="product-best-seller" />
                        <div class="icon-product-favorite">
                            <div class="icon icon-normal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="17" viewBox="0 0 18 17" fill="none">
                                    <path d="M8.98557 16.8658C6.4323 15.047 4.04129 13.0658 2.09004 10.6065C1.24465 9.53908 0.523074 8.39908 0.168691 7.0584C-0.578502 4.25322 1.23184 1.43097 4.1096 1.02108C6.08219 0.739283 7.66624 1.48221 8.82759 3.10468C8.8831 3.18154 8.93006 3.25839 8.99838 3.36513C9.04534 3.29682 9.08377 3.24131 9.11793 3.19008C10.2024 1.50356 12.128 0.717934 13.9213 1.02535C15.9665 1.37973 17.4651 2.81434 17.8921 4.77413C18.1526 5.98244 17.922 7.12672 17.4096 8.22829C16.8332 9.47077 16.0177 10.551 15.1126 11.5672C13.3278 13.5611 11.2869 15.2647 9.10085 16.7975C9.06669 16.8146 9.0368 16.8317 8.98557 16.8658ZM8.37073 5.7775C8.35366 5.62379 8.34085 5.4957 8.32377 5.37188C8.04624 2.79727 5.10016 1.40108 2.91409 2.81008C1.46667 3.74086 0.924423 5.48716 1.55206 7.19503C1.95341 8.28807 2.61094 9.23167 3.34533 10.1198C4.64758 11.6995 6.15904 13.0658 7.7559 14.3382C8.16579 14.6627 8.58422 14.9786 8.99838 15.2989C11.0436 13.7703 12.9649 12.1436 14.5917 10.1923C15.2705 9.37683 15.8811 8.51436 16.3081 7.5366C16.6326 6.79368 16.7991 6.02941 16.671 5.2139C16.4105 3.553 15.0058 2.3276 13.2681 2.24648C11.684 2.17389 10.164 3.30963 9.76692 4.8766C9.69433 5.16694 9.66018 5.47008 9.60894 5.7775C9.19905 5.7775 8.78916 5.7775 8.37073 5.7775Z" fill="#616161"/>
                                    </svg>
                            </div>
                            <div class="icon icon-hover">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="16" viewBox="0 0 18 16" fill="none">
                                    <path d="M8.98557 15.9059C6.4323 14.087 4.04128 12.1059 2.09004 9.64654C1.24465 8.57912 0.523074 7.43912 0.168691 6.09844C-0.578502 3.29326 1.23184 0.471009 4.1096 0.0611202C6.08219 -0.220678 7.66624 0.522246 8.82759 2.14472C8.88309 2.22158 8.93006 2.29843 8.99838 2.40517C9.04534 2.33686 9.08377 2.28135 9.11793 2.23012C10.2024 0.543594 12.128 -0.242026 13.9213 0.0653901C15.9665 0.419773 17.4651 1.85438 17.8921 3.81416C18.1526 5.02248 17.922 6.16676 17.4096 7.26833C16.8332 8.51081 16.0177 9.59103 15.1125 10.6072C13.3278 12.6012 11.2869 14.3048 9.10085 15.8376C9.06669 15.8546 9.0368 15.8717 8.98557 15.9059Z" fill="#FFE502"/>
                                    </svg>
                            </div>
                        </div>
                    </div>
                    <div class="text-start mt-3">
                        <div class="brand-name">{{$title_top}}</div>
                        <h3>{{$title}}</h3>
                        <p>{{$brief}}</p>
                        <div class="btn-price">
                            <div class="my-3">
                                <span class="current-price">{{$price}}</span>
                                <span class="origin-price">{{$price_old}}</span>
                            </div>
                            <button class="btn-add-to-cart">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                    <path
                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                                <span> Add to Cart </span>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
