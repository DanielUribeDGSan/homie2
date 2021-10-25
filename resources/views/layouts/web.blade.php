<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Homie</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description"
        content="Urdan Minimal eCommerce Bootstrap 5 Template is a stunning eCommerce website template that is the best choice for any online store.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="canonical" href="https://htmldemo.hasthemes.com/urdan/index.html" />

    <!-- Open Graph (OG) meta tags are snippets of code that control how URLs are displayed when shared on social media  -->
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Urdan - Minimal eCommerce HTML Template" />
    <meta property="og:url" content="https://htmldemo.hasthemes.com/urdan/index.html" />
    <meta property="og:site_name" content="Urdan - Minimal eCommerce HTML Template" />
    <!-- For the og:image content, replace the # with a link of an image -->
    <meta property="og:image" content="#" />
    <meta property="og:description"
        content="Urdan Minimal eCommerce Bootstrap 5 Template is a stunning eCommerce website template that is the best choice for any online store." />
    <!-- Add site Favicon -->
    <link rel="icon" href="{{ asset('assets/images/favicon/cropped-favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" href="{{ asset('assets/images/favicon/cropped-favicon-192x192.png') }}" sizes="192x192" />
    <link rel="apple-touch-icon" href="{{ asset('assets/images/favicon/cropped-favicon-180x180.png') }}" />
    <meta name="msapplication-TileImage" content="{{ asset('assets/images/favicon/cropped-favicon-270x270.png') }}" />

    <!-- All CSS is here
 ============================================ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">


    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/pe-icon-7-stroke.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/easyzoom.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/slinky.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/style.css?ver=1.0.6') }}" />


    <link rel="stylesheet" href="{{ asset('assets/css/colors.css?ver=1.0.6') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/base.css?ver=1.0.6') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/utilidades.css?ver=1.0.6') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style2.css?ver=1.0.6') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/loading.css?ver=1.0.6') }}" />

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('assets/js/vendor/modernizr-3.11.2.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll@15.0.0/dist/smooth-scroll.polyfills.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css"
        integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>


<body>
    <div class="main-wrapper main-wrapper-2">

        <x-preload />

        <x-menu-pc />
        <!-- mini cart start -->
        <div class="sidebar-cart-active">
            <div class="sidebar-cart-all">
                <a class="cart-close" href="#"><i class="pe-7s-close"></i></a>
                <div class="cart-content">

                </div>
            </div>
        </div>

        <main>
            {{ $slot }}
        </main>

        <footer class="footer-area">
            <div class="bg-primary">
                <div class="container">
                    <div class="footer-top pt-80 pb-35">
                        <div class="row">
                            <div
                                class="col-lg-3 col-md-6 col-sm-6 col-12 d-flex align-items-center justify-content-center">
                                <div class="footer-widget footer-about mb-40">
                                    <div class="footer-logo">
                                        <a href="index.html"><img
                                                src="{{ asset('assets/images/logo/logo-blanco.svg') }}"
                                                alt="logo homie"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12 d-flex justify-content-center">
                                <div class="w-auto footer-widget footer-widget-margin-1 footer-list mb-40">
                                    <a class="text-white link_ref">Broker</a>
                                    <div class="footer__espacio-text"></div>
                                    <a class="text-white link_ref">Propietario</a>
                                    <div class="footer__espacio-text"></div>
                                    <a class="text-white link_ref">Inquilino</a>
                                    <div class="footer__espacio-text"></div>
                                    <a class="text-white link_ref">FAQs</a>
                                    <div class="footer__espacio-text"></div>
                                    <a class="text-white link_ref">Términos y Condiciones</a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12 d-flex justify-content-center">
                                <div class="w-auto footer-widget footer-widget-margin-1 footer-list mb-40">
                                    <a class="text-white" href="tel:55000000"><span><svg width="27" height="27"
                                                viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.5901 10.3999L11.9517 3.89155C11.3017 3.14155 10.1101 3.14489 9.35506 3.90155L4.7184 8.54655C3.3384 9.92822 2.94339 11.9799 3.74173 13.6249C8.51109 23.4998 16.4751 31.475 26.3434 36.2582C27.9867 37.0566 30.0367 36.6616 31.4167 35.2799L36.0967 30.5916C36.8551 29.8332 36.8567 28.6349 36.1001 27.9849L29.5667 22.3766C28.8834 21.7899 27.8217 21.8666 27.1367 22.5532L24.8634 24.8299C24.747 24.9519 24.5938 25.0323 24.4273 25.0588C24.2608 25.0853 24.0902 25.0564 23.9417 24.9766C20.2258 22.8367 17.1434 19.7503 15.0084 16.0316C14.9284 15.8828 14.8995 15.7119 14.926 15.5451C14.9525 15.3784 15.033 15.2249 15.1551 15.1082L17.4217 12.8399C18.1084 12.1499 18.1834 11.0832 17.5901 10.3982V10.3999Z"
                                                    stroke="white" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </span> 55 000 000</a>
                                    <div class="footer__espacio-text"></div>
                                    <a href="https://wa.me/5500000000?text=Me%20interesa%20un%20departamento%20a:%20"
                                        target="_blank" class="text-white"><span><svg width="27" height="27"
                                                viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M36.0392 11.0313C34.4106 9.392 32.4728 8.09212 30.3382 7.20701C28.2036 6.32191 25.9146 5.86918 23.6038 5.87506C13.914 5.87506 6.02579 13.7613 6.02188 23.455C6.02188 26.5531 6.83067 29.5768 8.36796 32.244L5.875 41.3522L15.1947 38.9063C17.7726 40.3096 20.6608 41.0454 23.596 41.0467H23.6038C33.2917 41.0467 41.1798 33.1605 41.1838 23.4668C41.1904 21.1569 40.7392 18.8686 39.8562 16.7341C38.9731 14.5997 37.6758 12.6614 36.0392 11.0313ZM23.6038 38.0798H23.5979C20.9806 38.0801 18.4115 37.3759 16.1602 36.0412L15.6275 35.724L10.0972 37.1751L11.5718 31.7838L11.2252 31.2316C9.76188 28.902 8.98725 26.206 8.99071 23.455C8.99463 15.3984 15.5492 8.84389 23.6097 8.84389C25.5293 8.83962 27.4308 9.21613 29.2039 9.95162C30.9771 10.6871 32.5868 11.767 33.9399 13.1287C35.3002 14.484 36.3784 16.0954 37.1122 17.8698C37.8459 19.6443 38.2207 21.5466 38.2149 23.4668C38.211 31.5233 31.6565 38.0798 23.6038 38.0798ZM31.6193 27.1347C31.1786 26.9134 29.0205 25.852 28.6171 25.7051C28.2157 25.5583 27.9239 25.4858 27.6301 25.9245C27.3364 26.3631 26.4943 27.3521 26.2377 27.6458C25.9812 27.9396 25.7247 27.9748 25.286 27.7555C24.8473 27.5362 23.4315 27.0721 21.7532 25.5759C20.447 24.4107 19.5657 22.9733 19.3092 22.5326C19.0526 22.092 19.2817 21.8551 19.503 21.6357C19.7008 21.4399 19.9417 21.1226 20.161 20.8661C20.3804 20.6096 20.4528 20.4274 20.5997 20.1337C20.7466 19.8399 20.6741 19.5834 20.5625 19.3641C20.4528 19.1428 19.5735 16.9808 19.2073 16.1015C18.8529 15.2496 18.4906 15.3632 18.2203 15.3514C17.9404 15.34 17.6603 15.3348 17.3802 15.3358C17.1575 15.3414 16.9383 15.3931 16.7364 15.4874C16.5346 15.5818 16.3544 15.7168 16.2072 15.8841C15.8038 16.3247 14.6699 17.3861 14.6699 19.5481C14.6699 21.7101 16.2444 23.7997 16.4637 24.0934C16.683 24.3872 19.5618 28.8228 23.968 30.7263C25.0177 31.1787 25.8363 31.4489 26.4727 31.6526C27.5244 31.9875 28.482 31.9385 29.2399 31.8269C30.0839 31.7016 31.8386 30.7655 32.2048 29.7393C32.571 28.7131 32.571 27.8338 32.4613 27.6498C32.3517 27.4657 32.056 27.3541 31.6193 27.1347Z"
                                                    fill="white" />
                                            </svg>
                                        </span> 55 000 000</a>
                                    <div class="footer__espacio-text"></div>
                                    <a href="mailto:info@homie.com" class="text-white"><span><svg width="27"
                                                height="27" viewBox="0 0 41 41" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M34.1665 34.1668H6.83317C5.92701 34.1668 5.05797 33.8069 4.41722 33.1661C3.77647 32.5254 3.4165 31.6563 3.4165 30.7502V10.1015C3.45483 9.22139 3.83164 8.39006 4.46829 7.78111C5.10493 7.17216 5.95219 6.83266 6.83317 6.8335H34.1665C35.0727 6.8335 35.9417 7.19347 36.5825 7.83422C37.2232 8.47497 37.5832 9.34401 37.5832 10.2502V30.7502C37.5832 31.6563 37.2232 32.5254 36.5825 33.1661C35.9417 33.8069 35.0727 34.1668 34.1665 34.1668ZM6.83317 13.4413V30.7502H34.1665V13.4413L20.4998 22.5502L6.83317 13.4413ZM8.19984 10.2502L20.4998 18.4502L32.7998 10.2502H8.19984Z"
                                                    fill="white" />
                                            </svg>
                                        </span> info@homie.com</a>
                                </div>
                            </div>
                            <div
                                class="col-lg-3 col-md-6 col-sm-6 col-12 d-flex align-items-center justify-content-center">
                                <div class="w-auto footer-widget footer-widget-margin-1 footer-list mb-40">
                                    <a class="text-white" target="_blank"><svg style="margin-right: 0.8rem"
                                            width="25" height="25" viewBox="0 0 25 25" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7.70853 1.10087C8.91978 1.04511 9.30597 1.03271 12.3914 1.03271C15.4768 1.03271 15.863 1.04614 17.0733 1.10087C18.2835 1.1556 19.1096 1.34869 19.8324 1.62853C20.5893 1.91456 21.276 2.36168 21.8439 2.93994C22.4222 3.50684 22.8683 4.1925 23.1533 4.95043C23.4341 5.67326 23.6262 6.49934 23.682 7.7075C23.7377 8.92081 23.7501 9.30701 23.7501 12.3914C23.7501 15.4768 23.7367 15.863 23.682 17.0743C23.6272 18.2824 23.4341 19.1085 23.1533 19.8314C22.8682 20.5894 22.4214 21.2762 21.8439 21.8439C21.276 22.4222 20.5893 22.8683 19.8324 23.1533C19.1096 23.4341 18.2835 23.6262 17.0753 23.6819C15.863 23.7377 15.4768 23.7501 12.3914 23.7501C9.30597 23.7501 8.91978 23.7367 7.70853 23.6819C6.50038 23.6272 5.67429 23.4341 4.95146 23.1533C4.19345 22.8682 3.50666 22.4214 2.93891 21.8439C2.36104 21.2767 1.91386 20.5902 1.62853 19.8324C1.34869 19.1096 1.15663 18.2835 1.10087 17.0753C1.04511 15.862 1.03271 15.4758 1.03271 12.3914C1.03271 9.30597 1.04614 8.91978 1.10087 7.70956C1.1556 6.49934 1.34869 5.67326 1.62853 4.95043C1.91428 4.19258 2.3618 3.50614 2.93994 2.93891C3.50689 2.36117 4.19298 1.91399 4.95043 1.62853C5.67326 1.34869 6.49935 1.15663 7.7075 1.10087H7.70853ZM16.9814 3.14543C15.7835 3.0907 15.4242 3.07934 12.3914 3.07934C9.35864 3.07934 8.99929 3.0907 7.80146 3.14543C6.69348 3.19603 6.0925 3.38087 5.69184 3.53679C5.16212 3.74331 4.78315 3.98804 4.3856 4.38559C4.00874 4.75222 3.71872 5.19855 3.53679 5.69184C3.38087 6.0925 3.19603 6.69347 3.14543 7.80146C3.0907 8.99929 3.07935 9.35864 3.07935 12.3914C3.07935 15.4242 3.0907 15.7835 3.14543 16.9814C3.19603 18.0893 3.38087 18.6903 3.53679 19.091C3.71853 19.5835 4.00869 20.0306 4.3856 20.3972C4.75217 20.7741 5.19929 21.0643 5.69184 21.246C6.0925 21.402 6.69348 21.5868 7.80146 21.6374C8.99929 21.6921 9.35761 21.7035 12.3914 21.7035C15.4252 21.7035 15.7835 21.6921 16.9814 21.6374C18.0893 21.5868 18.6903 21.402 19.091 21.246C19.6207 21.0395 19.9997 20.7948 20.3972 20.3972C20.7741 20.0306 21.0643 19.5835 21.246 19.091C21.402 18.6903 21.5868 18.0893 21.6374 16.9814C21.6921 15.7835 21.7035 15.4242 21.7035 12.3914C21.7035 9.35864 21.6921 8.99929 21.6374 7.80146C21.5868 6.69347 21.402 6.0925 21.246 5.69184C21.0395 5.16212 20.7948 4.78315 20.3972 4.38559C20.0306 4.00877 19.5843 3.71875 19.091 3.53679C18.6903 3.38087 18.0893 3.19603 16.9814 3.14543ZM10.9406 15.893C11.7508 16.2303 12.6531 16.2758 13.4931 16.0218C14.3332 15.7678 15.059 15.23 15.5467 14.5002C16.0343 13.7705 16.2534 12.8942 16.1667 12.0208C16.0799 11.1475 15.6927 10.3313 15.071 9.71179C14.6748 9.31576 14.1956 9.01252 13.6681 8.8239C13.1405 8.63528 12.5777 8.56597 12.0202 8.62096C11.4626 8.67595 10.9242 8.85387 10.4437 9.14192C9.96318 9.42997 9.5525 9.82098 9.24123 10.2868C8.92996 10.7526 8.72584 11.2817 8.64357 11.8358C8.5613 12.39 8.60292 12.9555 8.76545 13.4917C8.92797 14.0278 9.20734 14.5213 9.58346 14.9365C9.95958 15.3517 10.4231 15.6784 10.9406 15.893ZM8.26304 8.26304C8.80519 7.72089 9.44881 7.29084 10.1572 6.99743C10.8655 6.70403 11.6247 6.55301 12.3914 6.55301C13.1581 6.55301 13.9173 6.70403 14.6257 6.99743C15.334 7.29084 15.9776 7.72089 16.5198 8.26304C17.0619 8.80518 17.492 9.4488 17.7854 10.1572C18.0788 10.8655 18.2298 11.6247 18.2298 12.3914C18.2298 13.1581 18.0788 13.9173 17.7854 14.6257C17.492 15.334 17.0619 15.9776 16.5198 16.5198C15.4249 17.6147 13.9398 18.2298 12.3914 18.2298C10.843 18.2298 9.35795 17.6147 8.26304 16.5198C7.16813 15.4249 6.55301 13.9398 6.55301 12.3914C6.55301 10.843 7.16813 9.35795 8.26304 8.26304ZM19.5247 7.4225C19.659 7.29576 19.7666 7.14336 19.841 6.97432C19.9154 6.80527 19.9551 6.62302 19.9578 6.43835C19.9605 6.25368 19.9261 6.07034 19.8566 5.8992C19.7872 5.72806 19.6841 5.57259 19.5535 5.44199C19.4229 5.3114 19.2675 5.20833 19.0963 5.1389C18.9252 5.06947 18.7419 5.03508 18.5572 5.03777C18.3725 5.04046 18.1903 5.08018 18.0212 5.15457C17.8522 5.22897 17.6998 5.33652 17.573 5.47087C17.3266 5.73215 17.1916 6.0792 17.1969 6.43835C17.2021 6.7975 17.3471 7.14047 17.6011 7.39445C17.8551 7.64844 18.198 7.79344 18.5572 7.79867C18.9163 7.80391 19.2634 7.66897 19.5247 7.4225Z"
                                                fill="white" />
                                        </svg>
                                    </a>
                                    <a class="text-white" target="_blank"><svg style="margin-right: 0.8rem"
                                            width="25" height="25" viewBox="0 0 26 25" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M20.9947 6.90607C21.9204 6.35269 22.613 5.48132 22.9433 4.45466C22.0734 4.97078 21.1218 5.33433 20.1294 5.5296C19.4601 4.8216 18.5765 4.35338 17.6148 4.19713C16.6531 4.04088 15.6668 4.20527 14.8077 4.66495C13.9487 5.12464 13.2647 5.85411 12.8612 6.74092C12.4577 7.62772 12.3571 8.62262 12.5748 9.57227C10.8131 9.48382 9.08962 9.02589 7.51631 8.22821C5.943 7.43052 4.55501 6.31091 3.44244 4.94205C2.87664 5.91797 2.7035 7.07266 2.9582 8.17161C3.21289 9.27056 3.87632 10.2314 4.81375 10.8589C4.11024 10.8363 3.42234 10.6458 2.80739 10.3034V10.3591C2.80759 11.3824 3.16171 12.3741 3.8097 13.1661C4.4577 13.9581 5.35967 14.5015 6.36266 14.7043C5.71012 14.8819 5.02565 14.908 4.36146 14.7807C4.64515 15.6609 5.19654 16.4304 5.93868 16.9821C6.68081 17.5337 7.57666 17.8399 8.50119 17.8579C6.93145 19.09 4.99288 19.7581 2.99739 19.7548C2.6432 19.7548 2.29005 19.7342 1.93896 19.6939C3.96537 20.996 6.32381 21.6871 8.7325 21.6848C10.3915 21.6962 12.0362 21.3778 13.5711 20.7481C15.106 20.1185 16.5005 19.1901 17.6736 18.017C18.8466 16.8438 19.7749 15.4492 20.4044 13.9143C21.0339 12.3793 21.3522 10.7346 21.3406 9.07558C21.3406 8.88352 21.3365 8.69249 21.3272 8.50249C22.1951 7.8753 22.9441 7.0983 23.5391 6.20803C22.7305 6.56639 21.8729 6.80168 20.9947 6.90607Z"
                                                fill="white" />
                                        </svg>
                                    </a>
                                    <a class="text-white" target="_blank"><svg style="margin-right: 0.8rem"
                                            width="25" height="25" viewBox="0 0 11 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_702:64)">
                                                <path
                                                    d="M2.66376 23.7825V12.7658H0V8.79924H2.66376V5.41131C2.66376 2.74904 4.23725 0.304199 7.86291 0.304199C9.33088 0.304199 10.4164 0.458099 10.4164 0.458099L10.3309 4.16217C10.3309 4.16217 9.22382 4.15038 8.01577 4.15038C6.7083 4.15038 6.49883 4.8093 6.49883 5.90294V8.79924H10.4348L10.2635 12.7658H6.49883V23.7825H2.66376Z"
                                                    fill="white" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_702:64">
                                                    <rect width="10.4348" height="23.4783" fill="white"
                                                        transform="translate(0 0.304199)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Lines -->
        <div class="lines">
            <div class="content">
                <div class="line-col"></div>
                <div class="line-col"></div>
                <div class="line-col"></div>
                <div class="line-col"></div>
                <div class="line-col"></div>
            </div>
        </div>

        <!-- Mobile Menu start -->
        <x-menu-movil />
    </div>
    <!-- All JS is here -->
    @livewireScripts

    {{-- Alertas --}}
    {{-- <x-cookies-content /> --}}

    <script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.2.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/aos.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery-ui-touch-punch.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/easyzoom.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/slinky.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/ajax-mail.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"
        integrity="sha512-VQQXLthlZQO00P+uEu4mJ4G4OAgqTtKG1hri56kQY1DtdLeIqhKUp9W/lllDDu3uN3SnUNawpW7lBda8+dSi7w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('assets/js/loading.js') }}"></script>
    <script src="{{ asset('assets/js/validarInput.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/validar-registro.js') }}"></script> --}}
    <script src="{{ asset('assets/js/scroll.js') }}"></script>

    <script src="{{ asset('assets/js/main.js?ver=1.0.6') }}"></script>


    @stack('script')


</body>

</html>
