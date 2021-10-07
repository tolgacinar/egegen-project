 </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
  <div class="p-3">
    <h5>Title</h5>
    <p>Sidebar content</p>
  </div>
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
  <!-- To the right -->
  <div class="float-right d-none d-sm-inline">
    Anything you want
  </div>
  <!-- Default to the left -->
  <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url("assets/admin/plugins/jquery/jquery.min.js") ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url("assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
<script src="<?php echo base_url("assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js") ?>"></script>

<script type="text/javascript" src="<?php echo base_url("assets/admin/dist/js/jquery-menu-editor.min.js") ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/admin/plugins/bootstrap-iconpicker/js/iconset/fontawesome5-3-1.min.js") ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/admin/plugins/bootstrap-iconpicker/js/bootstrap-iconpicker.min.js") ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/admin/plugins/toastr/toastr.min.js") ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url("assets/admin/dist/js/adminlte.min.js") ?>"></script>

<script type="text/javascript">
  $(function () {
    bsCustomFileInput.init();
  });
  $(document).ready(function() {
    if($("#menuBuilder").length) {
     var iconPickerOptions = {searchText: "Ara...", labelHeader: "{0}/{1}"};
     var sortableListOptions = {
      placeholderCss: {'background-color': "#cccccc"}
    };

    var editor = new MenuEditor('myEditor', {listOptions: sortableListOptions, iconPicker: iconPickerOptions});
    editor.setForm($('#frmEdit'));
    editor.setUpdateButton($('#btnUpdate'));
    $.get('/admin/menus/get_menu', function(data) {
      editor.setData(data);
    });

    $('#btnSave').on('click', function (e) {
      var str = editor.getString();
      e.preventDefault();
      $.ajax({
        type: "POST",
        data: {menu:str},
        url: "/admin/menus/save_menu",
        success: function(donen) {
          if (donen.status) {
            toastr.success("Menü başarıyla kaydedildi.", "Menü")
          }else {
            toastr.error("Menü kaydedilirken bir hata meydana geldi.", "Menü")
          }
        }
      });
    });

    $("#btnUpdate").click(function(){
      editor.update();
    });

    $('#btnAdd').click(function(){
      editor.add();
    });

    $('[data-toggle="tooltip"]').tooltip();
  }
});
</script>
</body>
</html>
