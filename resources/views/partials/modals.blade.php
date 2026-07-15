<div class="modal fade" id="videoModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-0">
                <video id="popupVideo" width="100%" controls autoplay>
                    <source src="" type="video/mp4">
                </video>
            </div>
        </div>
    </div>
</div>

<!-- gallery model start here -->
<div class="modal fade" id="galleryModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="swiper popupSlider">
                    <div class="swiper-wrapper"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- admission popup start here -->
<div class="modal fade" id="admission-modal" tabindex="-1" aria-labelledby="admissionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-block">
                    <div class="img-hold">
                        <img src="{{ asset('assets/images/img38.png') }}" alt="">
                    </div>
                    <h2>Please Complete The Following Admission Form</h2>
                    <form class="row g-2">
                        <div class="col-md-4">
                            <label class="form-label">Course Intersted</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Primary Contact Number</label>
                            <input type="number" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Gender</label>
                            <select class="form-select">
                                <option selected>Choose...</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Education</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Guardian Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Guardian Contact Number</label>
                            <input type="number" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Preferred Campus</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Countries</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">City</label>
                            <select class="form-select">
                                <option selected>Choose...</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Date Of Birth</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Postal Address</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Remarks</label>
                            <textarea rows="3" class="form-control"></textarea>
                        </div>
                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn sm-btn" data-bs-dismiss="modal">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>