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


function swimSuccessDistance(distance,i) {
    while (tab_succes_swim_distance[i].distance_duree<=distance) {
        i++;
    }
    return i;
}
function swimSuccessDuree(duree,i) {
    while (tab_succes_swim_duree[i].distance_duree<=duree) {
        i++;
    }
    return i;
}
function bikeSuccessDistance(distance,i) {
    while (tab_succes_bike_distance[i].distance_duree<=distance) {
        i++;
    }
    return i;
}
function bikeSuccessDuree(duree,i) {
    while (tab_succes_bike_duree[i].distance_duree<=duree) {
        i++;
    }
    return i;
}
function runSuccessDistance(distance,i) {
    while (tab_succes_run_distance[i].distance_duree<=distance) {
        i++;
    }
    return i;
}
function runSuccessDuree(duree,i) {
    while (tab_succes_run_duree[i].distance_duree<=duree) {
        i++;
    }
    return i;
}

function calculPoints(swim_dist,swim_duree,bike_dist,bike_duree,run_dist,run_duree) {
    return swim_dist*50+swim_duree*50+bike_dist*50+bike_duree*50+run_dist*50+run_duree*50;
}


async function calculNouveauSucces(type_token,access_token,date,success_acquired,type_connexion) {
    const tmp = success_acquired.split(",");
    var swim_dist = tmp[0];
    var swim_duree = tmp[1];
    var bike_dist = tmp[2];
    var bike_duree = tmp[3];
    var run_dist = tmp[4];
    var run_duree = tmp[5];
    return calculNouveauSucces2(type_token,access_token,date,swim_dist,swim_duree,bike_dist,bike_duree,run_dist,run_duree,1,type_connexion);
 }
function calculNouveauSucces2(type_token,access_token,date,swim_dist,swim_duree,bike_dist,bike_duree,run_dist,run_duree,npage,type_connexion) {
    $(document).ready(function(){
        $.ajax({
            url: "https://www.strava.com/api/v3/athlete/activities?after="+date+"&page="+npage+"&per_page=200", //limite à 200
            type: "GET",
            headers : { 
                "Accept": "application/json",
                "Authorization": type_token + " " + access_token},
            success: function(reponse, textStatus, xhr){			
                for (let i=0; i<Object.keys(reponse).length; i++) {
                    if (reponse[i].type == "Swim") {
                        var succ_dist = swimSuccessDistance(reponse[i].distance,swim_dist);
                        var succ_duree = swimSuccessDuree(reponse[i].moving_time,swim_duree);
                        if (succ_dist>swim_dist) {
                            swim_dist = succ_dist;
                        }
                        if (succ_duree>swim_duree) {
                            swim_duree = succ_duree;
                        }
                    } else if (reponse[i].type == "Ride") { //Bike
                        var succ_dist = bikeSuccessDistance(reponse[i].distance,bike_dist);
                        var succ_duree = bikeSuccessDuree(reponse[i].moving_time,bike_duree);
                        if (succ_dist>bike_dist) {
                            bike_dist = succ_dist;
                        }
                        if (succ_duree>bike_duree) {
                            bike_duree = succ_duree;
                        }
                    } else if (reponse[i].type == "Run") {
                        var succ_dist = runSuccessDistance(reponse[i].distance,run_dist);
                        var succ_duree = runSuccessDuree(reponse[i].moving_time,run_duree);
                        if (succ_dist>run_dist) {
                            run_dist = succ_dist;
                        }
                        if (succ_duree>run_duree) {
                            run_duree = succ_duree;
                        } 
                    }
                }
                if (Object.keys(reponse).length<200) {
                    createCookie("swim_dist", swim_dist, "10");
                    createCookie("swim_duree",swim_duree, "10");
                    createCookie("bike_dist", bike_dist, "10");
                    createCookie("bike_duree",bike_duree, "10");
                    createCookie("run_dist", run_dist, "10");
                    createCookie("run_duree",run_duree, "10");
                    createCookie("points",calculPoints(swim_dist,swim_duree,bike_dist,bike_duree,run_dist,run_duree), "10");
                    console.log(type_connexion);
                    if (type_connexion==1) {
                        document.location.href="premiere_connexion2.php";
                    } else {
                        document.location.href="autre_connexion2.php";
                    }
                } else {
                    return calculNouveauSucces2(type_token,access_token,date,swim_dist,swim_duree,bike_dist,bike_duree,run_dist,run_duree,npage+1);
                }
                
            },
            error: function(error) {
                document.location.href="deconnexion.php";
                return null;
            }
        })
    })
}
 
 /*if (Object.keys(reponse).length<3) {
     
 }*/