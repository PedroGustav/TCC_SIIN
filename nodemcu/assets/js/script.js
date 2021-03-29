
data = new Date();
var mes = data.getMonth();
var dia = data.getDate();
var ano = data.getFullYear();
var dia_semana = data.getDay();
var pdia = new Date(ano, mes, 1);
var cont = 0;
var cont = pdia.getDay() + 1;
document.getElementById('month').value = mes + 1;
document.getElementById('year').value = ano;
var meses = ["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"];

m = document.getElementById("Month");
function AvancarMes(){
    fadeIn(m,0.8);
    if( mes == 11){
        fadeIn(document.getElementById("Year"),0.8);
        mes = 0;
        ano +=1;
        document.getElementById('day').value ='';
        document.getElementById('month').value = mes + 1;
        document.getElementById('year').value = ano;
    }else{
        mes +=1;
        document.getElementById('day').value ='';
        document.getElementById('month').value = mes + 1;
        
    }

    document.getElementById("Month").innerHTML = meses[mes];
    document.getElementById("Year").innerHTML = ano;
    pdia = new Date(ano, mes, 1);
    cont = pdia.getDay() + 1;
    preencherCalendario();
}   

 function VoltarMes(){
    fadeIn(m,0.8);
    if( mes == 0){
        fadeIn(document.getElementById("Year"),0.8);
        mes = 11;
        ano -=1;
        document.getElementById('day').value ='';
        document.getElementById('month').value = mes + 1;
        document.getElementById('year').value = ano;
    }else{
        mes -=1;
        document.getElementById('day').value ='';
        document.getElementById('month').value = mes + 1;
    }

    document.getElementById("Month").innerHTML = meses[mes];
    document.getElementById("Year").innerHTML = ano;
    pdia = new Date(ano, mes, 1);
    cont = pdia.getDay() + 1;
    preencherCalendario();
}   

function limparCalendario(){

    
    for(i = 1; i <= 42; i++){
        document.getElementById(i).classList.add('notActive');
        document.getElementById(i).innerHTML = '';
    }
    
}

function preencherCalendario(){
    

    limparCalendario();
    
    if(mes == 1){
        if ((ano % 4 == 0) && ((ano % 100 != 0) || (ano % 400 == 0))){
            for(i = 1; i <= 29; i++){
                f
                document.getElementById(cont).innerHTML = i;
                document.getElementById(cont).classList.remove('notActive');
                cont += 1;
            }
        }else{
            for(i = 1; i <= 28; i++){
                
                document.getElementById(cont).innerHTML = i;
                document.getElementById(cont).classList.remove('notActive');
                cont += 1;
            }
        }
    }else if((mes == 0) || (mes == 2) || (mes == 4) || (mes == 6) || (mes == 7) || (mes == 09 ) || (mes == 11)){
        for(a = 1; a <= 31; a++){
            
            document.getElementById(cont).innerHTML = a;
            document.getElementById(cont).classList.remove('notActive');
            cont += 1;
        }
    }else{
        for(i = 1; i <= 30; i++){
            
            document.getElementById(cont).innerHTML = i;
            document.getElementById(cont).classList.remove('notActive');
            cont += 1;
        }
    }
    cont = 0;
    document.getElementById('DateText').innerHTML = meses[mes] + ' de ' + document.getElementById('year').value;
        
}
preencherCalendario();

function selecionarDia(clikedDay){
    document.getElementById('day').value = document.getElementById(clikedDay).textContent;
    document.getElementById('DateText').innerHTML = document.getElementById('day').value + ' de ' + meses[mes] + ' de ' + document.getElementById('year').value;
};

function arrumarCalendario(){
    dia = document.getElementById('day').value;
    mes = document.getElementById('month').value;
    ano = document.getElementById('year').value;
    pdia = new Date(ano, mes, 1);
    cont = pdia.getDay() + 1;
    preencherCalendario();
}

function fadeIn(element,time){
    processa(element,time,0,100);
}



function fadeOut(element,time){
    processa(element,time,100,0);
}



function processa(element,time,initial,end){
    if(initial == 0){
             increment = 2;
    }else {
             increment = -2;
    }



    opc = initial;



    intervalo = setInterval(function(){
        if((opc == end)){
                if(end == 0){
                }
                clearInterval(intervalo);
        }else {
                opc += increment;
                element.style.opacity = opc/100;
                element.style.filter = "alpha(opacity="+opc+")";
        }
    },time * 10);
}