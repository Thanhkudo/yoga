@extends('frontend.layouts.default')

@php
    $page_title = $taxonomy->title ?? ($page->title ?? $page->name);
    $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
    
    $title = $taxonomy->json_params->title->{$locale} ?? ($taxonomy->title ?? null);
    $image = $taxonomy->json_params->image ?? null;
    $seo_title = $taxonomy->json_params->seo_title ?? $title;
    $seo_keyword = $taxonomy->json_params->seo_keyword ?? null;
    $seo_description = $taxonomy->json_params->seo_description ?? null;
    $seo_image = $image ?? null;
    
    if ($agent->isDesktop() && $image_background != null) {
        $image_for_screen = $image_background;
    } else {
        $image_for_screen = $image != null ? $image : $web_information->image->background_breadcrumbs ?? '';
    }
@endphp
@push('style')
    
@endpush
@section('content')
    <section id="slider" class="">
        <div id="title" class="page-title">
            <div class="bg_page"
                style="background: url({{ $image_for_screen }});
        background-size: 100% 100%;
        background-repeat: no-repeat;
        height: calc(100vh - 180px);
        max-height: 570px;">
                <div class="container d-flex justify-content-md-end">
                    <div class="col-12 col-md-6 mt_page_title">
                        <h2 class="title">
                            <p class="font-playball grey">{{ $page_title }}</p>
                            <span class="green">YOGA</span> STUDIO
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="bodywrap mt_page_title">
        <div class="container">
            <div class="row">
                <div class="right-content col-lg-8 col-12 order-lg-1">
                    <h2 class="title-page">{{ $title }}</h2>
                    <div class="list-blogs">
                        <div class="d-flex flex-wrap clearfix">
                            @foreach ($posts as $item)
                                @php
                                    $title = $item->json_params->title->{$locale} ?? $item->title;
                                    $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                                    $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                                    // $date = date('H:i d/m/Y', strtotime($item->created_at));
                                    $date = date('d', strtotime($item->created_at));
                                    $month = date('M', strtotime($item->created_at));
                                    $year = date('Y', strtotime($item->created_at));
                                    // Viet ham xu ly lay slug
                                    $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
                                    $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
                                @endphp
                                <div class=" col-sm-6 p-3 p-md-4">
                                    <div class="post-entry clearfix post-wapper">
                                        <div class="post-image img">
                                            <a href="{{ $alias }}">
                                                <img src="{{ $image }}" alt="{{ $title}}" />
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <div class="post-author">Viết bởi: YOGA STUDIO</div>
                                            <hr class="post-line" />
                                            <h2 class="post-title">
                                                <a href="{{ $alias }}">{{ $title }}</a>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        {{ $posts->withQueryString()->links('frontend.pagination.default') }}

                    </div>
                </div>
                @include('frontend.components.sidebar.post')
            </div>
        </div>
    </div>
    </div>
@endsection
