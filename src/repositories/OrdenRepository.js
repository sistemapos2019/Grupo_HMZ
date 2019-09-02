import BaseRepository from './BaseRepository.js';

class OrdenRepository extends BaseRepository{

    getAll(){
        try{
           return fetch(this.URL+"Ordens");
           
        }catch(e){
            console.error(e);
        }
    }

}

export default OrdenRepository;