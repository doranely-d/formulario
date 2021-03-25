<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>           
        <table width="100%" border="1" cellspacing="0" cellpadding="0" align="center">
            <tr>
                <td align="center" style="width: 20px;background-color: #8ed0ff;font-size:16px;"><b>ID</b></td>
                <td align="center" style="width: 100px;background-color: #8ed0ff;font-size:16px;"><b>NOMBRE</b></td>
                <td align="center" style="width: 100px;background-color: #8ed0ff;font-size:16px;"><b>APELLIDO PATERNO</b></td>
                <td align="center" style="width: 100px;background-color: #8ed0ff;font-size:16px;"><b>APELLIDO MATERNO</b></td>
                <td align="center" style="width: 100px;background-color: #8ed0ff;font-size:16px;"><b>CORREO</b></td>
                <td align="center" style="width: 50px;background-color: #8ed0ff;font-size:16px;"><b>IP</b></td>
                <td align="center" style="width: 200px;background-color: #8ed0ff;font-size:16px;"><b>COMENTARIOS</b></td>
            </tr>
            {% if(registros) %}
                {% for registro in registros %}
                    <tr align="center">
                        <td><p style="margin:0px;font-size:14px" > {{ registro.id}}</p></td>
                        <td><p style="margin:0px;font-size:14px" > {{ registro.nombre }}</p></td>
                        <td><p style="margin:0px;font-size:14px" > {{ registro.apellido_paterno}} </p></td>
                        <td><p style="margin:0px;font-size:14px" > {{ registro.apellido_materno}} </p></td>
                        <td><p style="margin:0px;font-size:14px" > {{ registro.correo}} </p></td>
                        <td><p style="margin:0px;font-size:14px" > {{ registro.ip}} </p></td>
                        <td><p style="margin:0px;font-size:14px" > {{ registro.comentarios}} </p></td>
                    </tr>
                {% endfor  %}
            {% endif  %}
        </table>
        <br>
        <br>
    </body>
</html>
