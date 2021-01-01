<template>
  
  <main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="#">Admin</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
     <div class="container-fluid" id="app">
        <!-- Ejemplo de tabla Listado -->
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i>Clientes
                <button type="button" class="btn btn-success" data-toggle="modal"  @click="abrirModal('guardar')">
                    <i class="icon-plus"></i>&nbsp;Nuevo
                </button>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <select class="form-control col-md-3" id="opcion" name="opcion">
                              <option value="nombre">Nombre</option>
                              
                            </select>
                            <input type="text" id="texto" name="texto" class="form-control" placeholder="Texto a buscar">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>Cedula</th>
                          <th>Email</th>
                          <th>Telefono</th>
                          <th>Celular</th>
                          <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <tr  v-for="objeto in ArrayDatos" :key="objeto.id">
                            <td v-text="objeto.nombre"></td>
                            <td v-text="objeto.apellido"></td>
                            <td v-text="objeto.cedula"></td>
                            <td v-text="objeto.email"></td>
                            <td v-text="objeto.tel"></td>
                            <td v-text="objeto.cel"></td>
                            <td> 
                                
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" @click="abrirModal('editar',objeto)">
                                  <i class="icon-pencil"></i>
                                </button> &nbsp;
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" @click="eliminarClien(objeto)">
                                  <i class="icon-trash"></i>
                                </button>
                              </td>
                        </tr>
                    </tbody>
                </table>
                <nav>
                    <ul class="pagination justify-content-end">
                        <li class="page-item">
                            <a class="page-link" href="#">Ant</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">4</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">Sig</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
    <!--Inicio del modal agregar/actualizar-->
    <div class="modal fade" id="modalNuevo" :class="{'mostrar':modal}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" v-text="titulo"></h4>
                    <button type="button" class="close" @click="cerrarModal" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
               <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="form-group row">
                            <label class="col-md-1 form-control-label" for="text-input">Nombre</label>
                            <div class="col-md-5">
                                <input type="text" v-model="nombre"  id="nombre" name="nombre" class="form-control" placeholder="Nombre del cliente">
                                <span class="help-block">(*) Ingrese el nombre</span>
                            </div>
                             <label class="col-md-1 form-control-label" for="text-input">Apellido</label>
                            <div class="col-md-5">
                                <input type="text"  v-model="apellido" id="apellido"  name="apellido" class="form-control" placeholder="Apellido del cliente">
                                <span class="help-block">(*) Ingrese el apellido</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-1 form-control-label" for="text-input">Cedula</label>
                            <div class="col-md-5">
                                <input type="text"  v-model="cedula"  id="cedula" name="cedula" class="form-control" placeholder="Cedula del cliente">
                                <span class="help-block">(*) Ingrese la cedula</span>
                            </div>
                             <label class="col-md-1 form-control-label" for="text-input">Email</label>
                            <div class="col-md-5">
                                <input type="text"  v-model="email"  id="email" name="email" class="form-control" placeholder="Email del cliente">
                                <span class="help-block">(*) Ingrese el email</span>
                            </div>
                         </div>
                        <div class="form-group row">
                            <label class="col-md-1 form-control-label" for="text-input">Telefono</label>
                            <div class="col-md-5">
                                <input type="text"  v-model="tel"  id="telefono" name="telefono" class="form-control" placeholder="Telefono del cliente">
                                <span class="help-block">(*) Ingrese el telefono</span>
                            </div>
                             <label class="col-md-1 form-control-label" for="text-input">Celular</label>
                             <div class="col-md-5">
                                <input type="text"  v-model="cel"  id="celular" name="celular" class="form-control" placeholder="Celular del cliente">
                                <span class="help-block">(*) Ingrese el celular</span>
                            </div>
                        </div>       
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="cerrarModal" data-dismiss="modal">Cerrar</button>
                    <button v-show="accion==0" type="button" @click="regClien" class="btn btn-primary">Guardar</button>
                    <button v-show="accion" type="button" @click="actClien" class="btn btn-primary">actualizar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Fin del modal-->
    <!-- Inicio del modal Eliminar -->
    <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-danger" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar cliente</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Estas seguro de eliminar el cliente?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" @click="eliminarClien" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- Fin del modal Eliminar -->
</main>
  
</template>

<script>
    export default {
        data(){
            return{
                 ArrayDatos:[],
                 nombre : this.nombre,
                 apellido : this.apellido,
                 cedula : this.cedula,
                 email : this.email,
                 tel : this.tel,
                 cel : this.cel,
                 idClien:0,
                 modal:0,
                 accion:0,
                 titulo:''
            }
        },
         methods: {
            listClien:function(){
                let mu = this;
                var url="/clientes"
                 axios.get (url).then(function(response){
                    var respuesta = response.data;
                    mu.ArrayDatos = respuesta.clientes;
                })
                .catch(function(error){
                    console.log(error);
                });
             },
             regClien()  {
                let mu = this;
                var url="/clientes/registrar";
                axios.post(url,{
                    nombre : this.nombre,
                    apellido : this.apellido,
                    cedula : this.cedula,
                    email : this.email,
                    tel : this.tel,
                    cel : this.cel
                })
                .then(function(response){
                    mu.listClien();
                    mu.mensaje('se guardo correctamente');
                    mu.cerrarModal();
                })
                .catch(function(error){
                    console.log(error);
                });
             },
              actClien(){
                let mu =this;
                var url="/clientes/actualizar";
                axios.put(url,{
                    id: this.idClien,
                    nombre : this.nombre,
                    apellido : this.apellido,
                    cedula : this.cedula,
                    email : this.email,
                    tel : this.tel,
                    cel : this.cel
                })
                .then(function(response){
                    mu.listClien();
                    mu.mensaje('se actualizo correctamente');
                    mu.cerrarModal();
                })
                   .catch(function(error){
                    console.log(error);
                });
              },
              eliminarClien(data=[]){
                let mu= this;
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {

                    if (result.isConfirmed) {
                         var url="/clientes/eliminar";
                axios.post(url,{
                    id:data['id']
                })
                .then(function(response){
                    mu.listClien();
                })
                .catch(function(error){
                    console.log(error);
                });

                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                    }
                })
             },
                abrirModal(accion,data=[]){
                    switch (accion) {
                    case 'guardar':
                        this.titulo='Registrar cliente';
                        this.accion=0;
                        this.limpiar();
                        break;
                        case 'editar':
                        this.titulo='Editar cliente';
                        this.accion=1;
                        this.idClien =data['id'];
                        this.nombre =data['nombre'];
                        this.apellido =data['apellido'];
                        this.cedula =data['cedula'];
                        this.email =data['email'];
                        this.tel =data['tel'];
                        this.cel =data['cel'];
                    default:
                    break;
                }
                this.modal=1;
             },
                cerrarModal(){
                   this.modal=0;
             },
                limpiar(){
                    this.nombre='',
                    this.apellido='',
                    this.cedula='',
                    this.email='',
                    this.tel='',
                    this.cel='' 
                },
                mensaje(msj){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: msj,
                    showConfirmButton: false,
                    timer: 2000
                })
             }
        },
        
        mounted() {
            console.log('Component mounted.')
             this.listClien();
        }
    }
</script>
<style>
.modal-content{
    width: 100% !important ;
    position: absolute !important;
}
.mostrar{
    display: list-item !important;
    opacity: 1 !important;
    position: absolute !important;
    background-color:#9995957a;
}

</style>
