<!-- Modal Popup untuk delete-->
<div class="modal fade" id="modal_delete">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria- hidden="true">&times;</button>
                <h4 class="modal-title" style="text-align:center;">Anda yakin akan menghapus data
                    ini.. ?</h4>
            </div>
            <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                <a href="#" class="btn btn-danger btn-sm" id="delete_link">Hapus</a>

                <button type="button" class="btn btn-success btn-sm" data- dismiss="modal">Cancel</button>

            </div>
        </div>
    </div>
</div>

</body>

<script type="text/javascript">
    $(document).ready(function() {
        $('#table-datatable').DataTable();
    });
</script>
<!-- Javascript untuk popup modal Delete-->
<script type="text/javascript">
    function confirm_modal(delete_url) {
        $('#modal_delete').modal('show', {
            backdrop: 'static'
        });
        document.getElementById('delete_link').setAttribute('href', delete_url);
    }
</script>

</html>