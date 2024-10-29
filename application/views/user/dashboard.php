<div class="container-fluid">

    <!-- Row start -->
    <div class="row align-items-center mb-3">
        <div class="col-12 col-xl-6">
            <h2 class="mb-2">Analytics Dashboard </h2>
            <h6 class="mb-2 fw-light text-dark small">
                A collection of visualizations showing your website data.
            </h6>
        </div>
        <div class="col-12 col-xl-6">
            <div class="row g-3">
                <div class="col-4">
                    <div class="card p-2 rounded-2 d-flex flex-row flex-wrap">
                        <div class="position-relative shape-block">
                            <img src="<?php echo base_url('assets/images/shape1.png') ?>" class="img-fluid img-4x" alt="Bootstrap Themes" />
                            <i class="icon-book-open"></i>
                        </div>
                        <div class="ms-2">
                            <h3 class="m-0 fw-semibold"><?php echo count($active_users); ?></h3>
                            <h6 class="m-0 fw-light">Users</h6>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card p-2 rounded-2 d-flex flex-row flex-wrap">
                        <div class="position-relative shape-block">
                            <img src="<?php echo base_url('assets/images/shape2.png') ?>" class="img-fluid img-4x" alt="Bootstrap Themes" />
                            <i class="icon-shopping-cart"></i>
                        </div>
                        <div class="ms-2">
                            <h3 class="m-0 fw-semibold"><?php echo count($posts); ?></h3>
                            <h6 class="m-0 fw-light">Posts</h6>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card p-2 rounded-2 d-flex flex-row flex-wrap">
                        <div class="position-relative shape-block">
                            <img src="<?php echo base_url('assets/images/shape3.png') ?>" class="img-fluid img-4x" alt="Bootstrap Themes" />
                            <i class="icon-shopping-bag"></i>
                        </div>
                        <div class="ms-2">
                            <h3 class="m-0 fw-semibold"><?php echo count($active_posts); ?></h3>
                            <h6 class="m-0 fw-light">Active Posts</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row end -->



</div>