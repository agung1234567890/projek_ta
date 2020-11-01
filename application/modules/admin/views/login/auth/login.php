<?php
$a = rand(1, 10);
$b = rand(1, 10);
$captcha = md5($a + $b);
?>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">LOGIN</h1>
                                </div>
                                <?php if ($this->session->userdata('gagal')) { ?>
                                    <div class="alert alert-danger">
                                        <?= $this->session->userdata('gagal') ?>
                                    </div>
                                <?php } ?>
                                <?php if ($this->session->userdata('berhasil')) { ?>
                                    <div class="alert alert-success">
                                        <?= $this->session->userdata('berhasil') ?>
                                    </div>
                                <?php } ?>
                                <form class="user" method="POST" action="<?= base_url('admin/login/auth/' . $captcha); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                    </div>
                                    <p> <?= $a ?> + <?= $b ?> jadi berapa ?</p>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="captcha" name="captcha" placeholder="Masukkan jawaban anda">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= site_url('admin/login/lupapassword') ?>">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('admin/login/register'); ?>">Create an Account!</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url(''); ?>">Back to front</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>