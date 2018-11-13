$(document).ready(function() {
    $('#btnADM').click(function() {
        console.log($('#inputADM').val());

        $.get("/api/carregainfolig/"+$('#inputADM').val(), function(data, status){
            // alert("Data: " + data + "\nStatus: " + status);
            // console.log(data.Nome_Cliente);

            $('#inputnome').val(data.Nome_Cliente);
        //    console.log(response.json());

        });
        
       // alert(inputADM);
    });
});