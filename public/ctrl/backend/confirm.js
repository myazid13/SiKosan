// Konfirmasi pembayaran
$(document).on('click', '#reject', function () {
  var id = $(this).attr('data-id-reject');
  $.get('/pemilik/reject-payment', {'_token' : $('meta[name=csrf-token]').attr('content'),id:id}, function(_resp){
    window.location.href = "{{ route('booking-lists')}}";
  });
});

// In-Active Promo
$(document).on('click','#inactive', function () {
  var id = $(this).attr('data-id-inactive');
  $.get('/pemilik/promo/inactive-promo', {'_token' : $('meta[name=csrf-token]').attr('content'),id:id}, function(_resp){
    window.location.href = "promo";
  });
});