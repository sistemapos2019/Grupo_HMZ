import BaseRepository from './BaseRepository.js';

class ParametroRepository extends BaseRepository{

    getAll(){
        try{
           return fetch(this.URL+"parametros");
           
        }catch(e){
            console.error(e);
        }
    }

}

export default ParametroRepository;