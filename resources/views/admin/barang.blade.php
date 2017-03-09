@extends('index')

@section('title', $title)

@section('content')
  <!-- BEGIN PAGE CONTAINER -->
  <div class="page-container">
  	<!-- BEGIN PAGE HEAD -->
  	<div class="page-head">
  		<div class="container">
  			<!-- BEGIN PAGE TITLE -->
  			<div class="page-title">
  				<h1>Barang <small>data barang</small></h1>
  			</div>
  			<!-- END PAGE TITLE -->
  		</div>
  	</div>
  	<!-- END PAGE HEAD -->
  	<!-- BEGIN PAGE CONTENT -->
  	<div class="page-content">
  		<div class="container">
  			<!-- BEGIN PAGE BREADCRUMB -->
  			<ul class="page-breadcrumb breadcrumb">
  				<li>
  					<a href="{{ url('/') }}">Home</a><i class="fa fa-circle"></i>
  				</li>
  				<li class="active">
  					 Data Barang
  				</li>
  			</ul>
  			<!-- END PAGE BREADCRUMB -->
  			<!-- BEGIN PAGE CONTENT INNER -->
  			<div class="row margin-top-10">

  				<div class="col-md-12 col-sm-12">
  					<!-- BEGIN PORTLET-->
  					<div class="portlet light ">
  						<div class="portlet-title">
                            <div class="caption">
                              <i class="icon-bag font-green-sharp"></i>
                            </div>
  							<div class="caption caption-md">
  								<i class="icon-bar-chart theme-font hide"></i>
  								<span class="caption-subject theme-font bold uppercase">Daftar Barang</span>
  								<span class="caption-helper">list semua barang</span>
  							</div>
  							<div class="actions">
  								<div class="btn-group btn-group-devided" data-toggle="buttons">
                                <a class="btn btn-success" data-toggle="modal" href="#tambah"><i class="fa fa-plus"></i> Tambah</a>
  								</div>
  							</div>
  						</div>
                        {{ csrf_field() }}
  						<div class="portlet-body">
  							<div class="table-scrollable table-scrollable-borderless">
  								<table class="table table-hover" id="tabel-barang">
      								<thead>
          								<tr class="uppercase">
          									<th>No</th>
          									<th>Nama</th>
          									<th>Jenis</th>
                                            <th>Harga</th>
                                            <th>Keuntungan</th>
                                            <th>Harga Jual</th>
          									<th>Stok</th>
          									<th>Action</th>
          								</tr>
      								</thead>
                                    <tbody>
                                    </tbody>
  								</table>
  							</div>
  						</div>
  					</div>
  					<!-- END PORTLET-->
  				</div>
  			</div>
  			<!-- END PAGE CONTENT INNER -->
  		</div>

  	</div>
  	<!-- END PAGE CONTENT -->
  </div>
  <!-- END PAGE CONTAINER -->

  <!-- MODAL -->
    <div id="tambah" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Form Tambah Barang</h4>
				</div>
				<div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <span id="messages" style="display: none;"></span>
                        </div>
                    </div>
					<form class="form-horizontal" id="form-tambah" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
							<label class="control-label col-md-3">Nama </label>
							<div class="col-md-8">
                                <div class="input-icon right">
                                    <input type="hidden" name="id"  id="id" class="form-control" value = "0"/>
                                    <input type="text" name="nama"  id="nama" data-required="1" class="form-control"/>
								</div>
							</div>
						</div>
                        <div class="form-group">
							<label class="control-label col-md-3">Jenis </label>
							<div class="col-md-8">
								<input type="text" name="jenis" id="jenis"  data-required="1" class="form-control"/>
							</div>
						</div>
                        <div class="form-group">
							<label class="control-label col-md-3">Harga</label>
							<div class="col-md-4">
                                <div class="input-icon right">
									<i class="fa"></i>
                                    <input type="text" name="harga" id="harga"  value="0" data-required="1" class="form-control"/>
								</div>
							</div>
						</div>
                        <div class="form-group">
							<label class="control-label col-md-3">Keuntungan </label>
							<div class="col-md-4">
                                <div class="input-icon right">
									<i class="fa"></i>
                                    <input type="number" name="keuntungan" id="keuntungan"  value="0" data-required="1" class="form-control"/>
								</div>
							</div>
						</div>
                        <div class="form-group">
							<label class="control-label col-md-3">Harga Jual </label>
							<div class="col-md-4">
                                <div class="input-icon right">
									<i class="fa"></i>
                                    <input type="text" name="jual" id="jual" value="0" data-required="1" class="form-control disabled" readonly="true"/>
								</div>
							</div>
						</div>
                        <div class="form-group">
							<label class="control-label col-md-3">Stok Awal </label>
							<div class="col-md-4">
                                <div class="input-icon right">
									<i class="fa"></i>
                                    <input type="number" name="stok" id="stok" data-required="1" class="form-control" value="0"/>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn green" id="simpan">Simpan</button>
                    <button type="button" data-dismiss="modal" class="btn default">Batal</button>
				</div>
			</div>
		</div>
	</div>
  <!-- END MODAL -->

@endsection

@section('script')
  <script type="text/javascript">
    var refreshTable = function (tbl, url) {
        $(tbl).dataTable().fnDestroy();
        return $(tbl).dataTable({
            'bLengthChange' : true,
            'aLengthMenu'   : [[15, 30, 50], [15, 30, 50]],
            "bProcessing"   : true,
            "bServerSide"   : true,
            "sAjaxSource"   : url,
            "language"      : {
                "lengthMenu"  : "Tampilkan _MENU_ data per halaman",
                "zeroRecords" : "Maaf, data tidak ditemukan",
                "info"        : "Menampilkan _START_ Sampai _END_ Data Dari _TOTAL_ data",
                "infoEmpty"   : "Tidak ada data yang tersedia",
                "infoFiltered": "(dari total  _MAX_ data)"
            },
            "aoColumns": [
                {data:"no", width:"1%"},
                {data:"nama", width:"20%", "orderable": true},
                {data:"jenis", width:"19%"},
                {data:"harga", width:"15%", "sClass":"right"},
                {data:"utg", width:"10%", "sClass":"right"},
                {data:"jual", width:"15%", "sClass":"right"},
                {data:"stok", width:"5%", "sClass":"center"},
                {data:"act", width:"15%", "sClass":"center"},
            ]
        });
    }

    var src = "{{ url('/barang/list') }}";
    refreshTable("#tabel-barang",src);
    $('.dataTables_paginate').last().addClass('pull-right');
    $('.dataTables_filter').addClass('pull-right');

    // Validate form-tambah
    var form2       = $('#form-tambah');
    var error2      = $('.alert-danger', form2);
    var success2    = $('.alert-success', form2);

    form2.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "",  // validate all fields including form hidden input
        rules: {
            nama: {
                minlength: 2,
                required: true
            },
            jenis: {
                minlength: 2,
                required: true
            },
            harga: {
                required: true,
                number: true
            },
            keuntungan: {
                required: true,
                number: true
            },
            stok: {
                required: true,
                number: true
            }
        },

        invalidHandler: function (event, validator) { //display error alert on form submit
            success2.hide();
            error2.show();
            Metronic.scrollTo(error2, -200);
        },

        errorPlacement: function (error, element) { // render error placement for each input type
            var icon = $(element).parent('.input-icon').children('i');
            icon.removeClass('fa-check').addClass("fa-warning");
            icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
        },

        highlight: function (element) { // hightlight error inputs
            $(element)
                .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group
        },

        unhighlight: function (element) { // revert the change done by hightlight

        },

        success: function (label, element) {
            var icon = $(element).parent('.input-icon').children('i');
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
            icon.removeClass("fa-warning").addClass("fa-check");
        },

        submitHandler: function (form) {
            success2.show();
            error2.hide();
            form[0].submit(); // submit the form
        }
    });
    
    $("#harga").on('change', function(){

        var harga       = parseInt($("#harga").val());
        var keuntungan  = parseInt($("#keuntungan").val());
        var jual        = ( (keuntungan / 100) * harga ) + harga;
        $("#jual").val(jual);
    });

    $("#keuntungan").on('change', function(){

        var harga       = parseInt($("#harga").val());
        var keuntungan  = parseInt($("#keuntungan").val());
        var jual        = ( (keuntungan / 100) * harga ) + harga;
        $("#jual").val(jual);
    });

    $('#simpan').click(function(){
        var form = $('#form-tambah');
        if (form.valid()) {
            $.ajax({
                type    : 'post',
                url     : '{{ url('/barang') }}',
                data    : form.serialize(),
                dataType : 'json',
                success : function(rs) {
                    if (rs.sts == '1') {
                        form.trigger('reset');
                        $('#tambah').modal('hide');
                        refreshTable("#tabel-barang",src);
                        $('.dataTables_paginate').last().addClass('pull-right');
                        $('.dataTables_filter').addClass('pull-right');
                    }
                },
                error: function(data)
                {
                    var errors = '';
                    for(datos in data.responseJSON){
                        errors += data.responseJSON[datos] + '<br>';
                    }
                    $('#messages').show(300).html(errors);
                    setTimeout(function(){
                        $('#messages').hide(300).html('');
                    }, 1000);
                }
            });
        }
    });

    $("#tambah").on('bs.modal.hide', function () {
        $("#form-tambah").triggered('reset');
    });

    function edit(a){
        var btn = $(a);
        $.ajax({
            url :'{{ url('/barang/edit') }}',
            type : 'post',
            dataType : 'json',
            data : {
                '_token' : $('input[name="_token"]').val(),
                'id' : btn.attr("data-id")
            },
            success : function(rs){
                $('#id').val(rs.id);
                $('#nama').val(rs.nama_barang);
                $('#jenis').val(rs.jenis);
                $('#harga').val(rs.harga);
                $('#keuntungan').val(rs.keuntungan);
                $('#stok').val(rs.stok);
                var jual = ((rs.keuntungan / 100) * rs.harga ) + rs.harga;
                $('#jual').val(jual);

                $('#tambah').modal('show');
            },
            error : function(){

            }
        });
    }

    // function hapus(a) {
    //     var btn = $(a), row = btn.parents('tr.baris');
    //     var cek = confirm("apakah anda yakin ingin menghapus data ini ?");
    //     // row.hide(300);
    //     if(cek){
    //         $.ajax({
    //             type    : 'post',
    //             url     : '  url('/barang/delete') ',
    //             dataType : 'json',
    //             data    : {
    //                 '_token' : $('input[name="_token"]').val(),
    //                 'id' : btn.attr("data-id")
    //             },
    //             success : function(rs) {
    //                 row.hide(150);
    //                 // if (rs.sts == '1') {
    //                 //     alert(rs.msg);
    //                 // }
    //             },
    //             error: function(data)
    //             {
    //                 alert("terjadi kesalahan");
    //             }
    //         });
    //     } else {
    //
    //     }
    // }

    // $('#demo_5').click(function(){
    function alertHapus(a) {
        // $('#demo_3').click(function(){
        var btn = $(a), row = btn.parents('tr.baris');
        bootbox.confirm("Apakah anda yakin ingin menghapus data ini ?", function(result) {
                $.ajax({
                    type    : 'post',
                    url     : ' {{ url('/barang/delete') }} ',
                    dataType : 'json',
                    data    : {
                        '_token' : $('input[name="_token"]').val(),
                        'id' : btn.attr("data-id")
                    },
                    success : function(rs) {
                        row.hide(150);
                        // if (rs.sts == '1') {
                        //     alert(rs.msg);
                        // }
                    },
                    error: function(data)
                    {
                        alert("terjadi kesalahan");
                    }
                });
        });
    }


  </script>
@endsection
