
data = new Date();
var mes = data.getMonth();
var dia = data.getDate();
var ano = data.getFullYear();
var dia_semana = data.getDay();
var pdia = new Date(ano, mes, 1);
var cont = 0;
var cont = pdia.getDay() + 1;
var meses = ["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"];

function AvancarMes(){

    if( mes == 11){
        mes = 0;
        ano +=1;
    }else{
        mes +=1;
    }

    document.getElementById("month").innerHTML = meses[mes];
    document.getElementById("year").innerHTML = ano;
    pdia = new Date(ano, mes, 1);
    cont = pdia.getDay() + 1;
    preencherCalendario();
}   

function VoltarMes(){

    if( mes == 0){
        mes = 11;
        ano -=1;
    }else{
        mes -=1;
    }

    document.getElementById("month").innerHTML = meses[mes];
    document.getElementById("year").innerHTML = ano;
    pdia = new Date(ano, mes, 1);
    cont = pdia.getDay() + 1;
    preencherCalendario();
}   

function limparCalendario(){

    for(i = 1; i <= 42; i++){
        document.getElementById(i).innerHTML = '';
        document.getElementById(i).classList.add('notActive');
    }
    
}

function preencherCalendario(){
        limparCalendario();
        if(mes == 1){
            if ((ano % 4 == 0) && ((ano % 100 != 0) || (ano % 400 == 0))){
                for(i = 1; i <= 29; i++){
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
}

preencherCalendario();