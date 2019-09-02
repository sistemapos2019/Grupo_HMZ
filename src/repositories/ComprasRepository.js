import BaseRepository from './BaseRepository.js';

class ComprasRepository extends BaseRepository{

    getAll(){
        try{
           return fetch(this.URL+"compras");
           
        }catch(e){
            console.error(e);
        }
    }

}

export default ComprasRepository;