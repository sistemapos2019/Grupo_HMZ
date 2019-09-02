import BaseRepository from './BaseRepository.js';

class UsuarioRepository extends BaseRepository{

    getAll(){
        try{
           return fetch(this.URL+"Usuarios");
           
        }catch(e){
            console.error(e);
        }
    }

}

export default UsuarioRepository;