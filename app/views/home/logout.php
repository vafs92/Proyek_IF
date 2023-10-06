<script>
    // Menonaktifkan fungsionalitas tombol kembali
    window.onload = function () {
        disableBackButton();
    };

    // Menonaktifkan tombol kembali
    function disableBackButton() {
        window.history.pushState(null, null, window.location.href);
        window.addEventListener('popstate', function () {
            window.history.pushState(null, null, window.location.href);
        });
    }

    // Mengarahkan ke aksi logout
    window.location.replace("<?php echo BASEURL; ?>/home/logout");
</script>
