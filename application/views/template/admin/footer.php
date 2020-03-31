    <!-- Required Js -->
    <script src="<?= base_url() ?>assets/admin/js/vendor-all.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/plugins/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/pcoded.min.js"></script>

<!-- Apex Chart -->
<script src="<?= base_url() ?>assets/admin/js/plugins/apexcharts.min.js"></script>


<!-- custom-chart js -->
<script src="<?= base_url() ?>assets/admin/js/pages/dashboard-main.js"></script>

<!-- Datatable -->
<script src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready( function () {
    $('#dataTable').DataTable();
    $('#all_table').DataTable();
    $('#all_table2').DataTable();
} );
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js">
</script>
<script>
$('.picker').datetimepicker({
    timepicker: false,
    datepicker: true,
    format: 'd-m-Y', // formatDate
    minDate: 0,
});

function disable()
{
 document.onkeydown = function (e) 
 {
  return false;
 }
}
</script>

</body>

</html>