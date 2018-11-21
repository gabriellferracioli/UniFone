$(document).ready(function() {
    $('#btnADM').click(function() {
        // console.log($('#inputADM').val());
        if ($('#inputADM').val() != '') {
            $.get("/api/carregainfocli/"+$('#inputADM').val(), function(data, status){
                $('#inputnome').val(data.Nome_Cliente);
                $('#inputrazao').val(data.Razaosocial_Cliente);      
            });
        }
    });
});
if (window.location.href == "http://localhost:8000/ligacoes"){
$("tr").click(function () {
    sessionStorage.clear();
    var rowItems = $(this).children('td').map(function () {
    }).toArray();
    var s = "" + this.innerHTML;   
    var idligacao;
    var i;
    for (i = 0; i < 5; i++) { 
        s = s.replace("<td>",'');
        s = s.replace("</td>",',');
        s = s.replace("\n","");
    }
    idligacao = s.substring(0,s.indexOf(","));
    idligacao = idligacao.trim(idligacao);
    $.get("/api/carregainfolig/"+idligacao, function(data, status){
        // console.log(data); 
        sessionStorage.setItem("idligacao", idligacao);
        sessionStorage.setItem("idCliente", data.Id_Cliente);
        sessionStorage.setItem("Observacoes", data.Observacoes_Ligacao);
        sessionStorage.setItem("Urgencia", data.Urgencia_Ligacao);
        sessionStorage.setItem("Assunto", data.Assunto_Ligacao);        
        window.location="/altligacoes"; 
    });    
});
}

if (window.location.href == "http://localhost:8000/altligacoes"){
    $('#idLigacao').val(""+sessionStorage.idligacao);
    $('#inputADM').val(""+sessionStorage.idCliente);
    $('#inputassunto').val(""+sessionStorage.Assunto);
    $('#cbUrgencia').val(""+sessionStorage.Urgencia);
    $('#inputObservacoes').val(""+sessionStorage.Observacoes);
}


if (window.location.href == "http://localhost:8000/clientes"){
$("tr").click(function () {
    sessionStorage.clear();
    var rowItems = $(this).children('td').map(function () {
    }).toArray();
    var s = "" + this.innerHTML;   
    var idligacao;
    var i;
    for (i = 0; i < 5; i++) { 
        s = s.replace("<td>",'');
        s = s.replace("</td>",',');
        s = s.replace("\n","");
    }
    idcliente = s.substring(0,s.indexOf(","));
    idcliente = idcliente.trim(idcliente);
    $.get("/api/carregainfocli/"+idcliente, function(data, status){
        // console.log(data.CNPJ_Cliente); 
        sessionStorage.setItem("Id", idcliente);
        sessionStorage.setItem("Nome", data.Nome_Cliente);
        sessionStorage.setItem("Razao", data.Razaosocial_Cliente);          
        sessionStorage.setItem("Cnpj", data.CNPJ_Cliente);
        sessionStorage.setItem("Estado", data.Estado_Cliente);
        sessionStorage.setItem("Municipio", data.Municipio_Cliente);
        sessionStorage.setItem("Telefone1", data.Telefone1_Cliente);
        sessionStorage.setItem("Telefone2", data.Telefone2_Cliente);
        window.location="/altcliente"; 
    });    
});
}

if (window.location.href == "http://localhost:8000/altcliente"){
    $('#idcliente').val(""+sessionStorage.Id);
    $('#inputcnpj').val(""+sessionStorage.Cnpj);
    $('#inputnome').val(""+sessionStorage.Nome);
    $('#inputrazao').val(""+sessionStorage.Razao);
    $('#inputmunicipio').val(""+sessionStorage.Municipio);
    $('#cbestados').val(""+sessionStorage.Estado);
    $('#inputtelefone1').val(""+sessionStorage.Telefone1);
    $('#inputtelefone2').val(""+sessionStorage.Telefone2);
}



if (window.location.href == "http://localhost:8000/usuarios"){
$("tr").click(function () {
    sessionStorage.clear();
    var rowItems = $(this).children('td').map(function () {
    }).toArray();
    var s = "" + this.innerHTML;   
    var idligacao;
    var i;
    for (i = 0; i < 5; i++) { 
        s = s.replace("<td>",'');
        s = s.replace("</td>",',');
        s = s.replace("\n","");
    }
    idusuario = s.substring(0,s.indexOf(","));
    idusuario = idusuario.trim(idusuario);
    console.log('Oie');
    $.get("/api/carregainfousu/"+idusuario, function(data, status){
        sessionStorage.setItem("Id", idusuario);
        sessionStorage.setItem("Nome", data.Nome_Usuario);
        sessionStorage.setItem("Ramal", data.Ramal_Usuario);          
        sessionStorage.setItem("Cargo", data.Cargo_Usuario);
        sessionStorage.setItem("Usuario", data.Usuario_Usuario);
        sessionStorage.setItem("Senha", data.password);
        window.location="/altusuario"; 
    });    
});
}


if (window.location.href == "http://localhost:8000/altusuario"){
    $('#idusuario').val(""+sessionStorage.Id);
    $('#inputnome').val(""+sessionStorage.Nome);
    $('#inputramal').val(""+sessionStorage.Ramal);
    $('#cbcargo').val(""+sessionStorage.Cargo);
    $('#inputusuario').val(""+sessionStorage.Usuario);
    $('#inputsenha').val(""+sessionStorage.Senha);
}