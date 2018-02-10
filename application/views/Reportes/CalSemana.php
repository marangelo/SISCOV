<!--//////////////////////////////////////////////////////////
                CONTENIDO
///////////////////////////////////////////////////////////-->
<main class="mdl-layout__content mdl-color--grey-100">
    <div class="contenedor">
       
        <!--/////////////////////////////////////////////////////////////////////////////////////////
                                       BOTONES
        //////////////////////////////////////////////////////////////////////////////////////////-->
         <br><br>
        <div class="right row">
            <div id="crearR" class="col s1 m1 l1">
                <a data-tooltip='CREAR REPORTE' class="tooltipped">
                    <i style='font-size:40px;' class="waves-effect waves-purple material-icons">assignment</i>
                </a>
            </div>
            <div class="col s1 m1 l1"><p></p></div><div class="col s1 m1 l1"><p></p></div>
            <div class="col s1 m1 l1">
                <a data-tooltip='CERRAR' href="<?php echo base_url('index.php/Reportes')?>" class="tooltipped">
                    <i style='font-size:35px;' class="waves-effect waves-red material-icons">highlight_off</i>
                </a>
            </div>
        </div>
        <br><br>
        <!-- ////////////////////////////////////////////////////////////////////////////////////////// -->
        
        <table id="TblMaster" class="striped">
            <caption style="border-radius: 20px 20px 0px 0px; background: #233778; color: white">
                <aside style="color: #233778">UP</aside>
                <aside style="border-bottom: white 2px solid; text-align: left">
                    <span style="border-right: white 1px solid; padding:20px">TRABAJADOR</span>
                    <span style="border-right: white 1px solid; padding:50px">LUNES</span>
                    <span style="border-right: white 1px solid; padding:50px">MARTES</span>
                    <span style="border-right: white 1px solid; padding:36px">MIERCOLES</span>
                    <span style="border-right: white 1px solid; padding:50px">JUEVES</span>
                    <span style="border-right: white 1px solid; padding:45px">VIERNES</span>
                    <span style="border-right: white 1px solid; padding:50px">SABADO</span>
                    <span style="padding:80px">PROMEDIO</span>
                </aside>
            </caption>
            <thead>
                <tr class="tblcabecera">
                    <th style="border-radius: 0px 0px 0px 20px;">Factor de <br>Evaluación</th>
                    <th>resul<br>tado</th><th>puntos</th>
                    <th>resul<br>tado</th><th>puntos</th>
                    <th>resul<br>tado</th><th>puntos</th>
                    <th>resul<br>tado</th><th>puntos</th>
                    <th>resul<br>tado</th><th>puntos</th>
                    <th>resul<br>tado</th><th>puntos</th>
                    <th>semana<br>actual</th>
                    <th>semana<br>pasada</th>
                    <th style="border-radius: 0px 0px 20px 0px;">acumulado <br>X mes</th>
                </tr>
            </thead>
            <tbody>
                <?PHP
                    if(!($RWS)){
                    } else {
                        foreach ($RWS as $key) {
                            echo "<tr>                                    
                                    <td class='bold'>".$key['TB']."</td>
                                    <td>".$key['LunR']."</td><td>".$key['LunP']."</td>
                                    <td>".$key['MarR']."</td><td>".$key['MarP']."</td>
                                    <td>".$key['MieR']."</td><td>".$key['MieP']."</td>
                                    <td>".$key['JueR']."</td><td>".$key['JueP']."</td>
                                    <td>".$key['VieR']."</td><td>".$key['VieP']."</td>
                                    <td>".$key['SabR']."</td><td>".$key['SabP']."</td>
                                    <td>".$key['PSAc']."</td>
                                    <td>".$key['PSAn']."</td>
                                    <td>".$key['PAM']."</td>
                                  </tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</main>

<!--/////////////////////////////////////////////////////////////////////////////////////////
                                        MODALES
//////////////////////////////////////////////////////////////////////////////////////////-->
<!-- AGREGAR TRABAJADOR -->
<div id="AReporte" class="modal">
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
                <h6 class="center" style="font-family:'robotoblack'; color:#831F82;font-size:30px; margin-bottom:30px;"><br>SELECCIONAR REPORTE</h6>
            </div>
        </div>
        
        <div class="row">
            <form class="col s12"  method="post" name="formAddWork">
                <div class="row"><h2></h2></div>

                <div class="row">
                     <div class="col s12 m4 l4">
                        <input name="fecha" placeholder="FECHA DE INICIO" id="fecha" type="date" class="datepicker" value="<?php echo date("Y-m-d");?>">
                        <label id="lblFecha" class="labelValidacion">SELECCIONE LA SEMANA</label>
                    </div>

                    <div class="col s12 m4 l4">
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

                    <div class="col s12 m4 l4">
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
			      	    <a class="Btnadd btn waves-effect waves-light" id="AddReporte" onclick="EnviarReporte()" style="background-color:#831F82;">FILTRAR
                            <i class="material-icons right">send</i>
                        </a>
			        </div>
                </div>
            </form>
        </div>
    </div><!-- FIN DEL CONTENIDO DEL MODAL -->
</div>