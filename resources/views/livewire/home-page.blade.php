<div>
    <main class="site-main">

        <!--  ======================= Start Banner Area =======================  -->
        <section class="site-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 site-title">
                        <h3 class="title-text">Hey</h3>
                        <h1 class="title-text text-uppercase">I am {{ $profile->name ?? '' }}</h1>
                        <h4 class="title-text text-uppercase">{{ $profile->title ?? '' }}</h4>
                        <div class="site-buttons">
                            <div class="d-flex flex-row flex-wrap">
                                <button type="button" class="btn button primary-button mr-4 text-uppercase">hire
                                    me
                                </button>
                                <a href="{{ getFile($profile->cv ?? '')  }}" target="_blank"
                                   class="btn button secondary-button text-uppercase">
                                    Get cv
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 banner-image">
                        <img src="{{ getFile($profile->image ?? '') }}" alt="banner-img" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>
        <!--  ======================= End Banner Area =======================  -->

        <!--  ========================= About Area ==========================  -->
        <section class="about-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="about-image">
                            <img src="{{ getFile($information->image ?? '') }}" alt="About us" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 about-title">
                        <h2 class="text-uppercase pt-5">
                            <span>{{ $information->title ?? '' }}</span>
                        </h2>
                        <div class="paragraph py-4 w-75">
                            <p class="para">
                                {{ $information->about_you ?? '' }}
                            </p>
                        </div>
                        <a href="{{ getFile($profile->cv ?? '')  }}" target="_blank" type="button"
                           class="btn button primary-button text-uppercase">Download cv</a>
                    </div>
                </div>
            </div>
        </section>
        <!--  ========================= End About Area ==========================  -->

        <!--  ======================== Brand Area ==============================  -->
        <section class="brand-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-lg-12 col-md-12">
                        <div class="first-row row">
                            @foreach($brands as $brand)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-brand">
                                        <img src="{{ getFile($brand->image) }}" alt="Brand Image">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12 col-md-12">
                        <div class="experience-area">
                            <div class="d-flex flex-row years-area">
                                <h2 class="p-3 years">{{ $profile->experience ?? 0 }}</h2>
                                <h2>
                                    <span>Years</span>
                                    <span>Experience</span>
                                    <span>Working</span>
                                </h2>
                            </div>
                            <div class="d-flex flex-row flex-wrap call-area">
                                <span><x-icons.phone/></span>
                                <div class="call-now">
                                    <a href="tel:123-456-7890" class="text-uppercase h4 font-roboto ml-3">Call Now</a>
                                    <span class="font-roboto py-2">{{ $profile->phone ?? '' }}</span>
                                </div>
                            </div>
                            <div class="bg-panel"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--  ======================== End Brand Area ==============================  -->

        <!--  ====================== Start Services Area =============================  -->
        <section class="services-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center services-title">
                        <h1 class="text-uppercase title-text">Services Offers</h1>
                        <p class="para">
                            There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form, by injected humour
                        </p>
                    </div>
                </div>
                <div class="container services-list">
                    <div class="row">
                        @foreach($services as $service)
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="services">
                                    <div class="sevices-img text-center py-4">
                                        <img src="{{ getFile($service->image) }}" alt="Services-1">
                                    </div>
                                    <div class="card-body text-center">
                                        <h5 class="card-title text-uppercase font-roboto">
                                            {{ $service->title }}
                                        </h5>
                                        <p class="card-text text-secondary">
                                            {{ $service->desc }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!--  ====================== End Services Area =============================  -->

        <!--  ======================= Project Area =============================  -->
        <section class="project-area">
            <div class="container">
                <div class="project-title pb-5">
                    <h1 class="text-uppercase title-h1">Recently Done Project</h1>
                    <h1 class="text-uppercase title-h1">Quality Work</h1>
                </div>

                <div class="button-group">
                    <button type="button" class="active" id="btn1" data-filter="*">All</button>
                    @foreach($categories as $category)
                        <button type="button" data-filter=".{{$category->title}}">{{ $category->title }}</button>
                    @endforeach
                </div>

                <div class="row grid">
                    @foreach($categories as $category)
                        @foreach($category->campaigns as $campaign)
                            <div class="col-lg-4 col-md-6 col-sm-12 element-item {{ $category->title }}">
                                <div class="our-project">
                                    <div class="img">
                                        <a class="test-popup-link" href="{{ getFile($campaign->image) }}">
                                            <img src="{{ getFile($campaign->image) }}" alt="portfolio-1"
                                                 class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="title py-4">
                                        <h4 class="text-uppercase">{{ $campaign->title }}</h4>
                                        <span class="text-secondary">IDEA: {{ $campaign->idea }}</span>
                                        <br>
                                        <span class="text-secondary">CONCENPT: {{ $campaign->concept }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach

                </div>
            </div>
        </section>
        <!--  ======================= End Project Area =============================  -->

        <!--  ======================== Clients Area ==============================  -->
        <section class="about-area">
            <div class="container">
                <div class="row text-center">
                    <div class="col-12">
                        <div class="about-title">
                            <h1 class="text-uppercase title-h1">Client Say about me</h1>
                            <p class="para">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellendus, deleniti
                                recusandae. Esse incidunt rem repellendus ab voluptates maxime? Nemo, numquam!
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container carousel py-lg-5">
                <div class="owl-carousel owl-theme">
                    @foreach($clients as $client)
                        <div class="client row">
                            <div class="col-lg-4 col-md-12 client-img">
                                <img src="{{ getFile($client->image) }}" alt="img1"
                                     class="img-fluid">
                            </div>
                            <div class="col-lg-8 col-md-12 about-client">
                                <h4 class="text-uppercase">{{ $client->title }}</h4>
                                <p class="para">{{ $client->desc }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </section>
        <!--  ======================== End About Me Area ==============================  -->

        <!--  ========================== Subscribe me Area ============================  -->
        <section class="subscribe-us-area">
            <div class="container subscribe">
                <div class="row">
                    <div class="col-lg-12 text-center subscribe-title">
                        <h4 class="text-uppercase">Get Update From anywhere</h4>
                        <p class="para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam,
                            consequuntur.</p>
                    </div>
                </div>
                <div class="d-sm-flex justify-content-center">
                    <form class="w-50">
                        <div class="row d-flex flex-row flex-wrap">
                            <div class="col input-textbox">
                                <input type="text" wire:model="contact.email" class="form-control" placeholder="Email" @error('contact.email') is-invalid @enderror>
                                <span class="text-danger">@error('contact.email'){{ $message }}@enderror</span>
                            </div>
                            <div class="col">
                                <div class="btn-submit">
                                    <button  type="button" class="btn btn-success float-right" wire:click="sub">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!--  ========================== End Subscribe me Area ============================  -->

    </main>
</div>
