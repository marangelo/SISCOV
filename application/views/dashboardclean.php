<nav>
	<div style="background-color:#831F82!important;" class="nav-wrapper orange accent-4">
		<a style=" margin-top:10px;margin-left:10px;" href="<?php echo base_url('index.php/Menu')?>" class="brand-logo left"><img src="<?php echo base_url('assets/img/logo/innova-blanco.png')?>" width="140px"></a>
		<?php
			if($this->uri->segment(1)=='dashboard' or $this->uri->segment(1)=='Menu'){
				echo '<a href="#" class="brand-logo center">MENU</a>';
			}elseif($this->uri->segment(1)=='Usuarios'){
				echo '<a href="#" class="brand-logo center">LISTA DE USUARIOS</a>';
			}elseif($this->uri->segment(1)=='Trabajadores'){
				echo '<a href="#" class="brand-logo center">LISTA DE TRABAJADORES</a>';
			}elseif($this->uri->segment(1)=='Reportes'){
				echo '<a href="#" class="brand-logo center">REPORTES</a>';
			}elseif($this->uri->segment(1)=='CalSemana'){
				echo '<a href="#" class="brand-logo center">REPORTE DE PRODUCCION</a>';
			}
			
			echo '<ul class="right hide-on-med-and-down">        	
						<li ><a href="'.base_url("index.php/Salir").'"><i style="font-size:40px;" class="material-icons">power_settings_new</i></a></li>  
				  </ul>';
		?>
	</div>
</nav>