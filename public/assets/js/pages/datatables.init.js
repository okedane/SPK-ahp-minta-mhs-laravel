$(document).ready(function () {
  // Inisialisasi DataTable untuk elemen dengan id 'datatable'
  $("#datatable").DataTable();

  // Inisialisasi DataTable dengan opsi untuk elemen dengan id 'datatable-buttons'
  $("#datatable-buttons").DataTable({
    scrollX: true,
    lengthChange: false,
    buttons: [
      {
        extend: "copy",
        text: "Copy",
        exportOptions: {
          columns: ":not(:last-child)"
        }
      },
      {
        extend: "excel",
        text: "Excel",
        title: "IMPLEMENTASI METODE AHP DALAM SISTEM PENDUKUNG KEPUTUSAN\nUNTUK MENGUKUR MINAT MAHASISWA DALAM MERANCANG USAHA",
        exportOptions: {
          columns: ":not(:last-child)"
        },
        customize: function (xlsx) {
          var sheet = xlsx.xl.worksheets["sheet1.xml"];
          $(sheet)
            .find("row")
            .not(":first")
            .find("c")
            .attr("s", "25");
        }
      },
      {
        extend: "pdf",
        text: "PDF",
        title: "IMPLEMENTASI METODE AHP DALAM SISTEM PENDUKUNG KEPUTUSAN\nUNTUK MENGUKUR MINAT MAHASISWA DALAM MERANCANG USAHA",
        orientation: "landscape",
        pageSize: "A4",
        exportOptions: {
          columns: ":not(:last-child)"
        }
      },
      {
        extend: "print",
        text: "Print",
        title: "IMPLEMENTASI METODE AHP DALAM SISTEM PENDUKUNG KEPUTUSAN UNTUK MENGUKUR MINAT MAHASISWA DALAM MERANCANG USAHA",
        exportOptions: {
          columns: ":not(:last-child)"
        },
        customize: function (win) {
          $(win.document.body).find("table")
            .css("border-collapse", "collapse")
            .css("width", "100%");

          $(win.document.body).find("table, table th, table td")
            .css("border", "1px solid #000")
            .css("padding", "4px");
        }
      },
      "colvis"
    ],
    columnDefs: [
      { targets: -1, orderable: false }
    ]
  })
    .buttons()
    .container()
    .appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)");
  // Menambahkan kelas pada elemen select dalam DataTables
  $(".dataTables_length select").addClass("form-select form-select-sm");
});
