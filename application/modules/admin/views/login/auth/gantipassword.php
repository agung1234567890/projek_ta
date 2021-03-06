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
                                    <h1 class="h4 text-gray-900 mb-4">CHANGE PASSWORD</h1>
                                </div>

                                <?php if ($this->session->flashdata('eror')) { ?>
                                    <div class="alert alert-danger">
                                        <?php
                                        print_r($this->session->flashdata('eror'));
                                        ?>
                                    </div>
                                <?php } ?>
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
                                <form class="user" method="POST" action="<?= base_url('admin/login/ganti_password_action/' . $id); ?>">
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        <input type="password" class="form-control form-control-user" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Change Password
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('admin/login'); ?>">Back to login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>