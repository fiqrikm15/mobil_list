<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Car List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('Assets/css/bootstrap.min.css');?>" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('Assets/css/bootstrap.css');?>" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('Assets/css/dataTables.bootstrap.css');?>" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('Assets/css/dataTables.bootstrap4.css');?>" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('Assets/css/jquery.dataTables.css');?>" />       
</head>
<body>

<div class = "container">
    <div class = "row">
        <div class="col=md-12">
            <h1>Car<small> List</small></h1>
            <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"></span>Add New Car</a></div>
        </div>
    </div>
    <br>
    <table class="table" id="MyData">
        <thead class="thead-dark" >
            <tr>
            <th scope="col">#</th>
            <th scope="col">Merk</th>
            <th scope="col">Warna</th>
            <th scope="col">Tahun</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="show_data">
        </tbody>
        </table>
</div>

<!-- modal add -->
<form>

    <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Car</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Merk</label>
                    <input type="text" class="form-control" id="merk" aria-describedby="merk" placeholder="Enter Merk Car">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Warna</label>
                    <input type="text" class="form-control" id="warna" aria-describedby="merk" placeholder="Enter Color Car">
                </div>
                
                <div class="form-group">
                    <label for="exampleInputEmail1">Tahun</label>
                    <input type="text" class="form-control" id="tahun" aria-describedby="merk" placeholder="Enter Year Car">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_save">Save</button>
            </div>
            </div>
        </div>
    </div>

</form>
<!-- end modal add -->

<!-- modal edit -->
<form>

    <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Car</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">ID</label>
                    <input type="text" class="form-control" id="id_edit" name="id_edit" aria-describedby="merk" placeholder="Enter Merk Car" disabled>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Merk</label>
                    <input type="text" class="form-control" id="merk_edit" name="merk_edit" aria-describedby="merk" placeholder="Enter Merk Car">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Warna</label>
                    <input type="text" class="form-control" id="warna_edit" name="warna_edit"  aria-describedby="merk" placeholder="Enter Color Car">
                </div>
                
                <div class="form-group">
                    <label for="exampleInputEmail1">Tahun</label>
                    <input type="text" class="form-control" id="tahun_edit" name="tahun_edit" aria-describedby="merk" placeholder="Enter Year Car">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_edit">Save</button>
            </div>
            </div>
        </div>
    </div>

</form>
<!-- end modal edit -->

<!-- modal delete -->
<div class="modal" tabindex="-1" role="dialog" id="Modal_Delete">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Car</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id_delete" name="id_delete">
        <p>Are You Sure Delete This Car?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btn_delete">Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- delete -->
    

<script src="<?php echo base_url('Assets/js/jquery-3.2.1.js');?>"></script>
<script src="<?php echo base_url('Assets/js/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('Assets/js/jquery.dataTables.js');?>"></script>
<script src="<?php echo base_url('Assets/js/dataTables.bootstrap.js');?>"></script>
<script src="<?php echo base_url('Assets/js/dataTables.bootstrap4.js');?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        show_car();
        $('#MyData').dataTable();

        function show_car(){
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('car/get_data') ?>",
                dataType: "JSON",
                success: function(data){
                    var html = "";
                    var i;

                    for(i = 0; i < data.length; i++){
                        html += '<tr>' +
                        '<td>' + (i+1) + '</td>' +
                        '<td>' + data[i].merk + '</td>' +
                        '<td>' + data[i].warna + '</td>' +
                        '<td>' + data[i].tahun + '</td>' +
                        '<td><a href="javascript:void(0);" class="btn btn-primary item-edit" data-id="'+ data[i].id +'" data-merk="'+ data[i].merk +'" data-tahun="'+ data[i].tahun +'" data-warna="'+ data[i].warna +'">Edit</a>'+
                        ' <a href="javascript:void(0);" class="btn btn-danger item-delete" data-id="'+ data[i].id +'">Delete</a></td>' +
                        '</tr>'
                    }

                    $('#show_data').html(html);
                }
            });
        }

        $('#btn_save').on('click', function(){
            var merk = $('#merk').val();
            var tahun = $('#tahun').val();
            var warna = $('#warna').val();

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('car/create_data') ?>",
                dataType: "JSON",
                data: {merk: merk, warna: warna, tahun:tahun},
                success: function(data){
                    $('[name="merk"]').val("");
                    $('[name="warna"]').val("");
                    $('[name="tahun"]').val("");
                    $('#Modal_Add').modal('hide');
                    show_car();
                }
            });
        });

        $('#show_data').on('click', '.item-edit', function(){
            var merk = $(this).data('merk');
            var id = $(this).data('id');
            var warna = $(this).data('warna');
            var tahun = $(this).data('tahun');

            $('#Modal_Edit').modal('show');
            $('[name="merk_edit"').val(merk);
            $('[name="id_edit"').val(id);
            $('[name="tahun_edit"').val(tahun);
            $('[name="warna_edit"').val(warna);
        });

        $('#btn_edit').on('click', function(){
            var merk = $('#merk_edit').val();
            var tahun = $('#tahun_edit').val();
            var warna = $('#warna_edit').val();
            var id = $('#id_edit').val();

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('car/update_data') ?>",
                dataType: "JSON",
                data: {id: id, merk: merk, warna: warna, tahun:tahun},
                success: function(data){
                    $('[name="merk_edit"]').val("");
                    $('[name="id_edit"]').val("");
                    $('[name="warna_edit"]').val("");
                    $('[name="tahun_edit"]').val("");
                    $('#Modal_Edit').modal('hide');
                    show_car();
                }
            });
        });

        $('#show_data').on('click', '.item-delete', function(){
            var id = $(this).data('id');

            $('#Modal_Delete').modal('show');
            $('[name="id_delete"').val(id);
        });

        $('#btn_delete').on('click', function(){
            var id = $('#id_delete').val();

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('car/delete_data') ?>",
                dataType: "JSON",
                data: {id: id},
                success: function(data){
                    $('[name="id_delete"]').val("");
                    $('#Modal_Delete').modal('hide');
                    show_car();
                }
            });
        });
    });
</script>
</body>
</html>