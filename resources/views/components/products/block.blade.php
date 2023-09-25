<div class="products__item">
    <div class="img">
        <img src="/thumb/2/5j3-0qrgrLOpaedx70-u9g/1900r1900/d/tb_1.png" alt="">
    </div>
    <div class="title">
        {{ $product->title }} {{ $product->volume }} {{ $product->volume_text }}
    </div>
    <div class="d-flex justify-content-between align-items-center">
        <a href="{{ route('products.show', $product->getSlug()) }}" class="text-decoration-none">
            <div role="button" class="link-universal link-universal--u-igob89vwu" id="igob89vwu_0" data-do-link_universal="{&quot;screen&quot;:{&quot;type&quot;:&quot;button&quot;,&quot;popup&quot;:&quot;i20nssi6m_0&quot;,&quot;sidepanel&quot;:false,&quot;eventName&quot;:&quot;none&quot;,&quot;eventElement&quot;:&quot;self&quot;,&quot;eventAction&quot;:&quot;&quot;,&quot;selectedTag&quot;:&quot;&quot;,&quot;linkType&quot;:&quot;link&quot;,&quot;blank&quot;:false}}">
                <div class="text text--u-i6be7m6qp" id="i6be7m6qp_0">
                    <span class="text-block-wrap-div">Посмотреть</span>
                </div>
            </div>
        </a>
        <div class="price">
            {{ $product->volume }} {{ $product->volume_text }} / <br> {{ $product->price_1 }} руб.
        </div>
    </div>
</div>
