<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet" />

<link rel="stylesheet" href="{{ asset('themes/frontend/css/header.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/css/hero-background.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/css/our-policy.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/css/form-product-best-seller.css?v=2') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/css/the-most-wanted-dimensions.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/css/product-category.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/css/product-popular.css') }}?ver={{ $ver }}"
    type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/css/our-featured.css') }}?ver={{ $ver }}"
    type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/css/our-testimonial.css') }}?ver={{ $ver }}"
    type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/css/box-softwarecar.css') }}?ver={{ $ver }}"
    type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/css/subscription-new-offe.css') }}?ver={{ $ver }}"
    type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/css/our-discover.css') }}?ver={{ $ver }}"
    type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/css/footer.css') }}?ver={{ $ver }}" type="text/css" />


<style>
    body {
        background: #fff;
        font-family: "Poppins", sans-serif;
    }

    a {
        color: #fff;
        text-decoration: none;
    }

    a:hover {
        text-decoration: none;
        color: #fff;
    }

    img:not(.icon) {
        width: 100%;
    }

    .product-item {
        border-radius: 10px;
        background: #fff;
        padding: 30px;
        margin-right: 0px;
        line-height: 27px;
    }

    .product-item .box-product-image img {
        max-width: 100%;
        max-height: 100%;
        object-fit: cover;
    }

    .product-item .icon-product-favorite {
        position: absolute;
        top: 20px;
        right: 15px;
        width: 18px;
    }

    .product-item .icon-product-favorite .icon-hover,
    .product-item .icon-product-favorite:hover .icon-normal {
        display: none;
    }

    .product-item .icon-product-favorite:hover .icon-hover,
    .product-item .icon-product-favorite .icon-normal {
        display: block;
    }

    .product-item .brand-name {
        color: #969595;
        font-size: 10px;
        font-weight: 400;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    .product-item h3 {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 0;
    }

    .product-item p {
        color: #616161;
        font-size: 14px;
        font-weight: 400;
        margin-top: 5px;
        min-height: 81px;
    }

    .product-item .current-price {
        font-size: 20px;
        font-weight: 600;
        margin: 15px 0px;
    }

    .product-item .origin-price {
        color: #969595;
        font-size: 16px;
        font-weight: 400;
        text-decoration: line-through;
    }

    .product-item .btn-add-to-cart {
        border-radius: 3px;
        background: #ffe502;
        color: #000;
        padding: 7px 15px;
        border: none;
    }

    .product-item .btn-add-to-cart span {
        line-height: 16px;
        font-size: 14px;
        font-weight: 500;
    }

    .product-best-selle-title .title {
        background-size: 80% 100%;
        background-repeat: no-repeat;
        background-position: center center;
        padding: 10px;
        font-size: 20px;
        font-weight: 500;
        margin-top: 50px;
    }

    @media screen and (min-width: 768px) {

        .product-item .box-product-image,
        .position-relative {
            width: auto;
            height: auto;
            padding: 25px;
        }

        .product-item {
            padding: 100%;
        }

        .product-item p {
            width: 70%;
        }
    }

    @media screen and (min-width: 992px) {
        .product-item p {
            width: 100%;
        }

        .product-item {
            margin: 0px 40px;
        }
    }

    @media screen and (min-width: 1200px) {
        .product-item {
            margin: auto;
        }

        .product-item p {
            width: 70%;
        }
    }
</style>


@isset($web_information->source_code->header)
    {!! $web_information->source_code->header !!}
@endisset
