<div class="modal fade" id="videoModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div id="popupVideoEmbed" class="ratio ratio-16x9 d-none">
                    <iframe
                        id="popupVideoFrame"
                        src=""
                        title="Campus video"
                        allow="autoplay; encrypted-media; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div>
                <div id="popupVideoPlayer" class="ratio ratio-16x9 d-none">
                    <video id="popupVideo" class="w-100 h-100" controls>
                        <source src="" type="video/mp4">
                    </video>
                </div>
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
                <h5 class="modal-title">Start Your Learning Journey</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-block">
                    <form class="row g-2 lead-form" method="POST" action="{{ route('subscribers.store') }}">
                        @csrf
                        <div class="col-md-12">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Your  Full Name ">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Contact Number</label>
                            <input type="text" class="form-control" name="phone" placeholder="Enter Your  Contact Number ">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Email Address (Optional)</label>
                            <input type="text" class="form-control" name="email" placeholder="Enter Your Email Address">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Interested Course or Certification</label>
                            <input type="text" class="form-control" placeholder="Enter a Course or Certification of Your Interest">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">City of Residence</label>
                            <input type="text" class="form-control" placeholder="Enter Your City of Residence">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Additional Information (Optional)</label>
                            <input type="text" class="form-control" placeholder="Enter Any Additional Information or Questions">
                        </div>
                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn sm-btn" data-bs-dismiss="modal">Submit</button>
                        </div>
                        <input type="hidden" name="source" value="Online Admission Modal">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
