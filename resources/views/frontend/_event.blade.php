<!-- Events Section -->
<section id="events" class="events section">

    <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 1
                }
              }
            }
          </script>
            <div class="swiper-wrapper">

                @forelse ($events as $event)
                    <div class="swiper-slide event-item d-flex flex-column justify-content-end"
                        style="background-image: url({{ asset('storage/'. $event->image) }})">
                        <h3>{{ $event->name }}</h3>
                        <div class="price align-self-start">Rp. {{ number_format($event->price, 0, ',', '.') }}</div>
                        <p class="description">
                            {{ $event->description }}
                        </p>
                    </div>
                @empty
                    <h3 class="text-center">No Event Available</h3>
                @endforelse

            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>

</section><!-- /Events Section -->
