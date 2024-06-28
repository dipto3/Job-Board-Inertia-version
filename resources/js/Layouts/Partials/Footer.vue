<template>
    <div class="footer-top-section section">
    <div class="container">
        <div class="footer-widget-wrap row">

            <!-- Footer Widget Start -->
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="footer-widget">
                    <div class="footer-widget-about">
                        <img src="assets/images/logo/logo-light.png" alt="">
                        <p>Lorem ipsum dolor sit amet consecte tur adipisicing elit. Maiores officiis quod quo id
                            inventore quis.</p>

                        <ul class="footer-socail">
                            <li><a target="_blank" rel="noopener" href="https://www.facebook.com/"
                                    class="fa fa-facebook"></a></li>
                            <li><a target="_blank" rel="noopener" href="https://www.twitter.com/"
                                    class="fa fa-twitter"></a></li>
                            <li><a target="_blank" rel="noopener" href="https://www.linkedin.com/"
                                    class="fa fa-linkedin"></a></li>
                            <li><a target="_blank" rel="noopener" href="https://www.pinterest.com/"
                                    class="fa fa-pinterest-p"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Footer Widget End -->

            <!-- Footer Widget Start -->
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="footer-widget">
                    <h6 class="title">Quick links</h6>
                    <div class="footer-widget-link">
                        <ul>
                            <li><a href="create-job.html">Post New Job</a></li>
                            <li><a href="job-list.html">Jobs List</a></li>
                            <li><a href="job-list.html">Candidate List</a></li>
                            <li><a href="job-list.html">Employer List</a></li>
                            <li><a href="job-list.html">Browse Categories</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Footer Widget End -->

            <!-- Footer Widget Start -->
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="footer-widget">
                    <h6 class="title">Tranding Jobs</h6>
                    <div class="footer-widget-link">
                        <ul>
                            <li><a href="contact.html">Designer</a></li>
                            <li><a href="contact.html">UI & UX Expert</a></li>
                            <li><a href="contact.html">Develpoer</a></li>
                            <li><a href="contact.html">iOS developer</a></li>
                            <li><a href="contact.html">Front-End developer</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Footer Widget End -->

            <!-- Footer Widget Start -->
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="footer-widget">
                    <h6 class="title">Subscribe</h6>
                    <div class="footer-widget-newsletter">
                        <p>Candidates can ‘subscribe’ to the jobs by selecting ‘Categories’ and will get notified via
                            email when any job is posted on the selected category.</p>
                        <form id="subs" method="post" class="form">
                            @csrf
                            <div class="row">
                                <select class="col form-control" name="category_id">
                                    <option>Select</option>
                                    <!-- @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}
                                        </option>
                                    @endforeach -->
                                </select>
                                <input style="margin-left: 2px;" class="col" autocomplete="off" name="email"
                                    type="email" placeholder="e-mail">

                                <button class="btn btn-primary"><i class="fa fa-envelope-o"></i></button>
                            </div>

                        </form>
                        <!-- mailchimp-alerts Start -->
                        <div class="mailchimp-alerts text-centre">
                            <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                            <div class="mailchimp-success text-success"></div><!-- mailchimp-success end -->
                            <div class="mailchimp-error text-danger"></div><!-- mailchimp-error end -->
                        </div><!-- mailchimp-alerts end -->
                    </div>
                </div>
            </div>
            <!-- Footer Widget End -->

        </div>
    </div>
</div>
<!-- Footer Top Section End -->

<!-- Footer Bottom Section Start -->
<div class="footer-bottom-section section">
    <div class="container">
        <div class="row">

            <!-- Footer Copyright Start -->
            <div class="col-12">
                <p class="footer-copyright text-center">© 2022 Keller. Made with <i class="fa fa-heart heart-icon"></i>
                    By <a target="_blank" href="https://hasthemes.com/">HasThemes</a></p>
            </div>
            <!-- Footer Copyright End -->

        </div>
    </div>
</div>
<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}} -->

<!-- Toastr JS -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> -->
<!-- <script>
    $(document).ready(function() {
        $('#subs').submit(function(e) {

            e.preventDefault();
            $.ajax({

                type: 'POST',
                url: '{{ route('subscriber.store') }}',
                data: {
                    category_id: $('select[name=category_id]').val(),
                    email: $('input[name=email]').val(),
                    _token: "{{ csrf_token() }}",
                },

                success: function(response) {
                    toastr.success('Subscriber Added');
                    $('#subs')[0].reset();
                    $('.footer-widget-newsletter').load(location.href +
                        ' .footer-widget-newsletter');
                }

            });

        });
    });
</script> -->


</template>

<script setup>
   
</script>
<style>

</style>