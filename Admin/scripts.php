<!-- Vendor js -->
<script src="assets/js/vendor.min.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

<!-- Apex Chart js -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>

<!-- Projects Analytics Dashboard App js -->
<script src="assets/js/pages/dashboard.js"></script>

<!-- Datatables js -->
<script src="assets/vendor/datatables/dataTables.min.js"></script>
<script src="assets/vendor/datatables/dataTables.bootstrap5.min.js"></script>
<script src="assets/vendor/datatables/dataTables.responsive.min.js"></script>
<script src="assets/vendor/datatables/responsive.bootstrap5.min.js"></script>
<script src="assets/vendor/datatables/fixedColumns.bootstrap5.min.js"></script>
<script src="assets/vendor/datatables/dataTables.fixedHeader.min.js"></script>
<script src="assets/vendor/datatables/dataTables.buttons.min.js"></script>
<script src="assets/vendor/datatables/buttons.bootstrap5.min.js"></script>
<script src="assets/vendor/datatables/buttons.html5.min.js"></script>
<script src="assets/vendor/datatables/buttons.print.min.js"></script>
<script src="assets/vendor/datatables/jszip.min.js"></script>
<script src="assets/vendor/datatables/pdfmake.min.js"></script>
<script src="assets/vendor/datatables/vfs_fonts.js"></script>
<script src="assets/vendor/datatables/dataTables.keyTable.min.js"></script>
<script src="assets/vendor/datatables/dataTables.select.min.js"></script>

<!-- Datatable Demo js -->
<script src="assets/js/components/table-datatable.js"></script>

<!-- dropdown validation-->
 <script>
document.addEventListener('DOMContentLoaded', function () {
  const form = document.querySelector('.needs-validation');

  const syncChoicesValidity = (select) => {
    // Choices wraps the select; find the wrapper
    const wrapper =
      select.closest('.choices') ||
      (select.parentElement && select.parentElement.querySelector('.choices'));

    if (!wrapper) return;

    // Toggle Bootstrap validity classes on the Choices wrapper
    if (select.validity.valid) {
      wrapper.classList.remove('is-invalid');
      wrapper.classList.add('is-valid');
    } else {
      wrapper.classList.remove('is-valid');
      wrapper.classList.add('is-invalid');
    }
  };

  // On submit: run native validation and style everything
  form.addEventListener('submit', function (e) {
    if (!form.checkValidity()) {
      e.preventDefault();
      e.stopPropagation();
    }
    form.classList.add('was-validated');

    // Sync all Choices selects
    form.querySelectorAll('select[data-choices]').forEach(syncChoicesValidity);
  }, false);

  // Keep select validity in sync as the user interacts
  form.querySelectorAll('select[data-choices]').forEach((sel) => {
    ['change', 'blur', 'invalid', 'input'].forEach(evt => {
      sel.addEventListener(evt, () => syncChoicesValidity(sel));
    });
  });
});
</script>

<script>
$(document).on("click", ".statusBtn", function(){

    let id     = $(this).data("id");
    let status = $(this).data("status");
    let table  = $(this).data("table");   //  read table name
    let btn    = $(this);

    $.post("update_status.php",
    {
        id:id,
        status:status,
        table:table
    },
    function(res){

        if(res == 1){

            let newStatus = (status == 1 ? 0 : 1);

            btn.data("status", newStatus);
            btn.text(newStatus == 1 ? "Active" : "Inactive");

            // Toggle class
            if(newStatus == 1){
                btn.removeClass("btn-danger").addClass("btn-success");
            } else {
                btn.removeClass("btn-success").addClass("btn-danger");
            }
        }

    });

});
</script>