$(document).ready(function() {
   $('#oompa-table').DataTable({
      //'columnDefs': [{
      //   'visible': false,
      //   'targets': [0, 1]
      //}],
      'paging': false,
      'searching': true,
      'oLanguage': {
          'sSearch': ''
      },
      'language': {
         'searchPlaceholder': 'suchen'
      }
   });
   $('.oompa-row').click(function(){
      alert($(this).attr('id'));
   });
});



$(function(){
   otable = $('#oompa-table').dataTable();
})

function filterme() {
   var types = $('input:checkbox[name="restaurant"]:checked').map(function(){
      return '^' + this.value + '\$';
   }).get().join('|');
   otable.fnFilter(types, 0, true, false, false, false);
}

function filterRole() {
   var types = $('input:checkbox[name="role"]:checked').map(function(){
      return '^' + this.value + '\$';
   }).get().join('|');
   otable.fnFilter(types, 1, true, false, false, false);
}

function changeRestIcon(num) {
   if($('#restaurant' + num + 'Img').attr('src') == '/img/restaurant/' + num + 'u.png') {
      $('#restaurant' + num + 'Img').attr('src', '/img/restaurant/' + num + '.png');
   } else {
      $('#restaurant' + num + 'Img').attr('src', '/img/restaurant/' + num + 'u.png');
   }
}

function changeRoleIcon(num) {
   if($('#role' + num + 'Img').attr('src') == '/img/role/' + num + 'u.svg') {
      $('#role' + num + 'Img').attr('src', '/img/role/' + num + '.svg');
   } else {
      $('#role' + num + 'Img').attr('src', '/img/role/' + num + 'u.svg');
   }
}