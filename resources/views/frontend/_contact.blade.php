 <!-- Contact Section -->
 <section id="contact" class="contact section">

     <!-- Section Title -->
     <div class="container section-title" data-aos="fade-up">
         <h2>Contact</h2>
         <p><span>Need Help?</span> <span class="description-title">Contact Us</span></p>
     </div><!-- End Section Title -->

     <div class="container" data-aos="fade-up" data-aos-delay="100">

         <div class="mb-5">
             <iframe style="width: 100%; height: 400px;"
                 src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                 frameborder="0" allowfullscreen=""></iframe>
         </div><!-- End Google Maps -->

         <div class="row gy-4">

             <div class="col-md-6">
                 <div class="info-item d-flex align-items-center">
                     <i class="icon bi bi-geo-alt flex-shrink-0"></i>
                     <div>
                         <h3>Address</h3>
                         <p>A108 Adam Street, New York, NY 535022</p>
                     </div>
                 </div>
             </div><!-- End Info Item -->

             <div class="col-md-6">
                 <div class="info-item d-flex align-items-center">
                     <i class="icon bi bi-telephone flex-shrink-0"></i>
                     <div>
                         <h3>Call Us</h3>
                         <p>+1 5589 55488 55</p>
                     </div>
                 </div>
             </div><!-- End Info Item -->

             <div class="col-md-6">
                 <div class="info-item d-flex align-items-center">
                     <i class="icon bi bi-envelope flex-shrink-0"></i>
                     <div>
                         <h3>Email Us</h3>
                         <p>info@example.com</p>
                     </div>
                 </div>
             </div><!-- End Info Item -->

             <div class="col-md-6">
                 <div class="info-item d-flex align-items-center">
                     <i class="icon bi bi-clock flex-shrink-0"></i>
                     <div>
                         <h3>Opening Hours<br></h3>
                         <p><strong>Mon-Sat:</strong> 11AM - 23PM; <strong>Sunday:</strong> Closed</p>
                     </div>
                 </div>
             </div><!-- End Info Item -->

             <div class="card shadow">
                 <div class="card-body">
                     <form action="{{ route('review.attempt') }}" method="post">
                         @csrf

                         <div class="mb-3">
                             <label for="code">Code Transaction</label>
                             <input type="text" name="code" id="code"
                                 class="form-control @error('code')
                    'is-invalid'
                @enderror"
                                 value="{{ old('code') }}">

                             @error('code')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>

                         <div class="mb-3">
                             <label for="rate">Rating <i class="bi bi-star"></i></label>
                             <select name="rate" id="rate" class="form-select">
                                 <option value="" hidden>-- choose review</option>
                                 <option value="1">1</option>
                                 <option value="2">
                                     2
                                 </option>
                                 <option value="3">
                                     3
                                 </option>
                                 <option value="4">
                                     4
                                 </option>
                                 <option value="5">
                                     5
                                 </option>
                             </select>

                             @error('rate')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>

                         <div class="mb-3">
                             <label for="comment">Comment</label>
                             <textarea name="comment" id="comment" cols="5" rows="5"
                                 class="form-control @error('code')
                    'is-invalid'
                @enderror">{{ old('comment') }}</textarea>

                             @error('code')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>

                         <div class="float-end">
                             <button type="submit" class="btn btn-primary">Submit</button>
                         </div>
                     </form>
                 </div>
             </div>

         </div>

     </div>

 </section><!-- /Contact Section -->
