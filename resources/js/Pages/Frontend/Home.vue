<template>
   <FrontendLayout>
    <div class="slider-section section">
        <div class="slide-item bg-parallax" :style="{ 'background-image': 'url(' + slider1 + ')' }"
            data-overlay="50">
            <div class="container">
                <div class="slider-content text-center">
                    <h2 class="title">Find Your Next Job</h2>
                    <p>More then <span>1,524</span> job listed here.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Job Search Section Start -->
    <div class="job-search-section section">
        <div class="container">
            <div class="job-search-wrap">

                <!-- Job Search Form Start -->
                <div class="job-search-form">
                    <form action="#" id="jobSearchForm">
                        <div class="row mb-n4">
                            <h4 class="title">Search Here</h4>
                            <div class="col-lg-auto col-sm-6 col-12 flex-grow-1 mb-4">
                                <input type="text" name="search" id="search"
                                    placeholder="web development,10000-20000,Dhaka">
                            </div>

                            <div class="col-lg-auto col-sm-6 col-12 flex-grow-1 mb-4">
                                <button class="btn btn-primary">Search</button>
                            </div>

                        </div>
                    </form>
                </div>
                <!-- Job Search Form End -->

            </div>
        </div>
    </div>
    <!-- Job Search Section End -->
    <div id="jobs"></div>
    <!-- Recent Jobs Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="section-title">
                <h2 class="title">Latest Jobs</h2>
                <p>Here's the most recent job listed on the website.</p>
            </div>

            <!-- <livewire:homefeed /> -->
            <div class="job-list-wrap">

<!-- @foreach ($activeJobs as $job) -->
    <!-- Job List Start -->
    <a href="{{ route('job.description', $job->uuid) }}" class="job-list row">
        <div class="company-logo col-auto">
            <img src="frontend/assets/images/companies/company-1.png" alt="Company Logo">
        </div>
        <div class="salary-type col-auto order-sm-3">
            <span class="salary-range">{{ $job->salary }}</span>
            <span class="badge bg-success" style="text-transform: uppercase;">{{ $job->employment_type }}</span>
        </div>
        <div class="content col">
            <h6 class="title">{{ $job->title }}</h6>
            <ul class="meta">
                <li><strong class="text-primary">{{ $job->user->name }}</strong></li>
                <li><i class="fa fa-map-marker"></i> {{ $job->location }}</li>
           <li><i class="fa fa-map-marker"></i> {{ $job->user->companyInfo->contract_number }}</li> 
            </ul>
        </div>
    </a>
    <!-- Job List Start -->
<!-- @endforeach -->


</div>
<!-- Job List Wrap Start -->

<div class="text-center mt-4 mt-lg-5">
<button wire:click="loadMore" class="btn btn-primary">View All Jobs</button>
</div>

        </div>
    </div>
    <!-- Recent Jobs End -->

    <!-- Funfact Section Start -->
    <div class="section section-padding bg-parallax" data-bg-image="assets/images/bg/bg-1.jpg" data-overlay="50">
        <div class="container">
            <div class="funfact-wrap row">

                <!-- Funfact Start -->
                <div class="funfact col-md-3 col-sm-6 col-12">
                    <span class="counter">1354</span>
                    <span class="title">Job Post</span>
                </div>
                <!-- Funfact Start -->

                <!-- Funfact Start -->
                <div class="funfact col-md-3 col-sm-6 col-12">
                    <span class="counter">1741</span>
                    <span class="title">Members</span>
                </div>
                <!-- Funfact Start -->

                <!-- Funfact Start -->
                <div class="funfact col-md-3 col-sm-6 col-12">
                    <span class="counter">1204</span>
                    <span class="title">Resume</span>
                </div>
                <!-- Funfact Start -->

                <!-- Funfact Start -->
                <div class="funfact col-md-3 col-sm-6 col-12">
                    <span class="counter">142</span>
                    <span class="title">Company</span>
                </div>
                <!-- Funfact Start -->

            </div>
        </div>
    </div>
    <!-- Funfact Section End -->

    <!-- Featured Conpanies Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="section-title">
                <h2 class="title">Featured Companies</h2>
                <p>Here's the most job listed by those companies.</p>
            </div>

            <!-- Company List Wrap Start -->
            <div class="company-slider row">

                <!-- Company List Start -->
                <div class="col">
                    <a href="company-single.html" class="feature-company">
                        <span class="company-logo"><img src="assets/images/companies/company-1.png" alt="company-1"></span>
                        <h6 class="title">Envato</h6>
                        <span class="open-job">2 open positions</span>
                    </a>
                </div>
                <!-- Company List Start -->

                <!-- Company List Start -->
                <div class="col">
                    <a href="company-single.html" class="feature-company">
                        <span class="company-logo"><img src="assets/images/companies/company-2.png" alt="company-1"></span>
                        <h6 class="title">Astha</h6>
                        <span class="open-job">1 open positions</span>
                    </a>
                </div>
                <!-- Company List Start -->

                <!-- Company List Start -->
                <div class="col">
                    <a href="company-single.html" class="feature-company">
                        <span class="company-logo"><img src="assets/images/companies/company-3.png" alt="company-1"></span>
                        <h6 class="title">Github</h6>
                        <span class="open-job">4 open positions</span>
                    </a>
                </div>
                <!-- Company List Start -->

                <!-- Company List Start -->
                <div class="col">
                    <a href="company-single.html" class="feature-company">
                        <span class="company-logo"><img src="assets/images/companies/company-4.png" alt="company-1"></span>
                        <h6 class="title">Medicore</h6>
                        <span class="open-job">1 open positions</span>
                    </a>
                </div>
                <!-- Company List Start -->

                <!-- Company List Start -->
                <div class="col">
                    <a href="company-single.html" class="feature-company">
                        <span class="company-logo"><img src="assets/images/companies/company-5.png" alt="company-1"></span>
                        <h6 class="title">Greensoul</h6>
                        <span class="open-job">1 open positions</span>
                    </a>
                </div>
                <!-- Company List Start -->

                <!-- Company List Start -->
                <div class="col">
                    <a href="company-single.html" class="feature-company">
                        <span class="company-logo"><img src="assets/images/companies/company-6.png" alt="company-1"></span>
                        <h6 class="title">Generous</h6>
                        <span class="open-job">2 open positions</span>
                    </a>
                </div>
                <!-- Company List Start -->

                <!-- Company List Start -->
                <div class="col">
                    <a href="company-single.html" class="feature-company">
                        <span class="company-logo"><img src="assets/images/companies/company-7.png" alt="company-1"></span>
                        <h6 class="title">Buzco</h6>
                        <span class="open-job">3 open positions</span>
                    </a>
                </div>
                <!-- Company List Start -->

                <!-- Company List Start -->
                <div class="col">
                    <a href="company-single.html" class="feature-company">
                        <span class="company-logo"><img src="assets/images/companies/company-8.png"
                                alt="company-1"></span>
                        <h6 class="title">Salina</h6>
                        <span class="open-job">1 open positions</span>
                    </a>
                </div>
                <!-- Company List Start -->

                <!-- Company List Start -->
                <div class="col">
                    <a href="company-single.html" class="feature-company">
                        <span class="company-logo"><img src="assets/images/companies/company-9.png"
                                alt="company-1"></span>
                        <h6 class="title">Hope</h6>
                        <span class="open-job">1 open positions</span>
                    </a>
                </div>
                <!-- Company List Start -->

                <!-- Company List Start -->
                <div class="col">
                    <a href="company-single.html" class="feature-company">
                        <span class="company-logo"><img src="assets/images/companies/company-10.png"
                                alt="company-span"></span>
                        <h6 class="title">Bebsha</h6>
                        <span class="open-job">2 open positions</span>
                    </a>
                </div>
                <!-- Company List Start -->

            </div>
            <!-- Company List Wrap Start -->

        </div>
    </div>
    <!-- Featured Conpanies End -->

    <!-- Testimonial Section Start -->
    <div class="section section-padding bg-parallax" data-bg-image="assets/images/bg/bg-2.jpg" data-overlay="65">
        <div class="container">

            <!-- Testimonial Slider Start -->
            <div class="testimonial-slider row">

                <!-- Testimonial Start -->
                <div class="col">
                    <div class="testimonial text-center text-white">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, modi sed praesentium
                            necessitatibus tenetur neque, veritatis esse voluptatem</p>
                        <img src="assets/images/authors/author-1.jpg" alt="">
                        <h6 class="name">Sharon Harper</h6>
                        <span class="title">Marketer of Hastech</span>
                    </div>
                </div>
                <!-- Testimonial End -->

                <!-- Testimonial Start -->
                <div class="col">
                    <div class="testimonial text-center text-white">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, modi sed praesentium
                            necessitatibus tenetur neque, veritatis esse voluptatem</p>
                        <img src="assets/images/authors/author-2.jpg" alt="">
                        <h6 class="name">Harold McCoy</h6>
                        <span class="title">CEO of Hastech</span>
                    </div>
                </div>
                <!-- Testimonial End -->

                <!-- Testimonial Start -->
                <div class="col">
                    <div class="testimonial text-center text-white">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, modi sed praesentium
                            necessitatibus tenetur neque, veritatis esse voluptatem</p>
                        <img src="assets/images/authors/author-3.jpg" alt="">
                        <h6 class="name">Ronald Wright</h6>
                        <span class="title">Admin of Hastech</span>
                    </div>
                </div>
                <!-- Testimonial End -->

            </div>
            <!-- Testimonial Slider End -->

        </div>
    </div>
    <!-- Testimonial Section End -->

    <!-- Blog Section Start -->
    <div class="section section-padding">
        <div class="container">

            <div class="section-title">
                <h3 class="title">Our Blog</h3>
                <p>Get more tips & tricks from out blog post.</p>
            </div>

            <!-- Blog Slider Start -->
            <div class="blog-slider slick-space">

                <!-- Blog Start -->
                <div class="blog">
                    <div class="media">
                        <a href="blog-single.html"><img src="assets/images/blog/blog-1.jpg" alt=""></a>
                    </div>
                    <div class="content">
                        <h6 class="title"><a href="blog-single.html">The Top 5 Job Interview Questions For IT
                                Professional</a></h6>
                        <ul class="meta">
                            <li>Posted on 25 Jan, 2023</li>
                            <li><a href="#">3 Comments</a></li>
                        </ul>
                        <div class="desc">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium fugiat fugit
                                voluptates ut rem vitae.</p>
                        </div>
                        <a href="blog-single.html" class="read-more">Read More <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <!-- Blog End -->

                <!-- Blog Start -->
                <div class="blog">
                    <div class="media">
                        <a href="blog-single.html"><img src="assets/images/blog/blog-2.jpg" alt=""></a>
                    </div>
                    <div class="content">
                        <h6 class="title"><a href="blog-single.html">7 Careers To Consider If You Love Traveling</a>
                        </h6>
                        <ul class="meta">
                            <li>Posted on 25 Jan, 2023</li>
                            <li><a href="#">3 Comments</a></li>
                        </ul>
                        <div class="desc">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium fugiat fugit
                                voluptates ut rem vitae.</p>
                        </div>
                        <a href="blog-single.html" class="read-more">Read More <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <!-- Blog End -->

                <!-- Blog Start -->
                <div class="blog">
                    <div class="media">
                        <a href="blog-single.html"><img src="assets/images/blog/blog-3.jpg" alt=""></a>
                    </div>
                    <div class="content">
                        <h6 class="title"><a href="blog-single.html">When the Perfect Candidate Turns Out To Be an
                                Imperfect Fit</a></h6>
                        <ul class="meta">
                            <li>Posted on 25 Jan, 2023</li>
                            <li><a href="#">3 Comments</a></li>
                        </ul>
                        <div class="desc">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium fugiat fugit
                                voluptates ut rem vitae.</p>
                        </div>
                        <a href="blog-single.html" class="read-more">Read More <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <!-- Blog End -->

            </div>
            <!-- Blog Slider End -->

        </div>
    </div>
    <!-- Blog Section End -->
   </FrontendLayout>

</template>

<script setup>
    import FrontendLayout from '@/Layouts/FrontendLayout.vue';
    import slider1 from '/public/frontend/assets/images/slider/slider-1.jpg'
</script>

<style lang="scss" scoped>

</style>