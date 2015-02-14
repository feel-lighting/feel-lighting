function alertBox(){
    this.display = function(){
        alert('alert box');
    };
}


/***************************** TOOLS **********************/

/****************************** bilan *************************************/

function round(value)
{
    return Math.ceil(value * 100.0) / 100.0;
}

function calcul()
{
    var duree = document.getElementById('duree').value;
    var cout = document.getElementById('cout').value;
    var puissancehalo = document.getElementById('puissancehalo').value;
    var puissanceled = document.getElementById('puissanceled').value;

    var halo1mois = duree * cout * puissancehalo * 30/1000;
    var led1mois = duree * cout * puissanceled * 30/1000;

    displayCalcul(halo1mois,led1mois);
}

function displayCalcul(halovalue,ledvalue){

    if ((/^\s*$/.test(document.getElementById('duree').value))){
        document.getElementById('duree').value = 0;
    }
    if ((/^\s*$/.test(document.getElementById('cout').value))){
        document.getElementById('cout').value  = 0;
    }
    if ((/^\s*$/.test(document.getElementById('puissancehalo').value))){
        document.getElementById('puissancehalo').value  = 0;
    }
    if ((/^\s*$/.test(document.getElementById('puissanceled').value))){
        document.getElementById('puissanceled').value  = 0;
    }

    $(".cds_tab_eco").css({opacity:0});
    $(".tools_button_calc").css({marginBottom:'10px'});
    $('#btImprime').css({display:'block',visibility:'visible'}).stop().animate({opacity:1},500);

    document.getElementById('halo1mois').value = round(halovalue) + ' â‚¬';
    document.getElementById('halo6mois').value = round(halovalue * 6) + ' â‚¬';
    document.getElementById('halo1an').value = round(halovalue * 12) + ' â‚¬';
    document.getElementById('halo2ans').value = round(halovalue * 24) + ' â‚¬';
    document.getElementById('halo5ans').value = round(halovalue * 60) + ' â‚¬';

    document.getElementById('led1mois').value = round(ledvalue) + ' â‚¬';
    document.getElementById('led6mois').value = round(ledvalue * 6) + ' â‚¬';
    document.getElementById('led1an').value = round(ledvalue * 12) + ' â‚¬';
    document.getElementById('led2ans').value = round(ledvalue * 24) + ' â‚¬';
    document.getElementById('led5ans').value = round(ledvalue * 60) + ' â‚¬';

    document.getElementById('eco1mois').value = round(halovalue - ledvalue) + ' â‚¬';
    document.getElementById('eco6mois').value = round((halovalue * 6) - (ledvalue * 6)) + ' â‚¬';
    document.getElementById('eco1an').value = round((halovalue * 12) - (ledvalue * 12)) + ' â‚¬';
    document.getElementById('eco2ans').value = round((halovalue * 24) - (ledvalue * 24)) + ' â‚¬';
    document.getElementById('eco5ans').value = round((halovalue * 60) - (ledvalue * 60)) + ' â‚¬';

    $(".cds_tab_eco").animate({opacity:1},1000);
}


/************************************ conversion *******************************/

function toRad(deg)
{
    return deg * ((2.0 * Math.PI) / 360.0);
}

function toSr(rad)
{
    return 2.0 * Math.PI * (1.0 - Math.cos(rad / 2.0));
}

function calc_Flux_Intensity()
{
    var angle,lum,cd,mcd;

    angle = lum = 0;

    if (!(/^\s*$/.test(document.getElementById('lum_candela_angle').value))){
        angle = document.getElementById('lum_candela_angle').value;
    }
    if (!(/^\s*$/.test(document.getElementById('lum_candela_flux').value))){
        lum = document.getElementById('lum_candela_flux').value;
    }

    cd = lum / toSr(toRad(angle));

    if(isNaN(cd)){cd = 0;}

    mcd = cd * 1000.0;

    document.getElementById('lum_candela_intensity').value = Math.ceil(mcd);
    return cd;
}

function calc_Intensity_Flux()
{
    var cd,angle,lum;

    angle = cd = 0;

    if (!(/^\s*$/.test(document.getElementById('lum_candela_angle').value))){
        angle = document.getElementById('lum_candela_angle').value;
    }
    if (!(/^\s*$/.test(document.getElementById('lum_candela_intensity').value))){
        cd = document.getElementById('lum_candela_intensity').value / 1000.0;
    }

    lum = cd * toSr(toRad(angle));

    document.getElementById('lum_candela_flux').value = round(lum);
    return lum;
}

function toArea(angleInDeg, distance)
{
    return toSr(toRad(angleInDeg)) * distance * distance;
}

function calc_Illuminance_Flux()
{
    var lux,angle,distance,lum;

    lux = lum = angle = distance = 0;

    if (!(/^\s*$/.test(document.getElementById('lux_lum_illuminance').value))){
        lux = document.getElementById('lux_lum_illuminance').value;
    }
    if (!(/^\s*$/.test(document.getElementById('lux_lum_distance').value))){
        distance = document.getElementById('lux_lum_distance').value;
    }
    if (!(/^\s*$/.test(document.getElementById('lux_lum_angle').value))){
        angle = document.getElementById('lux_lum_angle').value;
    }

    lum = lux * toArea(angle, distance);

    document.getElementById('lux_lum_flux').value = round(lum);
    return lum;
}

function calc_Flux_Illuminance()
{

    var lux,angle,distance,lum;

    lux = lum = angle = distance = 0;

    if (!(/^\s*$/.test(document.getElementById('lux_lum_flux').value))){
        lum = document.getElementById('lux_lum_flux').value;
    }
    if (!(/^\s*$/.test(document.getElementById('lux_lum_distance').value))){
        distance = document.getElementById('lux_lum_distance').value;
    }
    if (!(/^\s*$/.test(document.getElementById('lux_lum_angle').value))){
        angle = document.getElementById('lux_lum_angle').value;
    }

    lux = lum / toArea(angle, distance);

    if(isNaN(lux)){lux = 0;}

    document.getElementById('lux_lum_illuminance').value = round(lux);
    return lux;
}

function calc_Illuminance_Intensity()
{
    var lux,angle,distance,cd,mcd;

    lux = angle = distance = cd = mcd = 0;

    if (!(/^\s*$/.test(document.getElementById('lux_candela_illuminance').value))){
        lux = document.getElementById('lux_candela_illuminance').value;
    }
    if (!(/^\s*$/.test(document.getElementById('lux_candela_distance').value))){
        distance = document.getElementById('lux_candela_distance').value;
    }
    if (!(/^\s*$/.test(document.getElementById('lux_candela_angle').value))){
        angle = document.getElementById('lux_candela_angle').value;
    }

    cd = (lux * toArea(angle, distance)) / toSr(toRad(angle));
    if(isNaN(cd)){cd = 0;}

    mcd = cd * 1000.0;

    document.getElementById('lux_candela_intensity').value = Math.ceil(mcd);
    return cd;
}

function calc_Intensity_Illuminance()
{
    var lux,angle,distance,cd;

    lux = cd = angle = distance = 0;

    if (!(/^\s*$/.test(document.getElementById('lux_candela_intensity').value))){
        cd = document.getElementById('lux_candela_intensity').value / 1000.0;
    }
    if (!(/^\s*$/.test(document.getElementById('lux_candela_distance').value))){
        distance = document.getElementById('lux_candela_distance').value;
    }
    if (!(/^\s*$/.test(document.getElementById('lux_candela_angle').value))){
        angle = document.getElementById('lux_candela_angle').value;
    }

    lux = (toSr(toRad(angle)) * cd) / toArea(angle, distance);
    if(isNaN(lux)){lux = 0;}

    document.getElementById('lux_candela_illuminance').value = round(lux);
    return lux;
}

function calc_temp()
{
    var coordx,coordy,n;

    coordx = coordy = n = 0;

    if (!(/^\s*$/.test(document.getElementById('coordx').value))){
        coordx = document.getElementById('coordx').value;
    }
    if (!(/^\s*$/.test(document.getElementById('coordy').value))){
        coordy = document.getElementById('coordy').value;
    }

    n = (coordx - 0.332)/(coordy - 0.1858);

    document.getElementById('temp').value = Math.ceil((-437*Math.pow(n,3))+(3601*Math.pow(n,2))-(6801*n)+5514.31);
}


/********************************************************* faisceau *****************/


function calculFsc()
{
    var Pi = 3.1415926;

    var angle,lux1m,distance;

    angle = lux1m = distance = 0;

    if (!(/^\s*$/.test(document.getElementById('angle').value))){
        angle = document.getElementById('angle').value;
    }
    else {
        document.getElementById('angle').value = 0;
        shema_angle();
    }
    if (!(/^\s*$/.test(document.getElementById('lux1m').value))){
        lux1m = document.getElementById('lux1m').value;
    }else {
        document.getElementById('lux1m').value = 0;
        shema_1m();
    }
    if (!(/^\s*$/.test(document.getElementById('dist').value))){
        distance = document.getElementById('dist').value;
    }else {
        document.getElementById('dist').value = 0;
        shema_distance();
    }

    var angle_rad = (((angle/2) * Pi) / 180);

    var rayon_mesure = Math.tan(angle_rad) * 1;
    var surface_mesure = Pi * rayon_mesure * rayon_mesure;
    var produit_surface_luminosite = surface_mesure * lux1m;

    var rayon = Math.tan(angle_rad) * distance;
    var diametre = rayon * 2;
    var surface = Pi * rayon * rayon;

    var lux = produit_surface_luminosite/surface;

    if(isNaN(lux)){lux = 0;}

    document.getElementById('dia').value = round(diametre);
    document.getElementById('lux').value = round(lux);

    document.getElementById('shema_resultdiam').value = round(diametre)+'m';
    document.getElementById('shema_resultlux').value = round(lux)+' lx';

    jQuery(".tools_button_calc").css({marginBottom:'10px'});
    console.log("test");
    jQuery('#btImprime').stop().css({display:'block',visibility:'visible'}).animate({opacity:1},500);
}

function shema_angle()
{
    if(document.getElementById('angle').value !== "")
    {
        document.getElementById('shema_angle').value = document.getElementById('angle').value+'Â°';
    }
    else
    {
        document.getElementById('shema_angle').value = "";
    }
}

function shema_1m()
{
    if(document.getElementById('lux1m').value !== "")
    {
        document.getElementById('shema_1m').style.visibility = 'visible';
        document.getElementById('shema_lux1m').value = document.getElementById('lux1m').value+' lx';
    }
    else
    {
        document.getElementById('shema_1m').style.visibility = 'hidden';
        document.getElementById('shema_lux1m').value = "";
    }
}

function shema_distance()
{
    if(document.getElementById('dist').value !== "")
    {
        document.getElementById('shema_distance').value = document.getElementById('dist').value+'m';
    }
    else
    {
        document.getElementById('shema_distance').value = "";
    }
}
