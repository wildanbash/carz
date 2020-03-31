    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay" style="background-image: url('<?= base_url()?>assets/img/page-title.jpg')">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Login</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Login Page Content Start ==-->
    <section id="lgoin-page-wrap" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-8 m-auto">
                	<div class="login-page-content">
                		<div class="login-form">
                			<h3>Login</h3>
							<form method="POST" action="<?=base_url('auth/process')?>" id="loginform">
								<div class="username">
                                    <input type="email" placeholder="Email" name="email">
                                    <div class="invalid-feedback">
                                        Masukkan Email Dengan Benar
                                    </div>
								</div>
								<div class="password">
                                    <input type="password" placeholder="Password" name="password">
                                    <div class="invalid-feedback">
                                        Masukkan Email Dengan Benar
                                    </div>
								</div>
								<div class="log-btn">
									<button type="submit" name="login"><i class="fa fa-sign-in"></i> Log In</button>
								</div>
							</form>
                		</div>
                		
                		
                		<div class="create-ac">
                			<p>Belum punya Akun? <a href="<?= base_url('auth/register') ?>">Registrasi Disini</a></p>
                		</div>
                	</div>
                </div>
        	</div>
        </div>
    </section>
    <!--== Login Page Content End ==-->