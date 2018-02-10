<header></header>
    <main></main>
    <footer class="page-footer" style="background-color: #831F82 !important;">
        <div class="footer-copyright center" style="background-color: #831F82!important; font-family:'robotomedium';color:white;">         
                © <?php echo date('Y')?> Copyright GCIT-GUMA
        </div>
    </footer>
    
    <!--
        <script type="text/javascript" src="<?php echo base_url('assets/js/JQExcel.js')?>"></script>
        <script type="text/javascript">
            $(".botonExcel").click(function(event) {        
                
                $("#datos_a_enviar").val( $("<div>").append( $("#tbArticulos").eq(0).clone()).html());
                $("#FormularioExportacion").submit();
            });
        </script>
    
    -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/index.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/index_admin.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.numeric.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/sweetalert2.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fullcalendar.min.js"></script>
</body>
</html>