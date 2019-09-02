import BaseRepository from './BaseRepository.js';

class MesaRepository extends BaseRepository{

    getAll(){
        try{
           return fetch(this.URL+"Mesas");
           
        }catch(e){
            console.error(e);
        }
    }

}

export default MesaRepository;