@include('user.layouts.head')
@include('user.layouts.header')

<!-- Start Page Banner -->
<div class="page-banner-area item-bg-2">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-banner-content">
                    <h2>Contact us</h2>
                    <ul class="pages-list">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><span>Contact us</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page Banner -->

<!-- Start Contact Info Area -->
<section class="contact-info-area pt-100 pb-70">
    <div class="container">
   
    </div>
</section>
<!-- End Contact Info Area -->

<!-- Start Contact Area -->
<section class="contact-area pb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="contact-form">
                    <div class="title">
                        <h3>Feel Free to contact us </h3>
                    </div>

                    <form  method="POST" action="{{url('uploadContact')}}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    @if (Auth::id())
                                    <input value="{{Auth::user()->name}}" type="text" name="name" id="name" class="form-control" required >
                                    @else
                                    <input type="text" name="name" id="name" class="form-control" required >
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Your email</label>
                                    @if (Auth::id())
                                    <input value="{{Auth::user()->email}}"  type="email" name="email" id="email" class="form-control" required >
                                    @else
                                    <input type="email" name="email" id="email" class="form-control" required >
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>phone</label>
                                    <input type="text" name="phone" id="phone_number" required  class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>your message</label>
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="5" required ></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <button class="default-btn">
                                    Send the message
                                    <span></span>
                                </button>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="contact-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27814.422039668534!2d47.99937637067242!3d29.37606405632665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fcf9c83ce455983%3A0xc3ebaef5af09b90e!2z2YXYr9mK2YbYqSDYp9mE2YPZiNmK2KrYjCDYp9mE2YPZiNmK2KrigI4!5e0!3m2!1sar!2seg!4v1665664561974!5m2!1sar!2seg" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Contact Area -->

@include('user.layouts.footer')
@include('user.layouts.script')