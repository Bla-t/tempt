<?php
	$kd_peminjam = "";
	$tabah_aksi = 'aksi/';
	Extract($_GET);
?>

<div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title">Hapus Nama Peminjam Dengan Kode <?php echo $kd_peminjam; ?></h4>

            </div>

            <div class="modal-body">

                <p>Apa benar nama peminjam dengan kode <?php echo $kd_peminjam; ?> akan dihapus?</p>

                <p class="text-warning"><small>Catatan: Peminjam yang dihapus akan dimasukkan dalam archive.</small></p>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>

                <button id="<?php echo $kd_peminjam; ?>" type="button" class="btn btn-danger" onclick="del(this.id)">Ya</button>

            </div>

        </div>

    </div>

<script>
function del(kd_peminjam) {
    //var x=document.getElementById(kd_barang).innerHTML;
	//x = x.replace(/'/g, "\\'");
    //if (confirm('Apa benar "'+x+'" akan dihapus?') == true) {
        window.open('<?php echo $tabah_aksi; ?>peminjam-del.php?kd_peminjam='+kd_peminjam,'_self');
    //}
}
</script>