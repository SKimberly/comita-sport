<template>
    <div class="card direct-chat direct-chat-warning shadow">
        <div class="card-header btn-comita text-white">
            <h3 class="card-title text-center">Mensajes</h3>
            <div class="card-tools">
              <span data-toggle="tooltip" title="3 New Messages" class="badge badge-warning"> Cantidad de mensajes:  </span>
              </button>
            </div>
        </div>
        <div class="card-body">
            <div class="direct-chat-messages" v-chat-scroll>
                <div class="direct-chat-msg" v-for="(message, index) in mensajes" :key="index" >

                        <div class="direct-chat-msg right bg-light" v-if="message.envia==auth" >
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-right">{{ message.envia }}</span>
                                <span class="direct-chat-timestamp float-left">{{ message.created_at | dateHuman }}</span>
                            </div>
                            <img class="direct-chat-img" src="/img/sidebar/userdefault.svg" alt="message user image">
                            <div class="direct-chat-text float-right">
                              {{ message.contenido }}
                            </div>
                        </div>

                        <div class="direct-chat-msg left" v-else >
                            <div class="direct-chat-infos clearfix ">
                                <span class="direct-chat-name float-left">{{ message.envia }}</span>
                                <span class="direct-chat-timestamp float-right">{{ message.created_at | dateHuman }}</span>
                            </div>
                            <img class="direct-chat-img" src="/img/sidebar/userdefault.svg" alt="message user image">
                            <div class="direct-chat-text float-left">
                                {{ message.contenido }}
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="card-footer btn-comita">
            <div class="input-group">
                <input type="hidden" name="cotiuser_id"  >
                <input type="hidden" name="cotizacion_id"  >
                <input
                    v-model="newMensaje"
                    type="text"
                    name="mensaje"
                    placeholder="Escriba su mensaje.." class="form-control  bg-light border-2" autofocus>
                <span class="input-group-append">
                  <button class="btn" style="background-color: cyan;" @click="sendMensaje">ENVIAR</button>
                </span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                mensajes:[],
                ruta:this.title,
                auth:this.userauth,
                usercoti:this.cotiuser,
                newMensaje: ''
            }
        },
        props: ['title','userauth','cotiuser'],
        created(){
            this.fetchMessages();

            Echo.join('chat')
                .listen('MessageSent',(event)=>{
                    this.mensajes.push(event.mensaje);
                });
        },
        methods:{
            fetchMessages(){
                axios.get('/admin/cotizaciones/'+this.ruta+'/mensajesapi'
                    ).then(res => {
                    this.mensajes = res.data;
                });
            },
            sendMensaje(){
                if(this.userauth == 2){
                    this.mensajes.push({
                        envia: this.userauth,
                        recibe: this.usercoti,
                        contenido: this.newMensaje,
                    });
                }else{
                    this.mensajes.push({
                        envia: this.usercoti,
                        recibe: this.userauth,
                        contenido: this.newMensaje,
                    });
                }
                axios.post('/admin/mensajes/cotizacion', {
                    mensaje: this.newMensaje,
                    idcoti: this.ruta,
                    userauth: this.userauth
                });
                this.newMensaje = '';
            }
        }
    };
</script>




