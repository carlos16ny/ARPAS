// function loginClick(event){
//     event.preventDefault();

//     dados = {
//         "action" : "login",
//         "type" : "user",
//         "senha" : $('#senha')[0].value,
//         "email" : $('#email')[0].value
//     }
//     // console.log(JSON.stringify(dados));
//     xml = new XMLHttpRequest();
//     url = "../assets/php/registerLogin.php";
//     xml.open("POST", url, true);
//     xml.setRequestHeader("Content-Type", "application/json");
//     xml.onreadystatechange = ()=>{
//         if(xml.readyState == 4 && xml.status == 200){
//             var request = JSON.parse(xml.responseText);
//             if(request){
//                 console.log("entrou");
//                 sessionStorage.setItem('email_user', request.name);
//                 sessionStorage.setItem('nome_user', request.email);
//                 window.location.href = 'menu.php';
//             }else{
//                 console.log("nao entrou");
//             }
//         }
//     }
//     xml.send(JSON.stringify(dados));
// }


function registerClick(event){
    event.preventDefault();

    dados = {
        "action" : "register",
        "type" : "user",
        "senha" : $("#senha1")[0].value,
        "email" : $("#email")[0].value,
        // "bday" : $("#bday")[0].value,
        "nome" : $("#nome")[0].value
    }


    xml = new XMLHttpRequest();
    url = "../assets/php/registerLogin.php";
    xml.open("POST", url, true);
    xml.setRequestHeader("Content-Type", "application/json");
    xml.onreadystatechange = () => {
        if (xml.readyState == 4 && xml.status == 200) {
            var request = xml.responseText;

            if (request == 1) {
                bootbox.confirm("Cadastro realizado com sucesso. Relize o login.", function (result) {
                    window.location.href = "index.php"
                });
            }else if (request == 200){
                bootbox.confirm("Já existe um usuário cadastrado com esse email. Tente realizar o login ou recupere sua senha via email", function (result) {
                    window.location.href = "index.php"
                });
            }else{
                bootbox.confirm("Cadastro não pode ser concluido, tente novamente.", function (result) {
                    window.location.reload(true);
                });
            }
        }
    }
    xml.send(JSON.stringify(dados));
}

$("#senha2").blur(()=>{
    if ($("#senha1")[0].value == $("#senha2")[0].value){
        $(".glyphicon-lock").css("color", "green");
        $("#registrar")[0].removeAttribute("disabled");
    }else{
        $(".glyphicon-lock").css("color", "red");
    }
});