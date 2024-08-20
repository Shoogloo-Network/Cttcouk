<section class="blog-section fadeInUp animated">
    <div class="container">
        <div class="row">
            <div id="goUp" class="col-md-12">
                <div class="heading-section">Submit a Review</div>
                <div class="blog-form-wrap">
                    <form id="reviewForm" novalidate class="blog-form heading-section">
                        @csrf {{-- Laravel security token --}}
                        <div class="blog-field blog-required">
                            <label class="blog-select-label" for="">Your overall
                                rating<span></span></label>
                            <div class="rating-stars text-left">
                                <ul id="stars">
                                    <li class="star" title="Poor" data-value="1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="star" title="Fair" data-value="2">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="star" title="Good" data-value="3">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="star" title="Excellent" data-value="4">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="star" title="WOW!!!" data-value="5">
                                        <i class="fa fa-star"></i>
                                    </li>
                                </ul>                                
                                <div class="success-box" style="display:none;">
                                    <div class="alert alert-success text-message"></div>
                                </div>
                                <div class="rating-box" id="rating-box" style="display:none;">
                                    <div class="alert alert-danger text-message"></div>
                                </div>
                            </div>
                        </div>
                        <div class="blog-field blog-required">
                            <label class="blog-text-label">Title of your review<span></span></label>
                            <input class="regular-text blog-field-control" id="title" type="text" name="title"
                                placeholder="Summarize your review or highlight any detail" required=""
                                value="">
                        </div>
                        <div class="blog-field blog-required" id="review-submit-success-msg">
                            <label class="blog-textarea-label">Your
                                review<span></span></label>
                            <textarea class="blog-field-control" id="description" name="description" placeholder="Tell people your review"
                                rows="5" required=""></textarea>
                        </div>
                        <div class="blog-field blog-required">
                            <label class="blog-text-label">Your name<span></span></label>
                            <input class="regular-text blog-field-control" id="name" type="text" name="name"
                                placeholder="Tell us your name" required="" value="">
                        </div>
                        <div class="blog-field blog-required">
                            <label class="blog-email-label">Your email<span></span></label>
                            <input class="regular-text blog-field-control" id="email" type="email" name="email"
                                placeholder="Tell us your email" required="" value="">
                        </div>
                        <div class="blog-field ">
                            <div class="blog-field-choice">
                                <input class="blog-field-control blog-check" type="checkbox" value="1"
                                    name="flag" checked>
                                <label class="blog-checkbox-label float-left" for="#">&nbsp;&nbsp;This review is
                                    based on my own experience and is my genuine opinion.<span></span></label>

                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="blog-btnbox">
                            <input type="hidden" id="rating" name="rating" value="">
                            <input type="hidden" id="page_id" name="page_id" value="{{ $pageId }}">
                            <input type="hidden" id="slug" name="slug" value="{{ $slug }}">
                            <button type="submit" class="btn blog-button">Submit your review</button>
                            <div class="clear"></div>
                        </div>
                    </form>                   
                    <div id='thnkyou-msg' style="display:none;">
                        <div class='alert alert-success text-message'>We Appreciate Your Feedback! Your review has been
                            submitted and will be visible after moderation.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</section>
