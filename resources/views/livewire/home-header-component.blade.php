<div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                        <div class="detail-gallery">
                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                            <!-- MAIN SLIDES -->
                            <div class="product-image-slider">
                                <figure class="border-radius-10">
                                    <img src="assets/imgs/shop/product-16-2.jpg" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="assets/imgs/shop/product-16-1.jpg" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="assets/imgs/shop/product-16-3.jpg" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="assets/imgs/shop/product-16-4.jpg" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="assets/imgs/shop/product-16-5.jpg" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="assets/imgs/shop/product-16-6.jpg" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="assets/imgs/shop/product-16-7.jpg" alt="product image" />
                                </figure>
                            </div>
                            <!-- THUMBNAILS -->
                            <div class="slider-nav-thumbnails">
                                <div><img src="assets/imgs/shop/thumbnail-3.jpg" alt="product image" /></div>
                                <div><img src="assets/imgs/shop/thumbnail-4.jpg" alt="product image" /></div>
                                <div><img src="assets/imgs/shop/thumbnail-5.jpg" alt="product image" /></div>
                                <div><img src="assets/imgs/shop/thumbnail-6.jpg" alt="product image" /></div>
                                <div><img src="assets/imgs/shop/thumbnail-7.jpg" alt="product image" /></div>
                                <div><img src="assets/imgs/shop/thumbnail-8.jpg" alt="product image" /></div>
                                <div><img src="assets/imgs/shop/thumbnail-9.jpg" alt="product image" /></div>
                            </div>
                        </div>
                        <!-- End Gallery -->
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-info pr-30 pl-30">
                            <span class="stock-status out-stock"> Sale Off </span>
                            <h3 class="title-detail"><a href="shop-product-right.html" class="text-heading">Seeds of
                                    Change Organic Quinoa, Brown</a></h3>
                            <div class="product-detail-rating">
                                <div class="product-rate-cover text-end">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                </div>
                            </div>
                            <div class="clearfix product-price-cover">
                                <div class="product-price primary-color float-left">
                                    <span class="current-price text-brand">$38</span>
                                    <span>
                                        <span class="save-price font-md color3 ml-15">26% Off</span>
                                        <span class="old-price font-md ml-15">$52</span>
                                    </span>
                                </div>
                            </div>
                            <div class="detail-extralink mb-30">
                                <div class="detail-qty border radius">
                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                    <input type="text" name="quantity" class="qty-val" value="1" min="1">
                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                </div>
                                <div class="product-extra-link2">
                                    <button type="submit" class="button button-add-to-cart"><i
                                            class="fi-rs-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                            <div class="font-xs">
                                <ul>
                                    <li class="mb-5">Vendor: <span class="text-brand">Nest</span></li>
                                    <li class="mb-5">MFG:<span class="text-brand"> Jun 4.2022</span></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Detail Info -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<header class="header-area header-style-1 header-height-2">
    <div class="mobile-promotion">
        <span>{{ $enteteinfo->flash_info1 }}</span>
    </div>
    {{-- <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-4 col-lg-4">
                    <div class="header-info">

                        <a class="hidden-md-down" href="mailto:{{ $enteteinfo->link }}"><svg
                                style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M22 6C22 4.9 21.1 4 20 4H4C2.9 4 2 4.9 2 6V18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6M20 6L12 11L4 6H20M20 18H4V8L12 13L20 8V18Z" />
                            </svg>&nbsp; {{ $enteteinfo->link }} </a>
                        <a class="hidden-md-down" href="tel: +4915510162098 "><svg style="width:24px;height:24px"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M20,15.5C18.8,15.5 17.5,15.3 16.4,14.9C16.3,14.9 16.2,14.9 16.1,14.9C15.8,14.9 15.6,15 15.4,15.2L13.2,17.4C10.4,15.9 8,13.6 6.6,10.8L8.8,8.6C9.1,8.3 9.2,7.9 9,7.6C8.7,6.5 8.5,5.2 8.5,4C8.5,3.5 8,3 7.5,3H4C3.5,3 3,3.5 3,4C3,13.4 10.6,21 20,21C20.5,21 21,20.5 21,20V16.5C21,16 20.5,15.5 20,15.5M5,5H6.5C6.6,5.9 6.8,6.8 7,7.6L5.8,8.8C5.4,7.6 5.1,6.3 5,5M19,19C17.7,18.9 16.4,18.6 15.2,18.2L16.4,17C17.2,17.2 18.1,17.4 19,17.4V19Z" />
                            </svg>&nbsp; {{ $enteteinfo->telephone }} </a>
                        <a href="#"><svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 2.04C6.5 2.04 2 6.53 2 12.06C2 17.06 5.66 21.21 10.44 21.96V14.96H7.9V12.06H10.44V9.85C10.44 7.34 11.93 5.96 14.22 5.96C15.31 5.96 16.45 6.15 16.45 6.15V8.62H15.19C13.95 8.62 13.56 9.39 13.56 10.18V12.06H16.34L15.89 14.96H13.56V21.96A10 10 0 0 0 22 12.06C22 6.53 17.5 2.04 12 2.04Z" />
                            </svg></a>
                        <a href="#"><svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M22.46,6C21.69,6.35 20.86,6.58 20,6.69C20.88,6.16 21.56,5.32 21.88,4.31C21.05,4.81 20.13,5.16 19.16,5.36C18.37,4.5 17.26,4 16,4C13.65,4 11.73,5.92 11.73,8.29C11.73,8.63 11.77,8.96 11.84,9.27C8.28,9.09 5.11,7.38 3,4.79C2.63,5.42 2.42,6.16 2.42,6.94C2.42,8.43 3.17,9.75 4.33,10.5C3.62,10.5 2.96,10.3 2.38,10C2.38,10 2.38,10 2.38,10.03C2.38,12.11 3.86,13.85 5.82,14.24C5.46,14.34 5.08,14.39 4.69,14.39C4.42,14.39 4.15,14.36 3.89,14.31C4.43,16 6,17.26 7.89,17.29C6.43,18.45 4.58,19.13 2.56,19.13C2.22,19.13 1.88,19.11 1.54,19.07C3.44,20.29 5.7,21 8.12,21C16,21 20.33,14.46 20.33,8.79C20.33,8.6 20.33,8.42 20.32,8.23C21.16,7.63 21.88,6.87 22.46,6Z" />
                            </svg></a>
                        <a href="#"><svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M7.8,2H16.2C19.4,2 22,4.6 22,7.8V16.2A5.8,5.8 0 0,1 16.2,22H7.8C4.6,22 2,19.4 2,16.2V7.8A5.8,5.8 0 0,1 7.8,2M7.6,4A3.6,3.6 0 0,0 4,7.6V16.4C4,18.39 5.61,20 7.6,20H16.4A3.6,3.6 0 0,0 20,16.4V7.6C20,5.61 18.39,4 16.4,4H7.6M17.25,5.5A1.25,1.25 0 0,1 18.5,6.75A1.25,1.25 0 0,1 17.25,8A1.25,1.25 0 0,1 16,6.75A1.25,1.25 0 0,1 17.25,5.5M12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9Z" />
                            </svg></a>
                        <a href="#"><svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M9.04,21.54C10,21.83 10.97,22 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2A10,10 0 0,0 2,12C2,16.25 4.67,19.9 8.44,21.34C8.35,20.56 8.26,19.27 8.44,18.38L9.59,13.44C9.59,13.44 9.3,12.86 9.3,11.94C9.3,10.56 10.16,9.53 11.14,9.53C12,9.53 12.4,10.16 12.4,10.97C12.4,11.83 11.83,13.06 11.54,14.24C11.37,15.22 12.06,16.08 13.06,16.08C14.84,16.08 16.22,14.18 16.22,11.5C16.22,9.1 14.5,7.46 12.03,7.46C9.21,7.46 7.55,9.56 7.55,11.77C7.55,12.63 7.83,13.5 8.29,14.07C8.38,14.13 8.38,14.21 8.35,14.36L8.06,15.45C8.06,15.62 7.95,15.68 7.78,15.56C6.5,15 5.76,13.18 5.76,11.71C5.76,8.55 8,5.68 12.32,5.68C15.76,5.68 18.44,8.15 18.44,11.43C18.44,14.87 16.31,17.63 13.26,17.63C12.29,17.63 11.34,17.11 11,16.5L10.33,18.87C10.1,19.73 9.47,20.88 9.04,21.57V21.54Z" />
                            </svg></a>

                    </div>
                </div>
                <div class="col-xl-5 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                <li>{{ $enteteinfo->flash_info1 }}</li>
                                <li>{{ $enteteinfo->flash_info2 }}</li>
                                <li>{{ $enteteinfo->flash_info3 }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>

                            <li>
                                <a class="language-dropdown-active" href="#">English <i
                                        class="fi-rs-angle-small-down"></i></a>
                                <ul class="language-dropdown">
                                    <li>
                                        <a href="#"><img src="assets/imgs/theme/flag-fr.png"
                                                alt="" />Français</a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="assets/imgs/theme/flag-dt.png"
                                                alt="" />Deutsch</a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="assets/imgs/theme/flag-ru.png"
                                                alt="" />Pусский</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                        <ul>
                            <li><a class="hidden-md-down" href="mailto:{{ $enteteinfo->link }}"><svg
                                        style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M22 6C22 4.9 21.1 4 20 4H4C2.9 4 2 4.9 2 6V18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6M20 6L12 11L4 6H20M20 18H4V8L12 13L20 8V18Z" />
                                    </svg></a></li>
                            <li><a class="hidden-md-down" href="tel: +4915510162098 "><svg
                                        style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M20,15.5C18.8,15.5 17.5,15.3 16.4,14.9C16.3,14.9 16.2,14.9 16.1,14.9C15.8,14.9 15.6,15 15.4,15.2L13.2,17.4C10.4,15.9 8,13.6 6.6,10.8L8.8,8.6C9.1,8.3 9.2,7.9 9,7.6C8.7,6.5 8.5,5.2 8.5,4C8.5,3.5 8,3 7.5,3H4C3.5,3 3,3.5 3,4C3,13.4 10.6,21 20,21C20.5,21 21,20.5 21,20V16.5C21,16 20.5,15.5 20,15.5M5,5H6.5C6.6,5.9 6.8,6.8 7,7.6L5.8,8.8C5.4,7.6 5.1,6.3 5,5M19,19C17.7,18.9 16.4,18.6 15.2,18.2L16.4,17C17.2,17.2 18.1,17.4 19,17.4V19Z" />
                                    </svg></a></li>
                            <li><a href="#"><svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M12 2.04C6.5 2.04 2 6.53 2 12.06C2 17.06 5.66 21.21 10.44 21.96V14.96H7.9V12.06H10.44V9.85C10.44 7.34 11.93 5.96 14.22 5.96C15.31 5.96 16.45 6.15 16.45 6.15V8.62H15.19C13.95 8.62 13.56 9.39 13.56 10.18V12.06H16.34L15.89 14.96H13.56V21.96A10 10 0 0 0 22 12.06C22 6.53 17.5 2.04 12 2.04Z" />
                                    </svg></a></li>
                            <li> <a href="#"><svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M22.46,6C21.69,6.35 20.86,6.58 20,6.69C20.88,6.16 21.56,5.32 21.88,4.31C21.05,4.81 20.13,5.16 19.16,5.36C18.37,4.5 17.26,4 16,4C13.65,4 11.73,5.92 11.73,8.29C11.73,8.63 11.77,8.96 11.84,9.27C8.28,9.09 5.11,7.38 3,4.79C2.63,5.42 2.42,6.16 2.42,6.94C2.42,8.43 3.17,9.75 4.33,10.5C3.62,10.5 2.96,10.3 2.38,10C2.38,10 2.38,10 2.38,10.03C2.38,12.11 3.86,13.85 5.82,14.24C5.46,14.34 5.08,14.39 4.69,14.39C4.42,14.39 4.15,14.36 3.89,14.31C4.43,16 6,17.26 7.89,17.29C6.43,18.45 4.58,19.13 2.56,19.13C2.22,19.13 1.88,19.11 1.54,19.07C3.44,20.29 5.7,21 8.12,21C16,21 20.33,14.46 20.33,8.79C20.33,8.6 20.33,8.42 20.32,8.23C21.16,7.63 21.88,6.87 22.46,6Z" />
                                    </svg></a></li>
                            <li><a href="#"><svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M7.8,2H16.2C19.4,2 22,4.6 22,7.8V16.2A5.8,5.8 0 0,1 16.2,22H7.8C4.6,22 2,19.4 2,16.2V7.8A5.8,5.8 0 0,1 7.8,2M7.6,4A3.6,3.6 0 0,0 4,7.6V16.4C4,18.39 5.61,20 7.6,20H16.4A3.6,3.6 0 0,0 20,16.4V7.6C20,5.61 18.39,4 16.4,4H7.6M17.25,5.5A1.25,1.25 0 0,1 18.5,6.75A1.25,1.25 0 0,1 17.25,8A1.25,1.25 0 0,1 16,6.75A1.25,1.25 0 0,1 17.25,5.5M12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9Z" />
                                    </svg></a></li>
                            <li> <a href="#"><svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M9.04,21.54C10,21.83 10.97,22 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2A10,10 0 0,0 2,12C2,16.25 4.67,19.9 8.44,21.34C8.35,20.56 8.26,19.27 8.44,18.38L9.59,13.44C9.59,13.44 9.3,12.86 9.3,11.94C9.3,10.56 10.16,9.53 11.14,9.53C12,9.53 12.4,10.16 12.4,10.97C12.4,11.83 11.83,13.06 11.54,14.24C11.37,15.22 12.06,16.08 13.06,16.08C14.84,16.08 16.22,14.18 16.22,11.5C16.22,9.1 14.5,7.46 12.03,7.46C9.21,7.46 7.55,9.56 7.55,11.77C7.55,12.63 7.83,13.5 8.29,14.07C8.38,14.13 8.38,14.21 8.35,14.36L8.06,15.45C8.06,15.62 7.95,15.68 7.78,15.56C6.5,15 5.76,13.18 5.76,11.71C5.76,8.55 8,5.68 12.32,5.68C15.76,5.68 18.44,8.15 18.44,11.43C18.44,14.87 16.31,17.63 13.26,17.63C12.29,17.63 11.34,17.11 11,16.5L10.33,18.87C10.1,19.73 9.47,20.88 9.04,21.57V21.54Z" />
                                    </svg></a></li>
                            <li> <a href="#"><svg fill="#a88f8f" height="24px" width="24px" version="1.1"
                                        id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 52 52"
                                        xml:space="preserve" stroke="#a88f8f">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <g>
                                                <g>
                                                    <path
                                                        d="M26,0C11.663,0,0,11.663,0,26c0,4.891,1.359,9.639,3.937,13.762C2.91,43.36,1.055,50.166,1.035,50.237 c-0.096,0.352,0.007,0.728,0.27,0.981c0.263,0.253,0.643,0.343,0.989,0.237L12.6,48.285C16.637,50.717,21.26,52,26,52 c14.337,0,26-11.663,26-26S40.337,0,26,0z M26,50c-4.519,0-8.921-1.263-12.731-3.651c-0.161-0.101-0.346-0.152-0.531-0.152 c-0.099,0-0.198,0.015-0.294,0.044l-8.999,2.77c0.661-2.413,1.849-6.729,2.538-9.13c0.08-0.278,0.035-0.578-0.122-0.821 C3.335,35.173,2,30.657,2,26C2,12.767,12.767,2,26,2s24,10.767,24,24S39.233,50,26,50z">
                                                    </path>
                                                    <path
                                                        d="M42.985,32.126c-1.846-1.025-3.418-2.053-4.565-2.803c-0.876-0.572-1.509-0.985-1.973-1.218 c-1.297-0.647-2.28-0.19-2.654,0.188c-0.047,0.047-0.089,0.098-0.125,0.152c-1.347,2.021-3.106,3.954-3.621,4.058 c-0.595-0.093-3.38-1.676-6.148-3.981c-2.826-2.355-4.604-4.61-4.865-6.146C20.847,20.51,21.5,19.336,21.5,18 c0-1.377-3.212-7.126-3.793-7.707c-0.583-0.582-1.896-0.673-3.903-0.273c-0.193,0.039-0.371,0.134-0.511,0.273 c-0.243,0.243-5.929,6.04-3.227,13.066c2.966,7.711,10.579,16.674,20.285,18.13c1.103,0.165,2.137,0.247,3.105,0.247 c5.71,0,9.08-2.873,10.029-8.572C43.556,32.747,43.355,32.331,42.985,32.126z M30.648,39.511 c-10.264-1.539-16.729-11.708-18.715-16.87c-1.97-5.12,1.663-9.685,2.575-10.717c0.742-0.126,1.523-0.179,1.849-0.128 c0.681,0.947,3.039,5.402,3.143,6.204c0,0.525-0.171,1.256-2.207,3.293C17.105,21.48,17,21.734,17,22c0,5.236,11.044,12.5,13,12.5 c1.701,0,3.919-2.859,5.182-4.722c0.073,0.003,0.196,0.028,0.371,0.116c0.36,0.181,0.984,0.588,1.773,1.104 c1.042,0.681,2.426,1.585,4.06,2.522C40.644,37.09,38.57,40.701,30.648,39.511z">
                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg></a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                <li>{{ $enteteinfo->flash_info1 }}</li>
                                <li>{{ $enteteinfo->flash_info2 }}</li>
                                <li>{{ $enteteinfo->flash_info3 }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>

                            <li>
                                <a class="language-dropdown-active" href="#">Français<i
                                        class="fi-rs-angle-small-down"></i></a>
                                <ul class="language-dropdown">
                                    <li>
                                        <a href="#"><img src="assets/imgs/theme/flag-fr.png"
                                                alt="" />English</a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="assets/imgs/theme/flag-dt.png"
                                                alt="" />Deutsch</a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="assets/imgs/theme/flag-ru.png"
                                                alt="" />Pусский</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">

            <div class="header-wrap header-space-between position-relative">

                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">

                        <div class="logo logo-width-1">
                            <a href="/"><img src="{{ asset('assets/imgs/logo') }}/{{ $enteteinfo->logo_image }}"
                                    alt="logo"></a>
                        </div>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <ul>
                                <li>
                                    <a class="" href="/">Accueil</a>
                                </li>

                                </li>

                                <li>
                                    <a href="{{ route('boutique') }}">Boutique</a>
                                </li>
                                </li>

                                <li>
                                    <a href="/a-propos">A propos</a>
                                </li>

                                <li>
                                    <a href="/contact">Contact</a>
                                </li>
                            </ul>

                        </nav>

                    </div>

                </div>

                <div class="hotline d-none d-lg-flex">
                    <div class="header-action-2">

                        @livewire('header-search-component')
                        @livewire('wishlist-icon-component')
                        @livewire('cart-icon-component')



                        <div class="header-action-icon-2">
                            <a href="#">
                                <img class="svgInject" alt="Nest"
                                    src="{{ asset('assets/imgs/theme/icons/icon-user.svg') }}" />
                            </a>
                            <a href="page-account.html"><span class="lable ml-0"></span></a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                <ul>
                                    @guest
                                        @if (Route::has('login'))
                                            <li><a href="{{ route('login') }}"><i
                                                        class="fi fi-rs-user mr-10"></i>Login</a></li>
                                        @endif
                                        @if (Route::has('register'))
                                            <li><a href="{{ route('register') }}"><i
                                                        class="fi fi-rs-location-alt mr-10"></i>Register</a></li>
                                        @endif
                                    @else
                                        <li><a href="/dashboard"><i
                                                    class="fi fi-rs-user mr-10"></i>{{ Auth::user()->name }}</a></li>
                                        {{-- <li><a href="page-account.html"><i class="fi fi-rs-user mr-10"></i>My
                                                Account</a></li>
                                        <li><a href="page-account.html"><i
                                                    class="fi fi-rs-location-alt mr-10"></i>Order Tracking</a></li>
                                        <li><a href="page-account.html"><i class="fi fi-rs-label mr-10"></i>My
                                                Voucher</a></li>
                                        <li><a href="shop-wishlist.html"><i class="fi fi-rs-heart mr-10"></i>My
                                                Wishlist</a></li>
                                        <li><a href="page-account.html"><i
                                                    class="fi fi-rs-settings-sliders mr-10"></i>Setting</a></li>
                                        <li><a href="page-login.html"><i class="fi fi-rs-sign-out mr-10"></i>Sign
                                                out</a></li> --}}

                                        <li><a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><i
                                                    class="fi fi-rs-sign-out mr-10"></i>Déconnexion</a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="header-action-icon-2 d-block d-lg-none">
                     <div class="burger-icon burger-icon-white">
                         <span class="burger-icon-top"></span>
                         <span class="burger-icon-mid"></span>
                         <span class="burger-icon-bottom"></span>
                     </div>
                 </div>
                  <div class="header-action-right d-block d-lg-none">
                     <div class="header-action-2">

                         <div class="header-action-icon-2">
                             <a class="mini-cart-icon" href="shop-cart.html">
                                 <img alt="Nest" src="assets/imgs/theme/icons/icon-cart.svg" />
                                 <span class="pro-count white">2</span>
                             </a>
                             <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                 <ul>
                                     <li>
                                         <div class="shopping-cart-img">
                                             <a href="shop-product-right.html"><img alt="Nest"
                                                     src="assets/imgs/shop/thumbnail-3.jpg" /></a>
                                         </div>
                                         <div class="shopping-cart-title">
                                             <h4><a href="shop-product-right.html">Plain Striola Shirts</a></h4>
                                             <h3><span>1 × </span>$800.00</h3>
                                         </div>
                                         <div class="shopping-cart-delete">
                                             <a href="#"><i class="fi-rs-cross-small"></i></a>
                                         </div>
                                     </li>
                                     <li>
                                         <div class="shopping-cart-img">
                                             <a href="shop-product-right.html"><img alt="Nest"
                                                     src="assets/imgs/shop/thumbnail-4.jpg" /></a>
                                         </div>
                                         <div class="shopping-cart-title">
                                             <h4><a href="shop-product-right.html">Macbook Pro 2022</a></h4>
                                             <h3><span>1 × </span>$3500.00</h3>
                                         </div>
                                         <div class="shopping-cart-delete">
                                             <a href="#"><i class="fi-rs-cross-small"></i></a>
                                         </div>
                                     </li>
                                 </ul>
                                 <div class="shopping-cart-footer">
                                     <div class="shopping-cart-total">
                                         <h4>Total <span>$383.00</span></h4>
                                     </div>
                                     <div class="shopping-cart-button">
                                         <a href="shop-cart.html">View cart</a>
                                         <a href="shop-checkout.html">Checkout</a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div> --}}
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="/"><img src="{{ asset('assets/imgs/logo') }}/{{ $enteteinfo->logo_image }}"
                            alt="logo"></a>
                </div>


                <div class="header-action-icon-2 d-block d-lg-none">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        @livewire('wishlist-icon-component')
                        @livewire('cart-icon-component')
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="/"><img src="{{ asset('assets/imgs/logo') }}/{{ $enteteinfo->logo_image }}"
                        alt="logo"></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            {{-- <div class="mobile-search search-style-3 mobile-header-border">
                 <form action="#">
                     <input type="text" placeholder="Search for items…" />
                     <button type="submit"><i class="fi-rs-search"></i></button>
                 </form>
             </div> --}}
            @livewire('header-search-component')
            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu font-heading">
                        <li class="menu-item-has-children">
                            <a class="" href="/">Accueil</a>
                        </li>



                        <li class="menu-item-has-children">
                            <a href="{{ route('boutique') }}">Boutique</a>
                        </li>


                        <li class="menu-item-has-children">
                            <a href="/a-propos">A propos</a>
                        </li>

                        <li class="menu-item-has-children">
                            <a href="/contact">Contact</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Language</a>
                            <ul class="dropdown">
                                <li><a href="#">English</a></li>
                                <li><a href="#">French</a></li>
                                <li><a href="#">German</a></li>
                                <li><a href="#">Spanish</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap">
                <div class="single-mobile-header-info">
                    <a href="page-contact.html"><i class="fi-rs-marker"></i> Our location </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="#"><i class="fi-rs-headphones"></i>{{ $enteteinfo->telephone }}</a>
                </div>


            </div>
            <div class="mobile-header-info-wrap">
                <ul>
                    @guest
                        @if (Route::has('login'))
                            <li><a href="{{ route('login') }}"><i class="fi fi-rs-user mr-10"></i>Login</a></li>
                        @endif
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}"><i class="fi fi-rs-location-alt mr-10"></i>Register</a>
                            </li>
                        @endif
                    @else
                        <li><a href="/dashboard"><i class="fi fi-rs-user mr-10"></i>{{ Auth::user()->name }}</a></li>

                        <li><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"><i
                                    class="fi fi-rs-sign-out mr-10"></i>Déconnexion</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest
                </ul>

            </div>
            <div class="mobile-social-icon mb-50">
                <h6 class="mb-15">Follow Us</h6>
                <a href="#"><img src="assets/imgs/theme/icons/icon-facebook-white.svg" alt="" /></a>
                <a href="#"><img src="assets/imgs/theme/icons/icon-twitter-white.svg" alt="" /></a>
                <a href="#"><img src="assets/imgs/theme/icons/icon-instagram-white.svg" alt="" /></a>
                <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest-white.svg" alt="" /></a>
                <a href="#"><img src="assets/imgs/theme/icons/icon-youtube-white.svg" alt="" /></a>
            </div>
            <div class="site-copyright">Copyright 2023 ©. All rights reserved.</div>
        </div>
    </div>
</div>
