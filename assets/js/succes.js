function Succes(id,nom,type,points,distance_duree) {
    this.id = id;
    this.nom = nom;
    this.type = type;
    this.points = points;
    this.distance_duree = distance_duree;
};

var tab_succes_run_distance = new Array();
var tab_succes_run_duree = new Array();
var tab_succes_bike_distance = new Array();
var tab_succes_bike_duree = new Array();
var tab_succes_swim_distance = new Array();
var tab_succes_swim_duree = new Array();

//CREATION DES SUCCES
for (let i=1; i<41; i++) {
    //SUCCES DISTANCE SWIM
    if (i<21) {
        if (i%2==0) {
            tab_succes_swim_distance.push(new Succes(i,"Swim : "+(i/2)+"km","distance",i*50,i*500));
        } else {
            tab_succes_swim_distance.push(new Succes(i,"Swim : "+i*500+"m","distance",i*50,i*500));
        }
    } else if (i<31) {
        tab_succes_swim_distance.push(new Succes(i,"Swim : "+(i-10)+"km","distance",i*50,(i-10)*1000));
    }
    //SUCCES DISTANCE RUN ET BIKE
    if (i<31) {
        tab_succes_run_distance.push(new Succes(i,"Run : "+i*5+"km","distance",i*50,i*5000));
        tab_succes_bike_distance.push(new Succes(i,"Bike : "+i*10+"km","distance",i*50,i*10000));

        //SUCCES DUREE RUN BIKE SWIM
        if (i==1) {
            tab_succes_swim_duree.push(new Succes(i,"Swim : "+i*30+"min","durée",i*50,i*1800));
            tab_succes_run_duree.push(new Succes(i,"Run : "+i*30+"min","durée",i*50,i*1800));  
            tab_succes_bike_duree.push(new Succes(i,"Bike : "+i*30+"min","durée",i*50,i*1800));
        } else {
            if (i%2==0) {
                tab_succes_swim_duree.push(new Succes(i,"Swim : "+Math.floor(i/2)+"h","durée",i*50,i*1800));
                tab_succes_run_duree.push(new Succes(i,"Run : "+Math.floor(i/2)+"h","durée",i*50,i*1800));  
                tab_succes_bike_duree.push(new Succes(i,"Bike : "+Math.floor(i/2)+"h","durée",i*50,i*1800));
            } else {
                tab_succes_swim_duree.push(new Succes(i,"Swim : "+Math.floor(i/2)+"h"+(i%2)*30+"min","durée",i*50,i*1800));
                tab_succes_run_duree.push(new Succes(i,"Run : "+Math.floor(i/2)+"h"+(i%2)*30+"min","durée",i*50,i*1800));  
                tab_succes_bike_duree.push(new Succes(i,"Bike : "+Math.floor(i/2)+"h"+(i%2)*30+"min","durée",i*50,i*1800));
            }
        }
    }
}       