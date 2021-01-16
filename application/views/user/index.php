<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <?= $this->session->flashdata('message'); ?>
</div> 
<!-- /.container-fluid -->
<!-- Full Page Image Header with Vertically Centered Content -->
<header class="masthead" style="background-image: url('<?= base_url('assets/images/perpus.png');?>">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12 text-center">
        <h1 class="font-weight-bolder text-white">Selamat datang di SIMAR PERPUSTAKAAN UAD</h1>
        <p class="lead text-white">Sistem manajemen arsip perpustakaan UAD</p>
        <form action="<?= base_url('user/entripeminjaman'); ?>">
        <button type="submit" class="btn btn-outline-danger btn-lg">Pinjam Ruangan</button>
        </form>
      </div>
    </div>
  </div>
</header>

</div>
<!-- End of Main Content -->