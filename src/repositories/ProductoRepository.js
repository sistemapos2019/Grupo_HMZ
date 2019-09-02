import BaseRepository from './BaseRepository.js';

class ProductoRepository extends BaseRepository{

    getAll(){
        try{
           return fetch(this.URL+"Productos");
           
        }catch(e){
            console.error(e);
        }
    }

}

export default ProductoRepository;