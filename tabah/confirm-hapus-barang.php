<?php

//Silahkan di Buka Lagi ya :

//http://www.asanoer.com/artikel/aplikasi-php-mysql-cicilan-barang-enam-bulan-dengan-boostrap-v-1-1.html

//Salam,
//asanoer.com

?>

<?php
	$kd_barang = "";
	$tabah_aksi = 'aksi/';
	Extract($_GET);
?>

<div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title">Hapus Barang Dengan Kode <?php echo $kd_barang; ?></h4>

            </div>

            <div class="modal-body">

                <p>Apa benar Anda akan menghapus barang ini (Kode = <?php echo $kd_barang; ?>)?</p>

                <p class="text-warning"><small>Barang ini akan masuk dalam archive Anda...</small></p>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>

                <button id="<?php echo $kd_barang; ?>" type="button" class="btn btn-primary" onclick="del(this.id)">Hapus</button>

            </div>


        </div>

    </div>
    

<script>
function del(kd_barang) {
    //var x=document.getElementById(kd_barang).innerHTML;
	//x = x.replace(/'/g, "\\'");
    //if (confirm('Apa benar "'+x+'" akan dihapus?') == true) {
        window.open('<?php echo $tabah_aksi; ?>barang-del.php?kd_barang='+kd_barang,'_self');
    //}
}
</script>