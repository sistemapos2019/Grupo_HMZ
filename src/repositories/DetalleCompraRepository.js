import BaseRepository from './BaseRepository.js';

class DetalleCompraRepository extends BaseRepository{

    getAll(){
        try{
           return fetch(this.URL+"detallecompras");
           
        }catch(e){
            console.error(e);
        }
    }

}

export default DetalleCompraRepository;