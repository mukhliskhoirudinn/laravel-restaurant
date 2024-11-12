<!-- Menu Section -->
<section id="menu" class="menu section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Our Menu</h2>
        <p><span>Check Our</span> <span class="description-title">Yummy Menu</span></p>
    </div><!-- End Section Title -->

    <div class="container">

        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">

            <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-starters">
                    <h4>Starters</h4>
                </a>
            </li><!-- End tab nav item -->

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-breakfast">
                    <h4>Breakfast</h4>
                </a><!-- End tab nav item -->

            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-lunch">
                    <h4>Lunch</h4>
                </a>
            </li><!-- End tab nav item -->

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-dinner">
                    <h4>Dinner</h4>
                </a>
            </li><!-- End tab nav item -->

        </ul>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

            <div class="tab-pane fade active show" id="menu-starters">

                <div class="tab-header text-center">
                    <p>Menu</p>
                    <h3>Starters</h3>
                </div>

                <div class="row gy-5">

                    @foreach ($menu_starter as $starter)
                        <div class="col-lg-4 menu-item">
                            <a href="{{ asset('storage/'. $starter->image) }}" class="glightbox">
                                <img src="{{ asset('storage/'. $starter->image) }}" class="menu-img img-fluid"
                                    alt="{{ $starter->name }}"></a>
                            <h4>{{ $starter->name }}</h4>
                            <p class="ingredients">
                                {{ $starter->description }}
                            </p>
                            <p class="price">
                                Rp. {{ number_format($starter->price, 0, ',', '.') }}
                            </p>
                        </div>
                    @endforeach

                </div>
            </div>
            <!-- End Starter Menu Content -->

            <div class="tab-pane fade" id="menu-breakfast">

                <div class="tab-header text-center">
                    <p>Menu</p>
                    <h3>Breakfast</h3>
                </div>

                <div class="row gy-5">

                    @foreach ($menu_breakfast as $breakfast)
                        <div class="col-lg-4 menu-item">
                            <a href="{{ asset('storage/'. $breakfast->image) }}" class="glightbox">
                                <img src="{{ asset('storage/'. $breakfast->image) }}" class="menu-img img-fluid"
                                    alt="{{ $breakfast->name }}"></a>
                            <h4>{{ $breakfast->name }}</h4>
                            <p class="ingredients">
                                {{ $breakfast->description }}
                            </p>
                            <p class="price">
                                Rp. {{ number_format($breakfast->price, 0, ',', '.') }}
                            </p>
                        </div>
                    @endforeach

                </div>
            </div><!-- End Breakfast Menu Content -->

            <div class="tab-pane fade" id="menu-lunch">

                <div class="tab-header text-center">
                    <p>Menu</p>
                    <h3>Lunch</h3>
                </div>

                <div class="row gy-5">

                    @foreach ($menu_lunch as $lunch)
                        <div class="col-lg-4 menu-item">
                            <a href="{{ asset('storage/'. $lunch->image) }}" class="glightbox">
                                <img src="{{ asset('storage/'. $lunch->image) }}" class="menu-img img-fluid"
                                    alt="{{ $lunch->name }}"></a>
                            <h4>{{ $lunch->name }}</h4>
                            <p class="ingredients">
                                {{ $lunch->description }}
                            </p>
                            <p class="price">
                                Rp. {{ number_format($lunch->price, 0, ',', '.') }}
                            </p>
                        </div>
                    @endforeach

                </div>
            </div><!-- End Lunch Menu Content -->

            <div class="tab-pane fade" id="menu-dinner">

                <div class="tab-header text-center">
                    <p>Menu</p>
                    <h3>Dinner</h3>
                </div>

                <div class="row gy-5">

                    @foreach ($menu_dinner as $dinner)
                        <div class="col-lg-4 menu-item">
                            <a href="{{ asset('storage/'. $dinner->image) }}" class="glightbox">
                                <img src="{{ asset('storage/'. $dinner->image) }}" class="menu-img img-fluid"
                                    alt="{{ $dinner->name }}"></a>
                            <h4>{{ $dinner->name }}</h4>
                            <p class="ingredients">
                                {{ $dinner->description }}
                            </p>
                            <p class="price">
                                Rp. {{ number_format($dinner->price, 0, ',', '.') }}
                            </p>
                        </div>
                    @endforeach

                </div>
            </div><!-- End Dinner Menu Content -->

        </div>

    </div>

</section><!-- /Menu Section -->
