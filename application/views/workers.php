<!--//////////////////////////////////////////////////////////
                CONTENIDO
///////////////////////////////////////////////////////////-->
<main class="mdl-layout__content mdl-color--grey-100">
    <div class="contenedor">
       <!-- <div class="container">
            <div class="Buscar row column">               
                <div class="col s1 m1 l1 offset-l3 offset-m2">
                    <i style='color:#039be5; font-size:40px;' class="material-icons">search</i>
                </div>
                <div class="input-field col s12 m6 l4">
                    <input  id="BuscarUsuarios" type="text" placeholder="Buscar" class="validate">
                    <label for="search"></label>
                </div>
            </div>
        </div> -->

        <!--/////////////////////////////////////////////////////////////////////////////////////////
                                       BOTONES
        //////////////////////////////////////////////////////////////////////////////////////////-->
         <br><br>
        <div class="right row">
            <div id="crearT" class="col s1 m1 l1">
                <a data-tooltip='CREAR TRABAJADOR' class="tooltipped">
                    <i style='font-size:40px;' class="waves-effect waves-purple material-icons">recent_actors</i>
                </a>
            </div>
            <div class="col s1 m1 l1"><p></p></div><div class="col s1 m1 l1"><p></p></div>
            <div class="col s1 m1 l1">
                <a data-tooltip='CERRAR' href="<?php echo base_url('index.php/dashboard')?>" class="tooltipped">
                    <i style='font-size:35px;' class="waves-effect waves-red material-icons">highlight_off</i>
                </a>
            </div>
        </div>
        <br><br>
        <!-- ////////////////////////////////////////////////////////////////////////////////////////// -->

        <table id="TblMaster" class="striped"">
            <thead>
                <tr class="tblcabecera">
                    <th style="border-radius: 20px 0px 0px 20px;">Nº</th>
                    <th>NOMBRE COMPLETO</th>                                    
                    <th>CARGO</th>
                    <th>HORARIO</th>
                    <th>ACTIVO</th>
                    <th style="border-radius: 0px 20px 20px 0px;">TABLA</th>
                </tr>
            </thead>
            <tbody>
                <?PHP
                    if(!($TBW)){
                    } else {
                        $c=1;
                        foreach ($TBW as $key) {
                            if($key['Activo'] == 0){
                                $activo ="<td><a data-tooltip='CAMBIAR A INACTIVO' class='btn-flat tooltipped noHover' onclick='BorrarTrabajador(".'"'.$key['IdTb'].'"'.", 1)'><i style='color:green; font-size:30px;' class='material-icons'>done</i></a></td>";
                            }else{
                                $activo ="<td><a data-tooltip='CAMBIAR A ACTIVO' class='btn-flat tooltipped noHover' onclick='BorrarTrabajador(".'"'.$key['IdTb'].'"'.", 0)'><i style='color:red; font-size:30px;' class='material-icons'>close</i></a></td>";
                            }
                                
                            echo "<tr>                                    
                                    <td class='regular'>".$c."</td>
                                    <td class='bold'>".$key['NombreC']."</td>
                                    <td>".$key['Cargo']."</td>
                                    <td>".$key['Horario']."</td>"
                                    .$activo.
                                    "<td><a data-tooltip='CAMBIAR' class='btn-flat tooltipped noHover' onClick='CalendarWK(".'"'.$key['IdTb'].'",'.'"'.$key['NombreC'].'"'.")'><i style='color:blue; font-size:30px;' class='material-icons'>today</i></a></td>
                                  </tr>";
                            $c++;
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</main>
<br>

<!--/////////////////////////////////////////////////////////////////////////////////////////
                                        MODALES
//////////////////////////////////////////////////////////////////////////////////////////-->
<!-- AGREGAR TRABAJADOR -->
<div id="ATrabajador" class="modal">
    <div class="modal-content">
        <div class="right row">
            <div class="col s1 m1 l1">
                <a href="#!" class="BtnClose modal-action modal-close noHover">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
        </div>
        
        <div class="row noMargen center">
            <div class="noMargen col s12 m12 l12">
                <h6 class="center" style="font-family:'robotoblack'; color:#831F82;font-size:30px; margin-bottom:30px;"><br>AGREGAR TRABAJADOR</h6>
            </div>
        </div>
        
        <div class="row">
            <form class="col s12"  method="post" name="formAddWork">
                <div class="row">
                    <div class="input-field col s12 m12 s12">
                        <input class="mayuscula" name="NombreC" placeholder="NOMBRE COMPLETO" id="NombreC" type="text" class="required">
                        <label id="lblNombreC" class="labelValidacion">DIGITE EL NOMBRE COMPLETO</label>
                    </div>
                </div>
                
                <br><br>
                <div class="row">
                    <div class="col s12 m6 l6">
                        <select name="cargo" id="cargo">
                            <option value="">SELECCIONE UN CARGO</option>
                            <?PHP
                                if(!($CGW)){
                                } else {
                                    foreach($CGW as $cargo){
                                        echo '<option value="'.$cargo['Descripcion'].'">'.$cargo['Descripcion'].'</option>';
                                     }
                                 }
                            ?>
                        </select><label id="lblCargo" class="labelValidacion">SELECCIONE UN CARGO</label>
                    </div>

                    <div class="col s12 m6 l6">
                        <select name="turno" id="turno">
                            <option value="">SELECCIONE UN TURNO</option>
                                <?PHP
                                    if(!($TNW)){
                                    } else {
                                        foreach($TNW as $turno){
                                            echo '<option value="'.$turno['Descripcion'].'">'.$turno['Descripcion'].'</option>';
                                        }
                                    }
                                ?>
                            </select><label id="lblTurno" class="labelValidacion">SELECCIONE UN TURNO</label>
                    </div>
                </div>
                
                <br><br>
                <div class="row">                    
                    <div class="center">
			      	    <a class="Btnadd btn waves-effect waves-light" id="AddTrabajador" onclick="EnviarTrabajador()" style="background-color:#831F82;">GUARDAR
                            <i class="material-icons right">send</i>
                        </a>
			        </div>
                </div>
            </form>
        </div>
    </div><!-- FIN DEL CONTENIDO DEL MODAL -->
</div>

<!-- AGREGAR CALENDARIO #039be5 -->
<div id="CWorker" class="modal">
    <div class="modal-content">
        <div class="left row" style="color:red;">
            <h6 id="TxtNombre"></h6>
        </div>
        
        <div class="right row">
            <div class="col s1 m1 l1">
                <a href="#!" class="BtnClose modal-action modal-close noHover">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
        </div>
        <br><br>
        <a href="#" id="CalendarWK"><div id='calendar'></div></a>
    </div>
</div>