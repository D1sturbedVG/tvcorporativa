function date_time(id)
{
        data = new Date;
        year = data.getFullYear();
        month = data.getMonth();
        months = new Array('Janeiro', 'Fevreiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
        d = data.getDate();
        day = data.getDay();
        days = new Array('Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sábado');
        h = data.getHours();
        if(h<10)
        {
                h = "0"+h;
        }
        m = data.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        s = data.getSeconds();
        if(s<10)
        {
                s = "0"+s;
        }
        result = ''+days[day]+'<br>'+d+' '+months[month]+' '+year+'<br>'+h+':'+m+':'+s;
        document.getElementById(id).innerHTML = result;
        setTimeout('date_time("'+id+'");','1000');
        return true;
}