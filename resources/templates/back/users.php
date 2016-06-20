

                    <div class="col-lg-12">
                      

                        <h1 class="page-header">
                            Usuarios
                         
                        </h1>
                          <p class="bg-success">
                            
                        </p>

                        <a href="index.php?add_user" class="btn btn-primary">Agregar Usuario</a>
                        <p class="bg bg-success"></p><?php mostrar_mensaje(); ?>

                        <div class="col-md-12">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Acciones</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>

                                 <?php mostrar_usuarios_admin(); ?>
                                   

                                </tbody>
                            </table> <!--End of Table-->
                        

                        </div>










                        
                    </div>
    











