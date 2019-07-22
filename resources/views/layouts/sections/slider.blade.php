<section class="section_default">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main_slider owl-carousel owl-theme">
                    @foreach($images as $image)
                        <div class="main_slider-item">
                            <img src="" data-src="{{ $image->getPath() }}" class="owl-lazy" alt="{{ $image->alt }}" title="{{ $image->title }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
