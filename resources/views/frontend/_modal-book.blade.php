<!-- Modal -->
<div class="modal fade" id="modalBook" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Book Your Stay With Us</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('book.attempt') }}" method="post" role="form" id="bookForm" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                            <option value="" hidden>-- select type --</option>
                            <option value="table">Table</option>
                            <option value="event">Event</option>
                        </select>

                        @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row gy-4">
                        <div class="col-lg-4 col-md-6">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                id="name" placeholder="Your Name" value="{{ old('name') }}">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                id="email" placeholder="Your Email" value="{{ old('email') }}">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                                id="phone" placeholder="Your Phone" value="{{ old('phone') }}">

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <input type="date" name="date" class="form-control @error('date') is-invalid @enderror"
                                id="date" placeholder="Date" value="{{ old('date') }}">

                            @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <input type="time" class="form-control @error('time') is-invalid @enderror" name="time"
                                id="time" placeholder="Time" value="{{ old('time') }}">

                            @error('time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <input type="number" class="form-control @error('people') is-invalid @enderror"
                                name="people" id="people" placeholder="# of people"
                                value="{{ old('people') }}">

                            @error('people')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">

                        @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="5"
                            placeholder="Message">{{ old('message') }}</textarea>

                        @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="bookForm" class="btn btn-danger">Submit</button>
            </div>
        </div>
    </div>
</div>
