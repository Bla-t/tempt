<?php
$tabah_pelengkap = 'pelengkap/';
$tabah_judul_hal = "TMC - Tabah Mandiri Cicilan [LOGIN MASUK]";
include($tabah_pelengkap.'header-nya.php');
?>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
						<div id="pesan"></div>
                        <h3 class="panel-title"><i class="fa fa-windows fa-fw"></i> Silahkan Masuk</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" id="login_form" novalidate="0" action="log-masuk.txt">
                            <fieldset>
                                <label class="form-group input-group" style="cursor:pointer;">								
                                    <input id="nama" class="form-control" placeholder="Nama Anda" name="nm_user" type="email">
									<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                </label>
                                <label class="form-group input-group" style="cursor:pointer;">
                                    <input id="sandi" class="form-control" placeholder="Kata Sandi Anda" name="sd_user" type="password" value="">
									<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
                                </label>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Ingatkan di alat ini">Ingatkan di alat ini
                                    </label>
                                </div>
                                
								<button class="btn btn-lg btn-success btn-block" size="0" type="submit">Masuk <i class="fa fa-sign-in fa-fw"></i></button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include($tabah_pelengkap.'footer-nya.php'); ?>
	
    <!-- Custom Theme JavaScript -->
    <script src="js/log-masuk.js"></script>

</body>

</html>