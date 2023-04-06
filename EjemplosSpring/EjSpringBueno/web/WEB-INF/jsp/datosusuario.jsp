
<%-- 
    Document   : HolaMundo
    Created on : 09-sep-2022, 11:40:55
    Author     : Mañanas
--%>

<!-- 02 - ENVIAR INFORMACION CONTROLADOR VISTA -->

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@ taglib prefix="jstl" uri="http://java.sun.com/jstl/core_rt"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
        <link rel="stylesheet" href="estilotabla.css"/>
    </head>
    <body>
        <h1>VISTA USUARIO</h1>
        <h4><jstl:out value="${mensaje}"/></h4>
        <table border="1">
            <tr>
                <th>Nombre</th>
                <td>
                    <jstl:out value="${usuario.nombre}"/>
                </td>
            </tr>       
            <tr>
                <th>Apellidos</th>
                <td>
                    <jstl:out value="${usuario.apellidos}"/>
                </td>
            </tr>
            <tr>
                <th>Edad</th>
                <td>
                    <jstl:out value="${usuario.edad}"/>
                </td>
            </tr>            
        </table>
    </body>
</html>