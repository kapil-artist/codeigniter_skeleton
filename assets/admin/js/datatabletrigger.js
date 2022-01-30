$(document).ready(function() {
  var table = $('#datatables').DataTable({
    // "pagingType": "full_numbers",
    "lengthMenu": [
      [10, 25, 50, -1],
      [10, 25, 50, "All"]
    ],
    responsive: true,
    language: {
      search: "INPUT",
      searchPlaceholder: "Search records",
    }
  });

  // var table = $('#datatables').DataTable();

  // Edit record

  table.on('click', '.edit', function() {
    $tr = $(this).closest('tr');

    if ($($tr).hasClass('child')) {
      $tr = $tr.prev('.parent');
    }

    var data = table.row($tr).data();
    // alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
    editIconClicked(data[0]);
  });

  // Delete a record

  table.on('click', '.remove', function(e) {
    $tr = $(this).closest('tr');

    if ($($tr).hasClass('child')) {
      $tr = $tr.prev('.parent');
    }
    var data = table.row($tr).data();
    deleteIconClicked(data[0]);
    table.row($tr).remove().draw();
    
    e.preventDefault();
  });

  //Like record

  table.on('click', '.like', function() {
    alert('You clicked on Like button');
  });
});