<?php $this->load->view('layout/header'); ?>

<section id="page-title" class="page-title-pattern">

  <div class="container clearfix">
    <h1>Toko</h1>
    <span>Kamu bisa mengatur produk di sini.</span>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Toko</a></li>
      <li class="breadcrumb-item active" aria-current="page">Beranda</li>
    </ol>
  </div>

</section>

<section id="content">
  <div class="content-wrap pt-5">
    <div class="container clearfix">

      <div class="row">
        <div class="col-md-3">

          <div class="list-group">
            <a href="<?= base_url('Seller') ?>" class="list-group-item list-group-item-action d-flex justify-content-between active">
              <div>Produk</div><i class="icon-line-archive"></i>
            </a>
            <a href="<?= base_url('Pesanan') ?>" class="list-group-item list-group-item-action d-flex justify-content-between">
              <div>Pesanan</div><i class="icon-line-truck"></i>
            </a>
          </div>
        </div>
        <div class="col-md-3">
          <h5 class="mb-0">Saldo Penjual: <?= idr_format(get_saldo_penjual()) ?></h5>
          <a href=""><i class="icon-line-download font-weight-bold"></i></a>
        </div>
      </div>

      <div class="row ">
        <div class="col-md-12">
         <div class="d-flex justify-content-end mb-3">
          <div>
            <a href="<?= base_url('Seller/add_produk') ?>" style="margin:2px" class="btn btn-sm btn-tambah">Tambah</a>
          </div>
        </div>
          <table class="table table-hover" id="table-list">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th width="10%">Foto</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Terjual</th>
                <th>Stok</th>
                <th width="15%"></th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
</section>

<script>
$(document).ready(function() {

  const getParam = () => {
    const query = {}
    return $.param(query)
  }

  const query = (d) => {}

  const getParamDetail = () => {
    const query = {}
    return $.param_detail(query)
  }

  const initiateDatatables = () => {
    $("#table-list").DataTable({
      autoWidth: false,
      scrollX: true,
      "processing": true,
      "serverSide": true,
      "info": true,
      "deferRender": true,
      "language": {
        "searchPlaceholder": "Tekan 'Enter' untuk pencarian.",
        "processing": 'Prosesing Data'
      },
      "ajax": {
        "url": `<?= base_url('Seller/json') ?>`,
        "type": 'POST',
        "data": query
      },
      "columnDefs": [{
        "targets": [0, 1],
        "orderable": false,
      }],
    });
  }
  // MEMANGGIL FUNCTION
  initiateDatatables();

  $(".dataTables_filter input")
    .unbind() 
    .bind("keyup", function(e) { // Bind our desired behavior
      // If the length is 3 or more characters, or the user pressed ENTER, search
      if (e.keyCode == 13) {
        // Call the API search function
        $("#table-list").DataTable().search(this.value).draw();
      }
      return;
    });

  $('.dataTables_filter input[type="search"]').css({
    'width': '20em',
    'display': 'inline-block'
  });

  // LIST FUNCTION 
  function refresh() {
    $('#table-list').DataTable().ajax.reload();
  }

  $(document).on('click', '.delete', function(e) {
    e.preventDefault();
    if (confirm("Yakin hapus data ini ?")) {
      $.ajax({
        url : "<?php echo base_url('Seller/delete')?>",
        type: "POST",
        dataType: 'json',
        data: {
          id: $(this).data('id')
        },
        success: function(response) {
          if (response.status == '200') {
            alert('Produk Berhasil Dihapus')
            location.reload();
          } else {
            return false;
          }
        },
        error: (e) => {
          alert(`${e.status} - ${e.statusText}`);
        }
      });
    }
  });

});
</script>

<?php $this->load->view('layout/footer'); ?>

