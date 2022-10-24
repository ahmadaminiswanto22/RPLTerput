<?php
$judul = 'Kirim Undangan';
include "header.php";
?>
<style>
    form .tambah-link .buat-link,
    .hasil .buat-link {
        background-color: #deb887;
        text-decoration: none;
        font-weight: 400;
        font-size: 16px;
        font-style: bold;
        color: #fff;
        border-color: #ffc0cb;
    }

    .hasil .hasil-link {
        width: 75%;
        padding: 5px;
    }

    .hasil .tombol-wa {
        background-color: #128C7E;
        text-decoration: none;
        font-weight: 400;
        font-size: 16px;
        font-style: bold;
        color: #fff;
        border-color: #075E54;
    }
</style>
<div class="container">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-comments m-1"></i>
            Kirim Undangan Via WhatsApp
        </div>
        <div class="card-body">
            <div class="row text-center justify-content-center judul">
                <div class="col-md-10">
                    <h4><a href="https://www.webook.id" style="text-decoration: none;">WeBook.id</a></h4>
                    <h2>Risdiani & Gugun</h2>
                    <br>
                    <p class="font-weight-bolder">Kepada Yth.</p>
                    <form action="" method="get">
                        <div class="form-group">
                            <label for="p">Nama Tamu</label>
                            <input type="text" class="form-control" name="p" id="p" placeholder="Isikan nama tamu ...">
                        </div>
                        <div class="form-group mt-2 tambah-link">
                            <button class="btn buat-link" type="submit" value="Buat Link"> Buat Link </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="row text-center justify-content-center">
        <div class="col-md-10">
            <div class="hasil">
                <?php
                // if (isset($_GET['link']))
                //     $link_kirim = htmlspecialchars($_GET['link']);
                if (isset($_GET['p'])) {
                    $tamu = $_GET['p'];
                }
                $search = array(
                  '+',
                  '%26'
                 );
                
                 $replace = array(
                  '2Q',
                  '$'
                 );
                $salam_muslim = "_Assalamualaikum%20Wr.%20Wb._%0A%0AYth.%0A";
                $salam_non = "_Salam%20Bahagia_%0A";
                $di_tempat = "%0ADi%20tempat%2C";
                $isi = "%0A%0ATanpa%20mengurangi%20rasa%20hormat%2C%20perkenankan%20kami%20mengundang%20Bpk%2FIbu%2FSdr%20untuk%20menghadiri%20acara%20pernikahan%20kami%3A%0A%0A_Nama%20mempelai%20perempuan_%0A%26%0A_Nama%20mempelai%20laki-laki_%0A%0ASilakan%20klik%20tautan%20undangan%20di%20bawah%20ini%20untuk%20info%20lengkap%20acara%20dan%20reservasi%3A%0A%0A";
                $actual_link = "https://gugundanrisdiani.webook.id/?$_SERVER[QUERY_STRING]";
                $penutup = "%0A%0AAtas%20perhatian%20dan%20doanya%2C%20kami%20ucapkan%20terima%20kasih.%0A%0A_Powered%20by%20webook.id_";
                ?>
                <h5>Hasil Link Undangan</h5>
                <input type="text" class="hasil-link" value="<?= $actual_link ?>" id="pilih" readonly />
                <button type="button" class="btn buat-link" onclick="copy_text()"> Copy </button>
                <br><br>
                <a href="whatsapp://send?text=<?= $salam_muslim ?><?= str_replace("&", "%26", "$tamu"); ?> <?= $isi ?><?= str_replace($search, $replace, $actual_link); ?> <?= $penutup ?>" data-action="share/whatsapp/share" class="m-2">
                    <button class="btn tombol-wa"> Kirim Link via WhatsApp </button></a>
                <!-- <a href="https://api.whatsapp.com/whatsapp://send?text=
                Test URL" target="_blank" data-action="share/whatsapp/share">
                    <button class="tombol-wa"> Kirim Link via Whatsapp </button></a> -->
                <a href="<?= $actual_link ?>" target="_blank">
                    <button type="button" class="btn buat-link">Lihat Link</button></a>
                <br><br>
                <!-- ============= -->
                <!-- ============= -->
            </div>
        </div>
    </div>
</div>

</div>
</main>
<script type="text/javascript">
    function copy_text() {
        document.getElementById("pilih").select();
        document.execCommand("copy");
        alert("Text berhasil dicopy");
    }
</script>
<?php
include "footer.php";
?>