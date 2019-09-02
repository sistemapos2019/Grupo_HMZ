import BaseRepository from './BaseRepository.js';

class BitacoraRepository extends BaseRepository{

    getAll(){
        try{
           return fetch(this.URL+"bitacoras");
           
        }catch(e){
            console.error(e);
        }
    }

}

export default BitacoraRepository;