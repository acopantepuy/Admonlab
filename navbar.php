<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">	
	    <!-- Para ser visualizado en dispositivos moviles -->
	    <div class="navbar-header">
	    	<!-- Menu Compacto para dispositivos moviles -->
	    	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#Menu" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	    	</button>
			<!-- Titulo o Imagen de la Barra de Menus-->
	      	<a class="navbar-brand" href="#">AdmonLab</a>
	    </div>
	    <?php
	    	if (isset($_SESSION['UserAdmonLab'])){
		?>
	    <div class="collapse navbar-collapse" id="Menu">
			<ul class="nav navbar-nav">			        
			<!-- Menu Procesos -->
			<li class="dropdown">
	        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Procesos <span class="caret"></span></a>
	          	<ul class="dropdown-menu">
	            	<li><a href="#" id="registro"><spam class="glyphicon glyphicon-tasks" aria-hidden="true"></spam> Registro</a></li>
	            	<li role="separator" class="divider"></li>	            	
	            	<li><a href="#" id="resultados"><spam class="glyphicon glyphicon-tasks" aria-hidden="true"></spam> Resultados</a></li>
	            	<li role="separator" class="divider"></li>	            	
	            	<li><a href="#" id="reportes"><spam class="glyphicon glyphicon-tasks" aria-hidden="true"></spam> Reportes</a></li>
	            	<li role="separator" class="divider"></li>	            	
	            	<li><a href="#" id="exit"><spam class="glyphicon glyphicon-log-out" aria-hidden="true"></spam> Salir</a></li>		            	
	          	</ul>
	        </li>

	        <!-- Menu Tablas -->
			<li class="dropdown">
	         	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tablas <span class="caret"></span></a>
	          	<ul class="dropdown-menu">
	            	<li><a href="#" id="tipoclientes"><spam class="glyphicon glyphicon-list-alt" aria-hidden="true"></spam> Tipo de Clientes</a></li>
	            	<li><a href="#" id="clientes"><spam class="glyphicon glyphicon-list-alt" aria-hidden="true"></spam> Clientes</a></li>
	            	<li role="separator" class="divider"></li>
	            	<li><a href="#" id="tipoanalisis"><spam class="glyphicon glyphicon-list-alt" aria-hidden="true"></spam> Tipo Análisis</a></li>
	            	<li><a href="#" id="analisis"><spam class="glyphicon glyphicon-list-alt" aria-hidden="true"></spam> Análisis</a></li>
	            	<li role="separator" class="divider"></li>	            	
	            	<li><a href="#" id="plantillaproductos"><spam class="glyphicon glyphicon-list-alt" aria-hidden="true"></spam> Plantilla Productos</a></li>
	          	</ul>
	        </li>

	        <!-- Menu Reportes -->
			<li class="dropdown">
	          	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reportes <span class="caret"></span></a>
	          	<ul class="dropdown-menu">
	            	<li><a href="#"><spam class="glyphicon glyphicon-book" aria-hidden="true"></spam> Clientes</a></li>
	            	<li><a href="#"><spam class="glyphicon glyphicon-book" aria-hidden="true"></spam> Análisis</a></li>
		            <li><a href="#"><spam class="glyphicon glyphicon-book" aria-hidden="true"></spam> Productos</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="#"><spam class="glyphicon glyphicon-book" aria-hidden="true"></spam> Reporte Análisis</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="#"><spam class="glyphicon glyphicon-book" aria-hidden="true"></spam> Libro de Entrada</a></li>
	          	</ul>
	        </li>
			
			<!-- Menu Mantenimiento -->
			<li class="dropdown">
	        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mantenimiento <span class="caret"></span></a>
	          	<ul class="dropdown-menu">
		            <li><a href="#"><spam class="glyphicon glyphicon-save" aria-hidden="true"></spam> Backup</a></li>
		            <li><a href="#"><spam class="glyphicon glyphicon-refresh" aria-hidden="true"></spam> Optimizar</a></li>		            		            
		            <li><a href="#"><spam class="glyphicon glyphicon-wrench" aria-hidden="true"></spam> Reparar</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="#"><spam class="glyphicon glyphicon-cog" aria-hidden="true"></spam> Parámetros</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="#"><spam class="glyphicon glyphicon-home" aria-hidden="true"></spam> Empresas</a></li>		            		            
	          	</ul>
	        </li>
			
			<!-- Menu Seguridad -->
			<li class="dropdown">
		    	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Seguridad <span class="caret"></span></a>
		        <ul class="dropdown-menu">
		            <li><a href="#" id="usuarios"><spam class="glyphicon glyphicon-user" aria-hidden="true"></spam> Usuarios</a></li>
		            <li><a href="#" id="roles"><spam class="glyphicon glyphicon-list" aria-hidden="true"></spam> Roles</a></li>		            		            
		        </ul>
	        </li>

			<li>
	      		<a href="#">Ayuda <span class="sr-only">Ayuda</span></a>
	      	</li>
	      			        			        
		</ul>
		<?php
		}
		?>	 			   
	</div>
</nav>