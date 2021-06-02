<?php
	$kd_kategori = "";
	$tabah_aksi = 'aksi/';
	Extract($_GET);
?>

<div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title">Hapus Kategori Barang Dengan Kode <?php echo $kd_kategori; ?></h4>

            </div>

            <div class="modal-body">

                <p>Apa benar kategori dengan kode <?php echo $kd_kategori; ?> akan dihapus?</p>

                <p class="text-warning"><small>Catatan: Semua barang yang berkategori ini akan dipindah ke tak berkategori.</small></p>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>

                <button id="<?php echo $kd_kategori; ?>" type="button" class="btn btn-danger" onclick="del(this.id)">Ya</button>

            </div>


<script>
function del(kd_kategori) {
    //var x=document.getElementById(kd_barang).innerHTML;
	//x = x.replace(/'/g, "\\'");
    //if (confirm('Apa benar "'+x+'" akan dihapus?') == true) {
        window.open('<?php echo $tabah_aksi; ?>kate-del.php?kd_kategori='+kd_kategori,'_self');
    //}
}
</script>
        </div>

    </div>