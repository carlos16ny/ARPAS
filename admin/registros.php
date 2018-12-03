<?php 
session_start();
$tituloPagina = "Administrador";
include_once 'assets/templates/header.php';
include_once 'assets/php/registrosController.php';

?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>Registros</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container">
      <div class="row mt-4"> 
        <div class="box box-default box-solid collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Reservas Não Pagas</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
            </div>
            <div class="box-body" >
              <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Registros</h3>
                    <div class="box-tools">
                      <div class="input-group input-group-sm" style="width: 250px;">
                        <input type="text" id="table_search1" class="form-control pull-right" onkeyup="pesquisa1()" placeholder="Pesquisa por data">
                        <div class="input-group-btn">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="box-body table-responsive table-bordered no-padding">
                    <table class="table table-hover" id="tabela_reg1">
                      <thead>
                        <th>ID</th>
                        <th>Usuário</th>
                        <th>Dia</th>
                        <th>Quarto</th>
                        <th>Status</th>
                      </thead>
                      <tbody>
                        <?php foreach($reservas as $p){
                            $d = DateTime::createFromFormat('Y-m-d', $p->check_in);
                          ?>
                          <tr>
                            <td><?=$p->id?></td>
                            <td><?=$p->name?></td>
                            <td><?=$d->format('d/m/Y')?></td>
                            <td><?=$p->room_num?></td>
                            <td><span class="label label-info">Reservada</span></td>
                          </tr>
                        <?php } ?>
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
      </div>      
      <div class="row mt-4"> 
        <div class="box box-success box-solid collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Reservas Pagas</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Registros</h3>
                    <div class="box-tools">
                      <div class="input-group input-group-sm" style="width: 250px;">
                        <input type="text" id="table_search2" class="form-control pull-right" onkeyup="pesquisa2()" placeholder="Pesquisa por data">
                        <div class="input-group-btn">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="box-body table-responsive table-bordered no-padding">
                    <table class="table table-hover" id="tabela_reg2">
                      <thead>
                        <th>ID</th>
                        <th>Usuário</th>
                        <th>Dia</th>
                        <th>Quarto</th>
                        <th>Status</th>
                      </thead>
                      <tbody>
                        <?php foreach($pagos as $p){
                            $d = DateTime::createFromFormat('Y-m-d', $p->check_in);
                          ?>
                          <tr>
                            <td><?=$p->id?></td>
                            <td><?=$p->name?></td>
                            <td><?=$d->format('d/m/Y')?></td>
                            <td><?=$p->room_num?></td>
                            <td><span class="label label-success">Paga</span></td>
                          </tr>
                        <?php } ?>
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
      </div>      
      <div class="row mt-4"> 
        <div class="box box-danger box-solid collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Reservas Canceladas</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Registros</h3>
                    <div class="box-tools">
                      <div class="input-group input-group-sm" style="width: 250px;">
                        <input type="text" id="table_search3" class="form-control pull-right" onkeyup="pesquisa3()" placeholder="Pesquisa por data">
                        <div class="input-group-btn">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="box-body table-responsive table-bordered no-padding">
                    <table class="table table-hover" id="tabela_reg3">
                      <thead>
                        <th>ID</th>
                        <th>Usuário</th>
                        <th>Dia</th>
                        <th>Quarto</th>
                        <th>Status</th>
                      </thead>
                      <tbody>
                        <?php foreach($cancelados as $p){
                            $d = DateTime::createFromFormat('Y-m-d', $p->check_in);
                          ?>
                          <tr>
                            <td><?=$p->id?></td>
                            <td><?=$p->name?></td>
                            <td><?=$d->format('d/m/Y')?></td>
                            <td><?=$p->room_num?></td>
                            <td><span class="label label-danger">Cancelada</span></td>
                          </tr>
                        <?php } ?>
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
      </div>      
    </section>
<?php include_once 'assets/templates/footer.php' ?>


<script>
function pesquisa1() {
  // Declare variables 
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("table_search1");
  filter = input.value.toUpperCase();
  table = document.getElementById("tabela_reg1");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
function pesquisa2() {
  // Declare variables 
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("table_search2");
  filter = input.value.toUpperCase();
  table = document.getElementById("tabela_reg2");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
function pesquisa3() {
  // Declare variables 
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("table_search3");
  filter = input.value.toUpperCase();
  table = document.getElementById("tabela_reg3");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>