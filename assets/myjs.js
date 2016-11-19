$(document).ready(function(e){

  $('#table').dataTable();
  var base_url = 'http://localhost/bmt/';

  function bersih(){
      $('#username').val('');
      $('#nama').val('');
      $('#password').val('');
  }
  
  $('#tambah-admin').click(function(){
    $('#modal-admin').modal();
    $('#aksi-admin').val('tambah');
      $('#username').attr('readonly', false);
      bersih();
  });

  $(document).on('click', '.edit-admin', function(){
      $('#modal-admin').modal();
      $('#aksi-admin').val('edit');
      $('#username').attr('readonly', true);
      var id = $(this).attr('id');
      $('#username').val(id);

      $.ajax({
        url: base_url+'admin/ambil',
        data: 'id='+id,
        type: 'POST',
        dataType:'json',
        success: function(data){
          $('#nama').val(data.nama);
          $('#password').val(data.password);
          $('#level').val(data.level);
        }
      });
  });

  $(document).on('submit', '#form-admin', function(e){
    e.preventDefault();
    var aksi = $('#aksi-admin').val();
      if(aksi=='tambah'){         
        var data=$('#form-admin').serialize();
        $('#notif-admin').html('Loading..');
      $.ajax({
        url: base_url+'admin/input_data',
        data: data,
        type:'POST',
        success: function(msg){
          $('#notif-admin').html(msg);
        }
      });
    }
    else if(aksi=='edit'){
        var data=$('#form-admin').serialize();
        $('#notif-admin').html('Loading..');
      $.ajax({
        url: base_url+'admin/edit_data',
        data: data,
        type:'POST',
        success: function(msg){
          $('#notif-admin').html(msg);
        }
      });    
      }
  });

  $(document).on('click', '.hapus-admin', function(e){
      e.preventDefault();
      $('#modal-hapus').modal();
      var id = $(this).attr('id');
      
      $(document).on('click', '#proses-hapus-admin', function(e){
        e.preventDefault();
        $('#notif-hapus-admin').html('Loading..');
        $.ajax({
          url: base_url+'admin/hapus_data',
          data: 'id='+id,
          type: 'POST',
          success: function(msg){
            $('#notif-hapus-admin').html(msg);
          }       
        });
      })
    });

    /*untuk anggota*/

    function bersih_anggota(){
      $('#nomor_anggota').val('');
      $('#nama_anggota').val('');
      $('#tempat_lahir').val('');
      $('#tanggal_lahir').val('');
      $('#agama').val('--pilih--');
      $('#jenis_kelamin').val('--pilih--');
      $('#pekerjaan').val('');
      $('#ayah').val('');
      $('#ibu').val('');
      $('#alamat').val('');
      $('#nomor_hp').val('');
    };


    $('#tambah-anggota').click(function(){
      $('#modal-anggota').modal();
      $('#aksi-anggota').val('tambah');
      $('#nomor_anggota').attr('readonly', false);  
      bersih_anggota();    
    });
    //bersih();

    $(document).on('click', '.edit-anggota', function(){
      $('#modal-anggota').modal();
      $('#aksi-anggota').val('edit');
      $('#nomor_anggota').attr('readonly', true);
      var id = $(this).attr('id');
      $('#nomor_anggota').val(id);

      $.ajax({
        url: base_url+'anggota/ambil',
        data: 'id='+id,
        type: 'POST',
        dataType:'json',
        success: function(data){
          //$('#nomor_anggota').val('');
          $('#nama_anggota').val(data.nama);
          $('#tempat_lahir').val(data.tempat_lahir);
          $('#tanggal_lahir').val(data.tanggal_lahir);
          $('#agama').val(data.agama);
          $('#jenis_kelamin').val(data.jenis_kelamin);
          $('#pekerjaan').val(data.pekerjaan);
          $('#ayah').val(data.ayah);
          $('#ibu').val(data.ibu);
          $('#alamat').val(data.alamat);
          $('#nomor_hp').val(data.no_hp);
        }
      });
    });

    $(document).on('submit', '#form-anggota', function(e){
    e.preventDefault();
    var aksi = $('#aksi-anggota').val();
      if(aksi=='tambah'){         
        var data=$('#form-anggota').serialize();
        $('#notif-anggota').html('Loading..');
      $.ajax({
        url: base_url+'anggota/input_data',
        data: data,
        type:'POST',
        success: function(msg){
          $('#notif-anggota').html(msg);
        }
      });
    }
    else if(aksi=='edit'){
        var data=$('#form-anggota').serialize();
        $('#notif-anggota').html('Loading..');
      $.ajax({
        url: base_url+'anggota/edit_data',
        data: data,
        type:'POST',
        success: function(msg){
          $('#notif-anggota').html(msg);
        }
      });    
      }
  });

    $(document).on('click', '.hapus-anggota', function(e){
      e.preventDefault();
      $('#modal-hapus-anggota').modal();
      var id = $(this).attr('id');
      
      $(document).on('click', '#proses-hapus-anggota', function(e){
        e.preventDefault();
        $('#notif-hapus-anggota').html('Loading..');
        $.ajax({
          url: base_url+'anggota/hapus_data',
          data: 'id='+id,
          type: 'POST',
          success: function(msg){
            $('#notif-hapus-anggota').html(msg);
          }       
        });
      })
    });

    /*untuk produk*/
    function bersih_produk(){
      $('#jenis_produk').val('');
      $('#keterangan_produk').val('');
      $('#presentase_mudharabah').val(0);
    };

    $('#tambah-produk').click(function(){
      $('#modal-produk').modal();
      $('#aksi-produk').val('tambah');
      $('#jenis_produk').attr('readonly', false);
      bersih_produk();
    });

    $(document).on('click', '.edit-produk', function(){
      $('#modal-produk').modal();
      $('#aksi-produk').val('edit');
      $('#jenis_produk').attr('readonly', true);
      var id = $(this).attr('id');
      $('#jenis_produk').val(id);

      $.ajax({
        url: base_url+'produk/ambil',
        data: 'id='+id,
        type: 'POST',
        dataType:'json',
        success: function(data){
          //$('#nomor_anggota').val('');
          $('#jenis_produk').val(data.id_produk);
          $('#keterangan_produk').val(data.nama_produk);
          $('#presentase_mudharabah').val(data.presentase);
          $('#kategori_produk').val(data.kategori);
        }
      });
    });

    $(document).on('submit', '#form-produk', function(e){
    e.preventDefault();
    var aksi = $('#aksi-produk').val();
      if(aksi=='tambah'){         
        var data=$('#form-produk').serialize();
        $('#notif-produk').html('Loading..');
      $.ajax({
        url: base_url+'produk/input_data',
        data: data,
        type:'POST',
        success: function(msg){
          $('#notif-produk').html(msg);
        }
      });
    }
    else if(aksi=='edit'){
        var data=$('#form-produk').serialize();
        $('#notif-produk').html('Loading..');
      $.ajax({
        url: base_url+'produk/edit_data',
        data: data,
        type:'POST',
        success: function(msg){
          $('#notif-produk').html(msg);
        }
      });    
      }
  });

    $(document).on('click', '.hapus-produk', function(e){
      e.preventDefault();
      $('#modal-hapus-produk').modal();
      var id = $(this).attr('id');
      
      $(document).on('click', '#proses-hapus-produk', function(e){
        e.preventDefault();
        $('#notif-hapus-produk').html('Loading..');
        $.ajax({
          url: base_url+'produk/hapus_data',
          data: 'id='+id,
          type: 'POST',
          success: function(msg){
            $('#notif-hapus-produk').html(msg);
          }       
        });
      })
    });

    /*penyimpan*/
    function bersih_penyimpan(){
      $('#nomor_anggota_penyimpan').val('');
      $('#nama_anggota_penyimpan').val('');
    };

    $('#tambah-penyimpan').click(function(){
      $('#modal-penyimpan').modal();
      $('#aksi-penyimpan').val('tambah');
      //$('#username').attr('readonly', false);
      bersih_penyimpan();
    });

    $(document).on('click', '.hapus-penyimpan', function(e){
      e.preventDefault();
      $('#modal-hapus-penyimpan').modal();
      var id = $(this).attr('id');
      
      $(document).on('click', '#proses-hapus-penyimpan', function(e){
        e.preventDefault();
        $('#notif-hapus-penyimpan').html('Loading..');
        $.ajax({
          url: base_url+'register_simpanan/hapus_data',
          data: 'id='+id,
          type: 'POST',
          success: function(msg){
            $('#notif-hapus-penyimpan').html(msg);
          }       
        });
      })
    });

    $(document).on('keyup', '#nomor_anggota_penyimpan', function(e){
      e.preventDefault();
      var id = $('#nomor_anggota_penyimpan').val();
      $.ajax({
          url:base_url+'register_simpanan/ambil_nama',
          type:'POST',
          data: 'id='+id,
          dataType:'json',
          success:function(data){
            $('#nama_anggota_penyimpan').val(data.nama);
          }
      });
    });

    $(document).on('submit', '#form-penyimpan', function(e){
    e.preventDefault();
    var aksi = $('#aksi-penyimpan').val();
      if(aksi=='tambah'){         
        var data=$('#form-penyimpan').serialize();
        $('#notif-penyimpan').html('Loading..');
      $.ajax({
        url: base_url+'register_simpanan/input_data',
        data: data,
        type:'POST',
        success: function(msg){
          $('#notif-penyimpan').html(msg);
        }
      });
    }
    else if(aksi=='edit'){
        var data=$('#form-produk').serialize();
        $('#notif-produk').html('Loading..');
      $.ajax({
        url: base_url+'produk/edit_data',
        data: data,
        type:'POST',
        success: function(msg){
          $('#notif-produk').html(msg);
        }
      });    
      }
  });
    /*end penyimpan*/

    /*transaksi simapanan*/
    $('#tambah-transaksi-simpanan').click(function(){
      $('#modal-transaksi-simpanan').modal();
      $('#aksi-transaksi-simpanan').val('tambah');
      //$('#jenis_produk').attr('readonly', false);
      //bersih_produk();
    });

    $(document).on('submit', '#form-transaksi-simpanan', function(e){
    e.preventDefault();
    var aksi = $('#aksi-transaksi-simpanan').val();
      if(aksi=='tambah'){         
        var data=$('#form-transaksi-simpanan').serialize();
        $('#notif-transkasi-simpanan').html('Loading..');
      $.ajax({
        url: base_url+'register_simpanan/input_data_transaksi',
        data: data,
        type:'POST',
        success: function(msg){
          $('#notif-transkasi-simpanan').html(msg);
        }
      });
    }
    else if(aksi=='edit'){
        var data=$('#form-produk').serialize();
        $('#notif-produk').html('Loading..');
      $.ajax({
        url: base_url+'produk/edit_data',
        data: data,
        type:'POST',
        success: function(msg){
          $('#notif-produk').html(msg);
        }
      });    
      }
    });

    $(document).on('click', '.hapus-transaksi-simpanan', function(e){
      e.preventDefault();
      $('#modal-hapus-transaksi-simpanan').modal();
      var id = $(this).attr('id');
      
      $(document).on('click', '#proses-hapus-transaksi-simpanan', function(e){
        e.preventDefault();
        $('#notif-hapus-transaksi-simpanan').html('Loading..');
        $.ajax({
          url: base_url+'register_simpanan/hapus_data_transaksi',
          data: 'id='+id,
          type: 'POST',
          success: function(msg){
            $('#notif-hapus-transaksi-simpanan').html(msg);
          }       
        });
      });
    });

    /*end transaksi simpanan*/

    /*pembiayaan*/

    function bersih_pembiayaan(){
      $('#nomor_anggota_pembiayaan').val('');
      $('#nama_anggota_pembiayaan').val('');
      $('#jenis_pembiayaan').val('--pilih--');
    };

     $('#tambah-pembiayaan').click(function(){
      $('#modal-pembiayaan').modal();
      $('#aksi-pembiayaan').val('tambah');
      //$('#username').attr('readonly', false);
     bersih_pembiayaan();
    });

     $(document).on('keyup', '#nomor_anggota_pembiayaan', function(e){
      e.preventDefault();
      var id = $('#nomor_anggota_pembiayaan').val();
      $.ajax({
          url:base_url+'register_simpanan/ambil_nama',
          type:'POST',
          data: 'id='+id,
          dataType:'json',
          success:function(data){
            $('#nama_anggota_pembiayaan').val(data.nama);
          }
      });
    });

     $(document).on('click', '.hapus-pembiayaan', function(e){
      e.preventDefault();
      $('#modal-hapus-pembiayaan').modal();
      var id = $(this).attr('id');
      
      $(document).on('click', '#proses-hapus-pembiayaan', function(e){
        e.preventDefault();
        $('#notif-hapus-pembiayaan').html('Loading..');
        $.ajax({
          url: base_url+'register_pembiayaan/hapus_data',
          data: 'id='+id,
          type: 'POST',
          success: function(msg){
            $('#notif-hapus-pembiayaan').html(msg);
          }       
        });
      });
    });

     $(document).on('submit', '#form-pembiayaan', function(e){
      e.preventDefault();
      var aksi = $('#aksi-pembiayaan').val();
        if(aksi=='tambah'){         
          var data=$('#form-pembiayaan').serialize();
          $('#notif-pembiayaan').html('Loading..');
        $.ajax({
          url: base_url+'register_pembiayaan/input_data',
          data: data,
          type:'POST',
          success: function(msg){
            $('#notif-pembiayaan').html(msg);
          }
        });
      }
      else if(aksi=='edit'){
          var data=$('#form-produk').serialize();
          $('#notif-produk').html('Loading..');
        $.ajax({
          url: base_url+'produk/edit_data',
          data: data,
          type:'POST',
          success: function(msg){
            $('#notif-produk').html(msg);
          }
        });    
        }
    });

    /*end pembiayaan*/

    /*transaksi pembiayaan*/
    $('#tambah-transaksi-pembiayaan').click(function(){
      $('#modal-transaksi-pembiayaan').modal();
      $('#aksi-transaksi-pembiayaan').val('tambah');
      //$('#username').attr('readonly', false);
      //bersih_pembiayaan();
    });

    $(document).on('submit', '#form-transaksi-pembiayaan', function(e){
      e.preventDefault();
      var aksi = $('#aksi-transaksi-pembiayaan').val();
        if(aksi=='tambah'){         
          var data=$('#form-transaksi-pembiayaan').serialize();
          $('#notif-transaksi-pembiayaan').html('Loading..');
        $.ajax({
          url: base_url+'register_pembiayaan/input_data_transaksi',
          data: data,
          type:'POST',
          success: function(msg){
            $('#notif-transaksi-pembiayaan').html(msg);
          }
        });
      }
      else if(aksi=='edit'){
          var data=$('#form-produk').serialize();
          $('#notif-produk').html('Loading..');
        $.ajax({
          url: base_url+'produk/edit_data',
          data: data,
          type:'POST',
          success: function(msg){
            $('#notif-produk').html(msg);
          }
        });    
        }
    });

    $(document).on('click', '.hapus-transaksi-pembiayaan', function(e){
      e.preventDefault();
      $('#modal-hapus-transaksi-pembiayaan').modal();
      var id = $(this).attr('id');
      
      $(document).on('click', '#proses-hapus-transaksi-pembiayaan', function(e){
        e.preventDefault();
        $('#notif-hapus-transaksi-pembiayaan').html('Loading..');
        $.ajax({
          url: base_url+'register_pembiayaan/hapus_data_transaksi_pembiayaan',
          data: 'id='+id,
          type: 'POST',
          success: function(msg){
            $('#notif-hapus-transaksi-pembiayaan').html(msg);
          }       
        });
      });
    });


    /*end transaksi pembiayaan*/

    /*login*/

    /*end login*/
  

});


$("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
});
     
$("#menu-toggle-2").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled-2");
        $('#menu ul').hide();
});
 
function initMenu() {
      $('#menu ul').hide();
      $('#menu ul').children('.current').parent().show();
      //$('#menu ul:first').show();
      $('#menu li a').click(
        function() {
          var checkElement = $(this).next();
          if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
            return false;
            }
          if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
            $('#menu ul:visible').slideUp('normal');
            checkElement.slideDown('normal');
            return false;
            }
          }
        );
}
$(document).ready(function() {initMenu();});