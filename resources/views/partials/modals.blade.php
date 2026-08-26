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
<div class="modal fade career-model" id="admission-modal" tabindex="-1" aria-labelledby="admissionModalLabel" aria-hidden="true">
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
                            <input type="text" class="form-control" name="name" placeholder="Enter Your Full Name" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Contact Number</label>
                            <input type="tel" class="form-control" name="phone" placeholder="Enter Your Contact Number" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter Your Email Address" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Interested Course or Certification</label>
                            <input type="text" class="form-control" name="course" placeholder="Enter a Course or Certification of Your Interest">
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
                            <button type="submit" class="btn sm-btn">Submit</button>
                        </div>
                        <input type="hidden" name="source" value="Online Admission Modal">
                        <input type="hidden" name="lead_type" value="admission">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- admission popup start here -->

<div class="modal fade career-model" id="enroll-modal" tabindex="-1" aria-labelledby="admissionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Register Now</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-block">
                    <form class="row g-2 lead-form" method="POST" action="{{ route('subscribers.store') }}">
                        @csrf
                        <div class="col-md-12">
                            <label class="form-label">Enter Interested Course</label>
                            <input type="text" class="form-control" name="course" placeholder="Enter Interested Course">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Your Full Name" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Contact Number</label>
                            <input type="tel" class="form-control" name="phone" placeholder="Enter Your Contact Number" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter Your Email Address" required>
                        </div>
                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn sm-btn">Submit</button>
                        </div>
                        <input type="hidden" name="source" value="Course Enrollment Modal">
                        <input type="hidden" name="lead_type" value="website_enrollment">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Download Brochure popup start here -->

<div class="modal fade career-model" id="brochure-modal" tabindex="-1" aria-labelledby="admissionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Request Brochure</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-block">
                    <form class="row g-2 lead-form" method="POST" action="{{ route('subscribers.store') }}">
                        @csrf
                        <div class="col-md-12">
                            <label class="form-label">Enter Interested Course</label>
                            <input type="text" class="form-control" name="course" placeholder="Enter Interested Course">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Your Full Name" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Contact Number</label>
                            <input type="tel" class="form-control" name="phone" placeholder="Enter Your Contact Number" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter Your Email Address" required>
                        </div>
                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn sm-btn">Submit</button>
                        </div>
                        <input type="hidden" name="source" value="Course Brochure Modal">
                        <input type="hidden" name="lead_type" value="brochure_lead">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade career-model lead-feedback-modal" id="leadFeedbackModal" tabindex="-1" aria-labelledby="leadFeedbackTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="leadFeedbackTitle">Request Submitted</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="lead-feedback-icon" id="leadFeedbackIcon" aria-hidden="true">
                    <i class="fas fa-check"></i>
                </div>
                <p id="leadFeedbackMessage"></p>
                <button type="button" class="btn sm-btn" data-bs-dismiss="modal">Continue</button>
            </div>
        </div>
    </div>
</div>

<!-- Verification  popup start here -->

<div class="modal fade career-model" id="Verification-modal" tabindex="-1" aria-labelledby="admissionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Verification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2>
                    Certificate Not Verified
                </h2>
                <p>
                    No matching records found for the provided Verification ID.
                </p>
                <p>
                    Please contact the administration of Career Institute for assistance.

                </p>
                <ul>
                    <li>Email:<a href="mailto:verifications@career.edu.pk">verifications@career.edu.pk</a></li>
                    <li>Email:<a href="tel:+923144444010">+92-314-4444010</a></li>
                </ul>
                <p>
                    We are here to help you resolve the issue as soon as possible.
                </p>
                <a href="#" class="btn c-btn" data-bs-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>


<!-- Co Space model popup start here -->

<div class="modal fade career-model" id="cospace-modal" tabindex="-1" aria-labelledby="CospaceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/LTXWRabnr9k?si=5NT0gR9ZshUavw3a" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
