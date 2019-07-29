@extends('base/template')
@section('konten')
<div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
        <h3 class="content-header-title">Film Yang Sedang Tayang | {{ $now }} </h3>
    </div>
</div>

<div class="row match-height" id="hasil">

</div>

<script>

function currencyFormatDE(num) {
return (
  num
    .toFixed(2) // always two decimal digits
    .replace('.', ',') // replace decimal point character with ,
    .replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
  ) // use . as a separator
}

$(document).ready(function() {
    $('#search').keyup(function(){
   let query = $(this).val();
   const url = `api/v1/film?search=${query}`;
   $("#hasil").html('');
   if (query = ''){
     const hasil = "";
   }
   else {
     $.ajax({
       url : url,
       type : 'GET',
       contentType: "application/json; charset=utf-8",
       dataType : "json",
       success: res=>{
         console.log(res.data.data)
         if(res){
           $("#hasil").html('');
           $("#hasil").append(
             '<div class="col-lg-3 col-md-12">'+
                 '<a href="#">'+
                     '<div class="card">'+
                         '<div class="card-body" style="margin-bottom: -10px!important;">'+
                             '<h4 class="card-title">'+ res.data.data.name +'</h4>'+
                             '<h6 class="card-subtitle text-muted">'+ res.data.data.genre.name +'</h6>'+
                         '</div>'+
                         '<img style="max-height:250px!important;"class="" src="/images/'+ res.data.data.foto +'" alt="Card image cap">'+
                         '<div class="card-body">'+
                             '<p class="card-text">'+
                                 '<font color="#6b6f80">'+ res.data.data.deskripsi.substr(0, 150)+'....</font>'+
                             '</p>'+
                         '</div>'+
                     '</div>'+
                 '</a>'+
             '</div>'
           );

       }else{
         $("#hasil").html('');
          $("#hasil").append(
            '<div class="col-md-12">'+
              '<center>'+
                '<font color="red">'+
                  '<strong>Hasil Pencarian Film Tidak Ditemukan</strong>'+
                '</font>'+
              '</center>'+
            '</div>');
       }
       }
     })
   }
   });
 });

  $(function () {
    $.ajax({
        url: 'api/v1/film?active',
        type: 'GET',
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: data => {
            data.data.data.forEach(data => {
                $("#hasil").append(
    '<div class="col-lg-3 col-md-12">'+
        '<a href="#">'+
            '<div class="card">'+
                '<div class="card-body" style="margin-bottom: -10px!important;">'+
                    '<h4 class="card-title">'+ data.name +'</h4>'+
                    '<h6 class="card-subtitle text-muted">'+ data.genre.name +'</h6>'+
                '</div>'+
                '<img style="max-height:250px!important;"class="" src="/images/'+ data.foto +'" alt="Card image cap">'+
                '<div class="card-body">'+
                    '<p class="card-text">'+
                        '<font color="#6b6f80">'+ data.deskripsi.substr(0, 150)+'....</font>'+
                    '</p>'+
                '</div>'+
            '</div>'+
        '</a>'+
    '</div>'
            )
          })
        }
      });
  });
</script>
@endsection
