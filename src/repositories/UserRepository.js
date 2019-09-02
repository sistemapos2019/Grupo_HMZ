import BaseRepository from './BaseRepository.js';

class UserRepository extends BaseRepository{

    getAll(){
        try{
           return fetch(this.URL+"Users");
           
        }catch(e){
            console.error(e);
        }
    }

}

export default UserRepository;