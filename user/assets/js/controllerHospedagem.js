function selectInput(element){
    
    if(element.hasAttribute('check')){
        element = element.closest("tr");
        let id_row = element.cells[0];
        console.log(id_row);
        
        var table = $('#resumo')[0];
        let rows = table.children;
        rows = [...rows];
        let soma = 0;
        rows.forEach(item => {
            if(item.cells[0].innerHTML == id_row.innerHTML){
                item.remove();
            }
            soma += parseInt(item.cells[3].innerHTML);
        });

        $("#total_pag")[0].innerHTML = soma.toFixed(2);

        let controller = $("#numero_pagamento")[0];

        controller.innerHTML = table.children.length;

    }else{
        element.setAttribute('check', null);
        element = element.closest("tr");

        let td = element.cells;
        var table = $('#resumo')[0];
        let row = table.insertRow(0);

        // Table ->Id / Quarto / Dia / Valor / Deletar

        let cell1 = row.insertCell(0);
        let cell2 = row.insertCell(1);
        let cell3 = row.insertCell(2);
        let cell4 = row.insertCell(3);
        let cell5 = row.insertCell(4);
        

        let controller = $("#numero_pagamento")[0];

        cell1.innerHTML = td[0].innerHTML
        cell2.innerHTML = 'Quarto ' + td[1].innerHTML;
        cell3.innerHTML = td[2].innerHTML;
        cell4.innerHTML = td[4].innerHTML;
        cell5.innerHTML = "<button onclick='delete_room($(this))' class='btn btn-danger'>Remover</button>";

        let rows = table.children;
        rows = [...rows];
        let soma = 0;
        rows.forEach(item => {
            soma += parseInt(item.cells[3].innerHTML);
        });

        $("#total_pag")[0].innerHTML = soma.toFixed(2);


        // console.log(controller);
        controller.innerHTML = table.children.length;

    }
    
}

function delete_room(element) {
    element.parent().parent().remove();
}