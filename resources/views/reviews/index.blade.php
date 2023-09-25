@extends('templates.land')

@section('styles')
    <link rel="stylesheet" href="{{ asset('t/v538/images/mosaic/designs/design-incpuhgqw-1654866876_styles.css') }}">
    <link rel="stylesheet" href="{{ asset('g/s3/lp/lpc.v4/css/block_1922851.css') }}">
@endsection

@section('header')
    <div class="container container--u-iuum5rlwz" id="iuum5rlwz_0">
        <div class="section section--u-inxu8791y" id="inxu8791y_0" data-do-section='{"screen":{"scroll":false,"smooth":true}}'>
            <div class="div div--u-isgdfq56b" id="isgdfq56b_0">
                <a
                    href="/"
                    class="link-universal link-universal--u-iobuim118"
                    id="iobuim118_0"
                    data-do-link_universal='{"screen":{"type":"link","popup":"none","eventName":"none","eventElement":"self","eventAction":"","selectedTag":"","linkType":"link","blank":false}}'
                >
                    <div class="imageFit imageFit--u-ib3u1v0gh" id="ib3u1v0gh_0" data-do-image='{"screen":{"objectFit":"cover","lockRatio":true,"maxHeight":1900,"maxWidth":1900}}'>
                        <img
                            data-origin-src="{{ asset('assets/img/chistiyya.jpg') }}"
                            data-size="75x75"
                            src="{{ asset('assets/img/chistiyya.jpg') }}"
                            alt="logo5"
                            title=""
                            class="imageFit__img imageFit__img--u-ig03fb2ff"
                            id="ig03fb2ff_0"
                        />
                        <div class="imageFit__overlay imageFit__overlay--u-ittp067zj" id="ittp067zj_0"></div>
                        <div class="imageFit__zoom imageFit__zoom--u-ikrve87yz" id="ikrve87yz_0">
                            <span image="Array" class="svg_image svg_image--u-ij91ot3kc" id="ij91ot3kc_0" data-do-svg_image='{"screen":{"stretch":true}}'> </span>
                        </div>
                    </div>
                    <div class="rich-text rich-text--u-icj5zh8aq" id="icj5zh8aq_0">
                        <div class="text-block-wrap-div">{{ config('app.name') }}</div>
                    </div>
                    <div class="text text--u-i7z2rnye1" id="i7z2rnye1_0">
                        <span class="text-block-wrap-div">Хозяйственные товары, бытовая химия</span>
                    </div>
                </a>
                <div class="div div--u-ixcb88kgt" id="ixcb88kgt_0">
                    <div class="div div--u-i96ow9220" id="i96ow9220_0">
                        <div class="list list--u-i6390seub" id="i6390seub_0">
                            <div class="list__item list__item--u-i3car0bed" id="i3car0bed_0">
                                <a
                                    href="/"
                                    class="link-universal link-universal--u-ihyeewwvz"
                                    id="ihyeewwvz_0"
                                    data-do-link_universal='{"screen":{"type":"link","popup":"none","eventName":"none","eventElement":"self","eventAction":"","selectedTag":"","linkType":"link","blank":false}}'
                                >
                                    <div class="text text--u-idopc082e" id="idopc082e_0">
                                        <span class="text-block-wrap-div">+7 (861) 262-60-93</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="text text--u-ij4hedd1x" id="ij4hedd1x_0">
                        <span class="text-block-wrap-div">Ждем Вашего звонка</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="div div--u-it6svcs4u" id="it6svcs4u_0">
            <div class="div div--u-icqy1awcl" id="icqy1awcl_0">
                <div class="div div--u-iiv5c7rmv" id="iiv5c7rmv_0">
                    <a
                        role="button"
                        class="link-universal link-universal--u-ilji3h8ds"
                        id="ilji3h8ds_0"  href="{{ route('categories.index'); }}"
                        data-do-link_universal='{"screen":{"type":"button","popup":"i20nssi6m_0","sidepanel":false,"eventName":"none","eventElement":"self","eventAction":"","selectedTag":"","linkType":"link","blank":false}}'
                    >
                        <div class="text text--u-iu0pro5rx" id="iu0pro5rx_0">
                            <span class="text-block-wrap-div">ЗАКАЗАТЬ ONLINE</span>
                        </div>
                    </a>
                    <div class="text text--u-i1uere2vm" id="i1uere2vm_0">
                        <span class="text-block-wrap-div">Оставьте заявку и мы свяжемся с Вами в ближайшее время</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class='section section--u-iyqsb6x9r' id='iyqsb6x9r_0' data-do-section='{"screen":{"scroll":false,"smooth":"1"}}'>
        <div class='container container--u-ibhkb6orm' id='ibhkb6orm_0'>
            <div data-url='/otzyvy-o-nas' class='mosaic-crumbs mosaic-crumbs--u-iwcf1mvng' id='iwcf1mvng_0' data-do-crumbs='{"screen":{"delimiter":"\/"}}'>
                <a href="/" class="mosaic-crumbs__item_link mosaic-crumbs__item_link--u-ipf6t0r47" ><span class="text-block-wrap-div">Главная</span></a><span class="mosaic-crumbs__delimiter mosaic-crumbs__delimiter--u-ifgrzfe4c">/</span><span class="mosaic-crumbs__last mosaic-crumbs__last--u-i642bv3vr"><span class="text-block-wrap-div">Отзывы о нас</span></span>
            </div>
            <h1 class='page-title page-title--u-iwsxusnpi' id='iwsxusnpi_0'>
                Отзывы о нас
            </h1>
            <div class='content content--u-iwikiu4za' id='iwikiu4za_0' data-do-content='{"screen":{"image":false,"gallery":false,"text":false,"headers":false}}'>
                <div class="lpc-content-wrapper"></div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <link rel="stylesheet" href="g/s3/css/submenu/submenu.blue.css">

    <script>var mapKeys = {google: "",yandex: ""};</script><!-- LP requires --><link rel="stylesheet" href="g/s3/lp/lpc.v4/css/form.styles.css" type="text/css"/><link rel="stylesheet" href="g/s3/lp/lpc.v4/css/styles.css" type="text/css"/><script src="g/s3/lp/lpc.v4/js/main.js"></script><div id="lpc-styles-container"></div><!-- LP requires --><script>s3LP.page_blocking = false;s3LP.templateID = 706;</script><script>$(window).on("load", function(){s3LP.init({"is_cms":false});});</script><div class="decor-wrap"><div class="_hide-block" data-block-id="258696307" id="popup_lp_block_258696307">


            <div class="decor-wrap lpc-popup-decor" data-media-source="media-xl"><div class="lpc4-popup-block lpc-popup-form-1 lpc-block" id="_lp_block_258696307" data-block-layout="349306" data-elem-type="block"><div class="lp-block-bg _not_fill"><div class="lp-block-bg__video _lp-video"></div><div class="lp-block-overlay"></div></div><div class="lpc-popup-form-1__top" data-lp-selector=".lpc-popup-form-1__top" data-elem-type="card_container"><span class="lpc-popup-form-1__close lpc4-popup-block__close-btn js-close-popup" data-elem-type="generate" data-lp-controls-list="background" data-lp-selector="._close-line"><span class="_close-line"></span><span class="_close-line"></span></span><div class="lpc-wrap lpc-popup-form-1__wrap"><div class="lpc-popup-form-1__row"><div class="lpc-popup-form-1__content" data-elem-type="card_container" data-lp-selector=".lpc-popup-form-1__content"><div class="lpc-popup-form-1__title-wrap"><div class="lpc-popup-form-1__title lp-header-title-3" data-path="title" data-elem-type="header" data-lp-selector=".lpc-popup-form-1__title">Оставить отзыв</div></div><div class="lp-form-tpl" data-api-url="/my/s3/xapi/public/?method=form/postform&param[form_id]=51845907" data-api-type="form"><form method="post" action="otzyvy-o-nas.html" data-s3-anketa-id="51845907" data-new-inited-upload="1"><input type="hidden" name="params[hide_title]" value="1" /><input type="hidden" name="form_id" value="51845907"><input type="hidden" name="tpl" value="global:lpc4.form.tpl"><div class="lp-form-tpl__item _type-text _required"><div class="lp-label-text lp-header-text-3 lp-form-tpl__item-label" data-elem-type="text" data-lp-selector=".lp-form-tpl__item-label">Имя<span class="lp-alert-text"> *</span></div><div class="lp-form-tpl__item-field"><input type="text" data-elem-type="form" data-lp-selector=".lp-form-tpl__field-text" size="30" data-editable="true" maxlength="100" class="lp-header-text-3 lp-form-tpl__field-text" value=""  name="d[0]" required/></div><div class="lp-alert-text lp-form-tpl__item-error">&nbsp;</div></div><div class="lp-form-tpl__item _type-phone _required"><div class="lp-label-text lp-header-text-3 lp-form-tpl__item-label" data-elem-type="text" data-lp-selector=".lp-form-tpl__item-label">Телефон<span class="lp-alert-text"> *</span></div><div class="lp-form-tpl__item-field"><input type="tel" data-elem-type="form" data-lp-selector=".lp-form-tpl__field-text" size="30" data-editable="true" maxlength="100" class="lp-header-text-3 lp-form-tpl__field-text" value=""  name="d[1]" required/></div><div class="lp-alert-text lp-form-tpl__item-error">&nbsp;</div></div><input type="hidden" size="" maxlength="" data-alias="product_name" value="" name="d[2]" /><div class="lp-form-tpl__item _type-textarea _required"><div class="lp-label-text lp-header-text-3 lp-form-tpl__item-label" data-elem-type="text" data-lp-selector=".lp-form-tpl__item-label">Текст отзыва<span class="lp-alert-text"> *</span></div><div class="lp-form-tpl__item-field"><textarea cols="70" class="lp-header-text-3 lp-form-tpl__field-text lp-form-tpl__field-textarea" rows="7" data-elem-type="form" data-lp-selector=".lp-form-tpl__field-text" data-editable="true" name="d[3]" required></textarea></div><div class="lp-alert-text lp-form-tpl__item-error">&nbsp;</div></div><div class="lp-form-tpl__item _type-checkbox _required"><div class="lp-form-tpl__item-field"><label class="lp-form-tpl__field-checkbox"><input value="Да" name="d[4][]" required type="checkbox" ><span data-editable="true" class="lp-form-tpl__field-checkbox--input" data-elem-type="form" data-lp-selector=".lp-form-tpl__field-checkbox--input"><svg width="10" height="8" viewBox="0 0 10 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill="#fff" d="M9.74237 1.67002C10.1124 1.26004 10.08 0.627701 9.67004 0.257661C9.26005 -0.112378 8.62772 -0.0799944 8.25768 0.329992L3.61172 5.4775L1.76573 3.27989C1.4105 2.85701 0.779718 2.80216 0.356831 3.15738C-0.0660562 3.51261 -0.120907 4.14339 0.234318 4.56628L2.81893 7.6432C3.00494 7.86464 3.27771 7.99471 3.56685 7.99985C3.856 8.00499 4.13322 7.88471 4.32699 7.67002L9.74237 1.67002Z"></svg></span><span class="lp-header-text-3 lp-form-tpl__field-checkbox--text" data-elem-type="text" data-lp-selector=".lp-form-tpl__field-checkbox--text">Я принимаю условия обработки моих <a href="user%3Fmode=agreement.html" target="_blank">персональных данных</a><span class="lp-alert-text"> *</span></span></label></div></div><div class="lp-form-tpl__button-wrapper"><button class="lp-button lpc-button--type-1 lp-form-tpl__button _v2-text" data-elem-type="text" data-lp-selector=".lp-form-tpl__button">Отправить</button></div>
                                            <script>
                                                (function() {
                                                    if (!window.initedCalendarLP) {

                                                        var scriptElement = document.createElement('script'),
                                                            link  = document.createElement('link');

                                                        link.rel  = 'stylesheet';
                                                        link.href = '/g/s3/lp/lpc.v4/plugins/airdatepickerLpc/datepickerLpc.css';
                                                        scriptElement.src= '/g/s3/lp/lpc.v4/plugins/airdatepickerLpc/datepickerLpc.js';
                                                        document.querySelector('head').appendChild(link);
                                                        document.querySelector('head').appendChild(scriptElement);
                                                        window.initedCalendarLP = true;
                                                    }
                                                })();
                                            </script>
                                            <re-captcha data-captcha="recaptcha"
                                                        data-name="captcha"
                                                        data-sitekey="6LcYvrMcAAAAAKyGWWuW4bP1De41Cn7t3mIjHyNN"
                                                        data-lang="ru"
                                                        data-rsize="invisible"
                                                        data-type="image"
                                                        data-theme="light"></re-captcha></form></div></div></div></div></div></div></div></div>


        <div class="lpc-reviews-1 lpc-block _1" id="_lp_block_258696507" data-block-layout="348306" data-elem-type="block"><div class="lp-block-bg _not_fill"><div class="lp-block-bg__video _lp-video"></div><div class="lp-block-overlay"></div></div><div class="lpc-wrap lpc-reviews-1__wrap  three_columns"><div class="lpc-reviews-1__containr" data-lp-selector=".lpc-reviews-1__containr" data-elem-type="container"><div class="lpc-reviews-1__row lpc-reviews-1__title-row"></div><div class="lpc-row  _left lpc-reviews-1__row lpc-reviews-1__slider-row"><div class="lpc-reviews-1__item lpc-col-4-xl lpc-col-4-lg  lpc-col-6-md lpc-col-6-sm lpc-col-12-xs "><div class="lpc-reviews-1__item-inner" data-elem-type="card_container" data-lp-selector=".lpc-reviews-1__item-inner"><div class="lpc-reviews-1-item__text lp-header-text-3" data-elem-type="text" data-lp-selector=".lpc-reviews-1-item__text" data-path="list.0.text">Хотел бы отметить дружелюбный подход и лояльность к клиентам, а это всегда помогает сделать процесс взаимодействия приятным и продуктивным. Здорово, что вы  искренне интересуетесь нашими потребностями и ожиданиями. Сотрудничество стало для меня приятным опытом.</div><div class="lpc-reviews-1-item__body"><div  class="lpc-reviews-1-item__image" data-elem-type="image" data-lp-selector=".lpc-reviews-1-item__image" data-path="list.0.image"><div class="lpc-block__img-inner _1_1"><img src="thumb/2/w2mek9DybIOxT-DHhmmmyQ/180r/d/fgs16_otz_1.webp" alt="Кирилл Яковлев"></div></div><div class="lpc-reviews-1-item__title lp-header-title-6" data-elem-type="text" data-lp-selector=".lpc-reviews-1-item__title" data-path="list.0.subtitle">Кирилл Яковлев</div></div></div></div><div class="lpc-reviews-1__item lpc-col-4-xl lpc-col-4-lg  lpc-col-6-md lpc-col-6-sm lpc-col-12-xs "><div class="lpc-reviews-1__item-inner" data-elem-type="card_container" data-lp-selector=".lpc-reviews-1__item-inner"><div class="lpc-reviews-1-item__text lp-header-text-3" data-elem-type="text" data-lp-selector=".lpc-reviews-1-item__text" data-path="list.1.text">Обращаюсь сюда уже не первый раз, и могу с уверенностью сказать, что вы делаете свою работу великолепно! Ценю высокий профессионализм, ответственность и чуткое отношение к клиенту. Спасибо за отличную работу!</div><div class="lpc-reviews-1-item__body"><div  class="lpc-reviews-1-item__image" data-elem-type="image" data-lp-selector=".lpc-reviews-1-item__image" data-path="list.1.image"><div class="lpc-block__img-inner _1_1"><img src="thumb/2/KLUaQ9S1T_joUoIKX4k4Gw/180r/d/fgs16_otz_4.webp" alt="Александра Сомова"></div></div><div class="lpc-reviews-1-item__title lp-header-title-6" data-elem-type="text" data-lp-selector=".lpc-reviews-1-item__title" data-path="list.1.subtitle">Александра Сомова</div></div></div></div><div class="lpc-reviews-1__item lpc-col-4-xl lpc-col-4-lg  lpc-col-6-md lpc-col-6-sm lpc-col-12-xs "><div class="lpc-reviews-1__item-inner" data-elem-type="card_container" data-lp-selector=".lpc-reviews-1__item-inner"><div class="lpc-reviews-1-item__text lp-header-text-3" data-elem-type="text" data-lp-selector=".lpc-reviews-1-item__text" data-path="list.2.text">Очень благодарен за теплый и профессиональный подход, который я получил. Спасибо за ответственность, открытость и готовность помочь. Всегда буду рекомендовать вас друзьям и знакомым</div><div class="lpc-reviews-1-item__body"><div  class="lpc-reviews-1-item__image" data-elem-type="image" data-lp-selector=".lpc-reviews-1-item__image" data-path="list.2.image"><div class="lpc-block__img-inner _1_1"><img src="thumb/2/tBiVnU73Av5LGxpud3506A/180r/d/fgs16_otz_8.webp" alt="Александр Ягудин"></div></div><div class="lpc-reviews-1-item__title lp-header-title-6" data-elem-type="text" data-lp-selector=".lpc-reviews-1-item__title" data-path="list.2.subtitle">Александр Ягудин</div></div></div></div></div><div class="lpc-reviews-1__buttons-wrap _left"><div class="lpc-reviews-1__buttons"><a href="popup:_lp_block_258696307"data-elem-type="button"data-lp-selector=".lpc-button--type-1"data-link_path="buttons.0.link"data-path="buttons.0.button"class="lp-button lpc-button--type-1 lpc-reviews-1__button _v2-text  lpc_pointer_events_none">Оставить отзыв</a></div></div></div></div></div>

        <div class="lpc-menu-1 lpc-block" id="_lp_block_258696707" data-block-layout="452906" data-elem-type="block"><div class="lp-block-bg _not_fill"><div class="lp-block-bg__video _lp-video"></div><div class="lp-block-overlay"></div></div><div class="lpc-menu-1__wrap lpc-wrap"><div class="lpc-menu-1__inner lpc-row _left"><ul class="lpc-menu-1__list lpc-col-4-xl lpc-col-4-lg lpc-col-4-md lpc-col-12-sm lpc-col-12-xs"  data-lp-selector=".lpc-menu-1__list" data-elem-type="card_container"></ul></div></div></div></div>

    <script>
        let decorWrap = document.querySelector(".decor-wrap");

        if(!!decorWrap) {
            let decorWrapWidth = decorWrap.offsetWidth;

            if (decorWrapWidth < 480) {
                decorWrap.setAttribute("data-media-source", "media-xs");
            } else if (decorWrapWidth < 768) {
                decorWrap.setAttribute("data-media-source", "media-sm");
            } else if (decorWrapWidth < 992) {
                decorWrap.setAttribute("data-media-source", "media-md");
            } else if (decorWrapWidth < 1280) {
                decorWrap.setAttribute("data-media-source", "media-lg");
            } else if (decorWrapWidth >= 1280) {
                decorWrap.setAttribute("data-media-source", "media-xl");
            }
        }

    </script>
@endpush
