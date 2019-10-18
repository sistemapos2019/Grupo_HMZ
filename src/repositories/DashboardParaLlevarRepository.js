import BaseRepository from './BaseRepository.js';
import axios from 'axios';
import { async } from 'q';

export default class DashboardParaLlevarRepository extends BaseRepository{
    constructor(){
        super();
        this.URL += 'dashboard/getdashboardprincipal'
    }
    findAll = async() =>{
        let response = await fetch(this.URL)
        let data = await response.json();
        //console.log(data);
        return data;
    }
}