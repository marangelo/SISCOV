<div class="">
    <script>
        function change(){
            loc="www.google.com";
            $('#calendar').attr('src', loc);
        }
    </script>
    <div class="row menu">     
        <?php
            if (!isset($_SESSION['Permiso'])) {
            }else{
                if(($_SESSION['Permiso'] == 1) OR ($_SESSION['Permiso'] == 2)){
                    $csql = '<div class="col offset-l3 s12 l2">
                                <div class="card small" >
                                    <a href='.base_url("index.php/CalSemana").'>
                                        <div class="card-image">
                                            <img style="margin-top:20px;" src='.base_url("assets/img/reporte/CalSemana.png").' >
                                        </div>
                                        <div class="card-content center">
                                            <p style="color:black;">CALENDARIO</p>
                                        </div>
                                    </a>
                                </div>
                             </div>';
                }

                echo $csql;
            }
        ?> 
    </div>
</div>
