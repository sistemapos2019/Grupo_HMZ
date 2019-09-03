import BaseRepository from './BaseRepository.js';

class DashboardPrincipalRepository extends BaseRepository{

    getAll(){
        try{
           return fetch(this.URL+"dashboardprincipals");
           
        }catch(e){
            console.error(e);
        }
    }

}

export default DashboardPrincipalRepository;