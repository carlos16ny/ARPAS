// var eventsArray = [];
var resume = [];

$(function () {
    let xml = new XMLHttpRequest();

    var url = "./assets/calendarioInicioController.php";
    xml.open("POST", url, true);
    xml.setRequestHeader("Content-type", "application/json");
    xml.onreadystatechange = () => {
        if (xml.readyState == 4 && xml.status == 200) {
            request = JSON.parse(xml.responseText);
            for(i=0; i<request.length; ++i){
                resume.push({
                    start: request[i].check_in,
                    title : 'Quarto ' + request[i].room_num,
                    backgroundColor: request[i].status == 1 ? '#0073b7' : '#00a65a',
                    allDay : true,
                    borderColor :  'black',
                    textColor : 'white'
                })
            }    
            loadCallendar();
        }
    }

    xml.send();
});


function loadCallendar(){
    var date = new Date()
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear()

    $('#calendar').fullCalendar({

        locale: 'pt-br',
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        buttonText: {
            today: 'Hoje',
            month: 'Mês',
            week: 'Semana',
            day: 'Dia'
        },

        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar !!!
        dayClick: function (date, jsEvent, view) {
            var data = (($(this)).attr('data-date'));
            getAvaliableDays(data);
        },

        // eventColor: 'blue',
        events: resume

    });
}


var options = [];
var complete;



//day by day
function getAvaliableDays(data) {

    var xmlhttp = new XMLHttpRequest();
    var request;

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            request = xmlhttp.responseText;
            complete = JSON.parse(request);
            loadOptions(data);
            
        }
    }

    xmlhttp.open("GET", "assets/getAvaliableDays.php?data=" + data, true);
    xmlhttp.send();

}

function loadOptions(dates){
    options = [];
    complete.forEach(data => {
        options.push(
            {
                text: 'Quarto ' + data.room_num,
                value: data.room_num
            }
        )
    })
    if(options.length > 0){
        displayRooms(dates, options);
    }else{
        bootbox.alert('Não existem quartos disponiveis para esse dia =(').find('.modal-content').css({ 'background-color': '#d24646', 'font-weight': '600', color: '#fff' }).find('button').css({'background-color':'#FA8072', color: '#fff', 'border-color': '#fff'});
    }
};


function loadOptionRange(quartos){
    options = [];
    for(var i=0; i<quartos.length; ++i){
        options.push(
            {
                text: 'Quarto ' + quartos[i],
                value: quartos[i]
            }
        )
    }
    return options;
}

function displayRooms(data, options){
    bootbox.prompt({
        title: "Selecione o quarto",
        inputType: 'select',
        inputOptions: options,
        callback: function (result) {
            console.log(result);
            if(result){
                data = data.split('-');
                var table = $('#resumo')[0];
                let row = table.insertRow(0);
                row.name = "row" + result;
                let cell1 = row.insertCell(0);
                let cell2 = row.insertCell(1);
                let cell3 = row.insertCell(2);
                cell1.innerHTML = 'Quarto ' + result;
                cell2.innerHTML = data[2]+'/'+data[1]+'/'+data[0];
                cell3.innerHTML = "<button onclick='delete_room($(this))' class='btn btn-danger'>Remover</button>";
            }
        }
    });
}


function displayRoomsRange(data_range, datas, options) {
    bootbox.prompt({
        title: "Selecione o quarto para os dias : " + data_range ,
        inputType: 'select',
        inputOptions: options,
        callback: function (result) {
            console.log(result);
            if (result) {
                for(var i=0; i<datas.length; ++i){
                    // data = datas[i].split('-');
                    var table = $('#resumo')[0];
                    let row = table.insertRow(0);
                    row.name = "row" + result;
                    let cell1 = row.insertCell(0);
                    let cell2 = row.insertCell(1);
                    let cell3 = row.insertCell(2);
                    cell1.innerHTML = 'Quarto ' + result;
                    cell2.innerHTML = datas[i];
                    cell3.innerHTML = "<button onclick='delete_room($(this))' class='btn btn-danger'>Remover</button>";
                }

            }
        }
    });
}

function delete_room(element){
    element.parent().parent().remove();
}



$('#reservation').daterangepicker({
   
    "locale": {
        "format": 'DD/MM/YYYY',
        "separator": " - ",
        "applyLabel": "Aplicar",
        "applyName": "search",
        "cancelLabel": "Cancelar",
        "fromLabel": "From",
        "toLabel": "To",
        "weekLabel": "Sem",
        "daysOfWeek": [
            'Dom',
            'Seg',
            'Ter',
            'Qua',
            'Qui',
            'Sex',
            'Sáb'
        ],
        "monthNames": [
            'Janeiro',
            'Fevereiro',
            'Março',
            'Abril',
            'Maio',
            'Junho',
            'Julho',
            'Agosto',
            'Setembro',
            'Outubro',
            'Novembro',
            'Dezembro'
        ]
    }
});


function getRangeDays (start, end) {
    for (var arr = [], dt = start; dt <= end; dt.setDate(dt.getDate() + 1)) {
        arr.push(new Date(dt).toLocaleDateString());
    }
    return arr;
};


//range days

$('#btn-buscar').click((event)=>{

    event.preventDefault();
    let data = $('#reservation')[0].value;

    let data_range = data;

    let xml = new XMLHttpRequest();

    var url = "./assets/getRangeDates.php";
    xml.open("POST", url, true);
    xml.setRequestHeader("Content-type", "application/json");

    data = data.split(' - ');
    let d1 = data[0].split('/'); 
    let data_ini = d1[1] + '/' + d1[0] + '/' + d1[2];
    let d2 = data[1].split('/');
    let data_fim = d2[1] + '/' + d2[0] + '/' + d2[2];

    // console.log(data_ini);

    var days = getRangeDays(new Date(data_ini), new Date(data_fim));


    dados = {
        datas : days
    };

    console.log(JSON.stringify(dados));

    let request;

    xml.onreadystatechange = function () {
        if (xml.readyState == 4 && xml.status == 200) {
            request = JSON.parse(xml.responseText);
            if (request.id_quartos.length == 0) {
                $('#row_alert').show();
                return;
            }else{
                // request.room_num.toArray().foreach(data=>{
                //     console.log(data);
                // })
                options = JSON.parse(JSON.stringify(request.room_num));
                // console.log(options);
                displayRoomsRange(data_range, days, loadOptionRange(options)); 
            }
        }
    }


    xml.send(JSON.stringify(dados));

});

// Envio e resposta das reservas
$("#concluir").click((event)=>{

    event.preventDefault();

    var list = $("#resumo").find("tr").toArray();

    if (list.length == 0) {
        return;
    }
    // console.log(list);
    let days = {};
    let rooms = {}
    list.forEach((item, index) => {
        days[index] = item.cells[1].innerHTML,
        rooms[index] = item.cells[0].innerHTML
    });

    resume = {
        "days": days,
        "rooms": rooms
    }

    let data = JSON.stringify(resume);

    let irregularidades = [];

    xml = new XMLHttpRequest();
    var url = "./assets/resumoPedido.php";
    xml.open("POST", url, true);
    xml.setRequestHeader("Content-type", "application/json");

    xml.onreadystatechange = function () {
        if (xml.readyState == 4 && xml.status == 200) {
            var json = JSON.parse(JSON.stringify(xml.responseText));
            
            if(json == false){
                bootbox.alert("Ouve um erro ao carregar os quartos, a pagina será reiniciada!", function () { 
                    window.location.reload(false); 
                });
            }else{
                let respostas = [...json]
                // console.log(typeof respostas);
                respostas.forEach( (item, index) => {
                    if(item == 0){
                        irregularidades.push(index);
                    }
                });

                if(irregularidades.length > 0){
                    bootbox.alert("Ouve um erro ao reservar algum dia, verifique suas reservas e tente novamente!", function () {
                        window.location.href = "reg_hospedagem.php";
                    });
                }else{
                    bootbox.confirm({
                        message: "Reservas efetuadas com sucesso! Deseja efetuar mais reservas? ",
                        buttons: {
                            confirm: {
                                label: 'Sim',
                                className: 'btn-success'
                            },
                            cancel: {
                                label: 'Não',
                                className: 'btn-danger'
                            }
                        },
                        callback: function (result) {
                            if(result){
                                var table = $('#resumo')[0].remove();
                                window.location.reload();
                            }else{
                                window.location.href = "reg_hospedagem.php";
                            }
                        }
                    });
                }
            }

            
        }
    }

    xml.send(data); 
});
